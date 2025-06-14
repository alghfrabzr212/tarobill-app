<?php
// config.php - Konfigurasi Database SQLite

class Database {
    private $db_file; // Akan diinisialisasi dengan path absolut
    private $pdo;
    
    public function __construct() {
        // Tentukan path absolut ke file database
        // __DIR__ adalah direktori tempat file config.php berada (e.g., C:\xampp\htdocs\tarobill-app\api)
        // '/../tarobill.db' berarti naik satu level folder, lalu cari tarobill.db
        $this->db_file = __DIR__ . '/../tarobill.db';

        try {
            $this->pdo = new PDO('sqlite:' . $this->db_file);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->createTables();
        } catch (PDOException $e) {
            // Jika koneksi gagal, cetak pesan error dan hentikan eksekusi
            die("Koneksi database gagal: " . $e->getMessage() . " Pastikan file 'tarobill.db' ada di lokasi yang benar: " . $this->db_file);
        }
    }
    
    public function getConnection() {
        return $this->pdo;
    }
    
    private function createTables() {
        // Tabel untuk tagihan aktif
        $sql_tagihan = "CREATE TABLE IF NOT EXISTS tagihan (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            nama_tagihan VARCHAR(255) NOT NULL,
            jumlah REAL NOT NULL, -- Dikoreksi: Menggunakan REAL untuk nilai desimal
            jatuh_tempo DATE NOT NULL,
            status VARCHAR(20) DEFAULT 'Belum Bayar',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        
        // Tabel untuk riwayat pembayaran
        $sql_riwayat = "CREATE TABLE IF NOT EXISTS riwayat_pembayaran (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            tagihan_id INTEGER NOT NULL, -- Ditambahkan: Kolom untuk ID tagihan asli
            nama_tagihan VARCHAR(255) NOT NULL,
            jumlah REAL NOT NULL, -- Dikoreksi: Menggunakan REAL untuk nilai desimal
            tanggal_bayar DATE NOT NULL,
            jatuh_tempo_asli DATE NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";

        // Tabel baru untuk pengingat Telegram
        $sql_telegram_reminders = "CREATE TABLE IF NOT EXISTS telegram_reminders (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            tagihan_id INTEGER NOT NULL,
            nama_tagihan VARCHAR(255) NOT NULL,
            jumlah_tagihan REAL NOT NULL, -- Dikoreksi: Menggunakan REAL untuk nilai desimal
            jatuh_tempo_tagihan DATE NOT NULL,
            scheduled_time DATETIME NOT NULL, -- Waktu kapan pengingat harus dikirim
            telegram_chat_id VARCHAR(255), -- ID chat Telegram (bisa null jika untuk semua user)
            status VARCHAR(20) DEFAULT 'pending', -- pending, sent, failed
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            sent_at DATETIME -- Waktu kapan pengingat benar-benar dikirim
        )";
        
        $this->pdo->exec($sql_tagihan);
        $this->pdo->exec($sql_riwayat);
        $this->pdo->exec($sql_telegram_reminders); // Eksekusi pembuatan tabel baru
        
        // Insert sample data jika tabel kosong
        $this->insertSampleData();
    }
    
    private function insertSampleData() {
        $count = $this->pdo->query("SELECT COUNT(*) FROM tagihan")->fetchColumn();
        
        if ($count == 0) {
            $sample_data = [
                ['Internet Bulanan', 250000.00, '2025-06-20', 'Belum Bayar'], // Pastikan ini float/real
                ['Listrik PLN', 120000.00, '2025-06-25', 'Belum Bayar'],   // Pastikan ini float/real
                ['Air PDAM', 75000.00, '2025-06-10', 'Belum Bayar']     // Pastikan ini float/real
            ];
            
            $stmt = $this->pdo->prepare("INSERT INTO tagihan (nama_tagihan, jumlah, jatuh_tempo, status) VALUES (?, ?, ?, ?)");
            
            foreach ($sample_data as $data) {
                $stmt->execute($data);
            }
        }
    }
}

// Inisialisasi database
// Ini akan membuat objek Database dan secara otomatis menjalankan createTables()
// dan insertSampleData() jika database belum ada atau tabel kosong.
$database = new Database();
$pdo = $database->getConnection();
?>