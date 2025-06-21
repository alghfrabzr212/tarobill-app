<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; // Tambahkan ini untuk manipulasi tanggal

class UserController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $today = Carbon::today();
        $sevenDaysLater = Carbon::today()->addDays(7); // Atau rentang lain yang Anda inginkan

        $jadwal = Bill::where('user_id', $userId)
            ->where('status', 'Belum Lunas') // Sesuaikan dengan status Anda
            ->where('tanggal_jatuh_tempo', '>=', $today)
            ->where('tanggal_jatuh_tempo', '<=', $sevenDaysLater)
            ->orderBy('tanggal_jatuh_tempo', 'asc')
            ->get();

        return view('user.dashboard', compact('jadwal'));
    }
    
    public function tagihan()
    {
    $tagihan = Bill::where('user_id', Auth::id())
                    ->where('status', '!=', 'lunas')
                    ->orderBy('tanggal_jatuh_tempo')
                    ->get();
    return view('user.tagihan.index', compact('tagihan'));
    }

    public function riwayat()
    {
    $riwayat = Bill::where('user_id', Auth::id())
                    ->where('status', 'lunas')
                    ->orderByDesc('tanggal_jatuh_tempo')
                    ->get();
    return view('user.riwayat.index', compact('riwayat'));
    }


    public function jadwal()
    {
        $userId = Auth::id();
        $today = Carbon::today();
        $sevenDaysLater = Carbon::today()->addDays(7);

        $jadwalTagihan = Bill::where('user_id', $userId)
            ->where('status', 'Belum Lunas')
            ->where('tanggal_jatuh_tempo', '>=', $today)
            ->where('tanggal_jatuh_tempo', '<=', $sevenDaysLater)
            ->orderBy('tanggal_jatuh_tempo', 'asc')
            ->get();

        // Jika route user.jadwal ada, Anda bisa return view ini:
        return view('user.jadwal', compact('jadwalTagihan'));
        // Atau redirect ke dashboard jika Anda ingin:
        // return redirect()->route('user.dashboard');
    }
    public function createTagihan()
{
    return view('user.tagihan.create');
}



}
