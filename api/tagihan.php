<?php
// tagihan.php

require_once 'config.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Izinkan CORS
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Tangani permintaan OPTIONS (preflight CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

try {
    $database = new Database();
    $pdo = $database->getConnection();

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            $type = $_GET['type'] ?? 'tagihan'; // Default 'tagihan'

            if ($type === 'tagihan') {
                // Ambil tagihan yang belum dibayar
                $stmt = $pdo->prepare("SELECT * FROM tagihan WHERE status = 'Belum Bayar' ORDER BY jatuh_tempo ASC");
                $stmt->execute();
                echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            } elseif ($type === 'riwayat') {
                // Ambil riwayat pembayaran
                $stmt = $pdo->prepare("SELECT * FROM riwayat_pembayaran ORDER BY tanggal_bayar DESC");
                $stmt->execute();
                echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            } elseif ($type === 'jadwal') {
                // Ambil tagihan yang akan jatuh tempo (misalnya, dalam 30 hari ke depan, atau semua yang belum bayar)
                $stmt = $pdo->prepare("SELECT * FROM tagihan WHERE status = 'Belum Bayar' AND jatuh_tempo >= CURRENT_DATE ORDER BY jatuh_tempo ASC");
                $stmt->execute();
                echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
            } elseif ($type === 'reminder_status') {
                // Endpoint untuk mendapatkan status pengingat
                $tagihan_id = $_GET['tagihan_id'] ?? null;
                if ($tagihan_id) {
                    $stmt = $pdo->prepare("SELECT scheduled_time, status FROM telegram_reminders WHERE tagihan_id = ? ORDER BY scheduled_time DESC LIMIT 1");
                    $stmt->execute([$tagihan_id]);
                    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
                } else {
                    http_response_code(400);
                    echo json_encode(['error' => 'Tagihan ID is required for reminder status.']);
                }
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Invalid type parameter.']);
            }
            break;

        case 'POST':
            $input = json_decode(file_get_contents('php://input'), true);

            $action = $_GET['action'] ?? null; // Ambil parameter action

            if ($action === 'set_reminder') {
                $tagihan_id = $input['tagihan_id'] ?? null;
                $scheduled_time = $input['scheduled_time'] ?? null;
                $telegram_chat_id = $input['telegram_chat_id'] ?? null; // Opsional

                if (!$tagihan_id || !$scheduled_time) {
                    http_response_code(400);
                    echo json_encode(['error' => 'Tagihan ID and scheduled time are required.']);
                    exit();
                }

                // Ambil detail tagihan untuk disimpan di tabel pengingat
                $stmt_tagihan = $pdo->prepare("SELECT nama_tagihan, jumlah, jatuh_tempo FROM tagihan WHERE id = ?");
                $stmt_tagihan->execute([$tagihan_id]);
                $tagihan_detail = $stmt_tagihan->fetch(PDO::FETCH_ASSOC);

                if (!$tagihan_detail) {
                    http_response_code(404);
                    echo json_encode(['error' => 'Tagihan not found.']);
                    exit();
                }

                $stmt = $pdo->prepare("INSERT INTO telegram_reminders (tagihan_id, nama_tagihan, jumlah_tagihan, jatuh_tempo_tagihan, scheduled_time, telegram_chat_id, status) VALUES (?, ?, ?, ?, ?, ?, 'pending')");
                $stmt->execute([
                    $tagihan_id,
                    $tagihan_detail['nama_tagihan'],
                    $tagihan_detail['jumlah'],
                    $tagihan_detail['jatuh_tempo'],
                    $scheduled_time,
                    $telegram_chat_id
                ]);

                echo json_encode(['message' => 'Pengingat berhasil diatur.']);

            } else {
                // Logika Tambah Tagihan Baru
                $nama_tagihan = $input['nama_tagihan'] ?? null;
                $jumlah = $input['jumlah'] ?? null;
                $jatuh_tempo = $input['jatuh_tempo'] ?? null;
                $status = $input['status'] ?? 'Belum Bayar'; // Default status

                if (!$nama_tagihan || !$jumlah || !$jatuh_tempo) {
                    http_response_code(400);
                    echo json_encode(['error' => 'Nama tagihan, jumlah, dan jatuh tempo wajib diisi.']);
                    exit();
                }

                $stmt = $pdo->prepare("INSERT INTO tagihan (nama_tagihan, jumlah, jatuh_tempo, status) VALUES (?, ?, ?, ?)");
                $stmt->execute([$nama_tagihan, $jumlah, $jatuh_tempo, $status]);
                echo json_encode(['message' => 'Tagihan berhasil ditambahkan.']);
            }
            break;

        case 'PUT':
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? null;
            $status = $input['status'] ?? null;

            if (!$id) {
                http_response_code(400);
                echo json_encode(['error' => 'ID tagihan wajib diisi.']);
                exit();
            }

            if ($status === 'Lunas') {
                // Logika tandai sebagai lunas:
                // 1. Ambil detail tagihan dari tabel 'tagihan'
                $stmt_select = $pdo->prepare("SELECT * FROM tagihan WHERE id = ?");
                $stmt_select->execute([$id]);
                $tagihan = $stmt_select->fetch(PDO::FETCH_ASSOC);

                if (!$tagihan) {
                    http_response_code(404);
                    echo json_encode(['error' => 'Tagihan tidak ditemukan.']);
                    exit();
                }

                // 2. Masukkan ke tabel 'riwayat_pembayaran'
                $stmt_insert_riwayat = $pdo->prepare("INSERT INTO riwayat_pembayaran (nama_tagihan, jumlah, tanggal_bayar, jatuh_tempo_asli) VALUES (?, ?, ?, ?)");
                $stmt_insert_riwayat->execute([
                    $tagihan['nama_tagihan'],
                    $tagihan['jumlah'],
                    date('Y-m-d'), // Tanggal pembayaran hari ini
                    $tagihan['jatuh_tempo'] // Jatuh tempo asli dari tagihan
                ]);

                // 3. Hapus dari tabel 'tagihan' (atau update status jika ingin tetap ada)
                $stmt_delete_tagihan = $pdo->prepare("DELETE FROM tagihan WHERE id = ?");
                $stmt_delete_tagihan->execute([$id]);

                echo json_encode(['message' => 'Tagihan berhasil ditandai sebagai Lunas dan dipindahkan ke riwayat.']);

            } else {
                // Logika Update Tagihan (Edit)
                $nama_tagihan = $input['nama_tagihan'] ?? null;
                $jumlah = $input['jumlah'] ?? null;
                $jatuh_tempo = $input['jatuh_tempo'] ?? null;
                // Status akan diupdate jika disediakan, jika tidak tetap status lama (atau default 'Belum Bayar')
                $update_fields = [];
                $update_values = [];

                if ($nama_tagihan !== null) { $update_fields[] = 'nama_tagihan = ?'; $update_values[] = $nama_tagihan; }
                if ($jumlah !== null) { $update_fields[] = 'jumlah = ?'; $update_values[] = $jumlah; }
                if ($jatuh_tempo !== null) { $update_fields[] = 'jatuh_tempo = ?'; $update_values[] = $jatuh_tempo; }
                if ($status !== null) { $update_fields[] = 'status = ?'; $update_values[] = $status; }

                if (empty($update_fields)) {
                    http_response_code(400);
                    echo json_encode(['error' => 'Tidak ada data untuk diperbarui.']);
                    exit();
                }

                $sql = "UPDATE tagihan SET " . implode(', ', $update_fields) . " WHERE id = ?";
                $update_values[] = $id;

                $stmt = $pdo->prepare($sql);
                $stmt->execute($update_values);
                echo json_encode(['message' => 'Tagihan berhasil diperbarui.']);
            }
            break;

        case 'DELETE':
            $id = $_GET['id'] ?? null;
            $type = $_GET['type'] ?? 'tagihan'; // Tentukan apakah menghapus tagihan atau riwayat

            if (!$id) {
                http_response_code(400);
                echo json_encode(['error' => 'ID wajib diisi.']);
                exit();
            }

            if ($type === 'tagihan') {
                $stmt = $pdo->prepare("DELETE FROM tagihan WHERE id = ?");
                $stmt->execute([$id]);
                echo json_encode(['message' => 'Tagihan berhasil dihapus.']);
            } elseif ($type === 'riwayat') {
                // Logika untuk menghapus dari tabel riwayat_pembayaran
                $stmt = $pdo->prepare("DELETE FROM riwayat_pembayaran WHERE id = ?");
                $stmt->execute([$id]);
                echo json_encode(['message' => 'Riwayat pembayaran berhasil dihapus.']);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'Tipe penghapusan tidak valid.']);
            }
            break;

        default:
            http_response_code(405);
            echo json_encode(['error' => 'Method not allowed.']);
            break;
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Server error: ' . $e->getMessage()]);
}
?>