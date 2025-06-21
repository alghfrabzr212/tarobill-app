<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use App\Mail\TagihanBaruMail;
use Illuminate\Support\Facades\Mail;


class BillController extends Controller
{
    // JADWAL (tagihan mendatang)
    public function jadwal()
    {
        $jadwal = Bill::where('user_id', Auth::id())
            ->whereDate('tanggal_jatuh_tempo', '>', now())
            ->orderBy('tanggal_jatuh_tempo')
            ->get();

        return view('user.jadwal', compact('jadwal'));
    }

    // TAGIHAN (CRUD)
     public function index()
    {
        // === PERBAIKI DI SINI ===
        // Ambil hanya tagihan yang statusnya BUKAN 'Lunas'
        $tagihan = Bill::where('user_id', Auth::id())
                        ->where('status', '!=', 'Lunas') // <-- TAMBAHKAN FILTER INI
                        ->orderBy('tanggal_jatuh_tempo', 'asc') // Opsional: urutkan agar rapi
                        ->get();
        // =======================
        return view('user.tagihan.index', compact('tagihan'));
    }

    public function create()
    {
        return view('user.tagihan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tagihan' => 'required',
            'harga' => 'required|numeric',
            'tanggal_jatuh_tempo' => 'required|date',
        ]);
        try {
            //code...
            $tagihan = Bill::create([
                'user_id' => Auth::id(),
                'nama_tagihan' => $request->nama_tagihan,
                'harga' => $request->harga,
                'tanggal_jatuh_tempo' => $request->tanggal_jatuh_tempo,
                'status' => 'Belum Lunas',
            ]);

            // Kirim email notifikasi
           // $tagihan->load('user'); // penting agar $tagihan->user tidak null
           // Mail::to($tagihan->user->email)->send(new TagihanBaruMail($tagihan));

        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('user.bills.index')->with('success', 'Tagihan berhasil ditambahkan dan email notifikasi terkirim.');
    }


    public function edit($id)
    {
        $tagihan = Bill::where('user_id', Auth::id())->findOrFail($id);
        return view('user.tagihan.edit', compact('tagihan'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_tagihan' => 'required',
            'harga' => 'required|numeric',
            'tanggal_jatuh_tempo' => 'required|date',
            'status' => 'required',
        ]);

        $tagihan = Bill::where('user_id', Auth::id())->findOrFail($id);
        $tagihan->update($request->only('nama_tagihan', 'harga', 'tanggal_jatuh_tempo', 'status'));

        return redirect()->route('user.bills.index')->with('success', 'Tagihan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tagihan = Bill::where('user_id', Auth::id())->findOrFail($id);
        $tagihan->delete();

        return redirect()->route('user.bills.index')->with('success', 'Tagihan berhasil dihapus.');
    }

    // RIWAYAT
    public function riwayat()
    {
        $riwayat = Bill::where('user_id', Auth::id())
            ->where(function ($q) {
                $q->whereDate('tanggal_jatuh_tempo', '<=', now())
                    ->orWhere('status', 'Lunas');
            })
            ->orderBy('tanggal_jatuh_tempo', 'desc')
            ->get();

        return view('user.riwayat', compact('riwayat'));
    }
}
