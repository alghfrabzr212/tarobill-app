<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Ambil tagihan yang belum lunas atau akan datang (misal: status = 'pending')
        $jadwal = Bill::where('user_id', Auth::id())
                    ->whereIn('status', ['pending', 'belum dibayar']) // sesuaikan dengan data
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

    public function createTagihan()
{
    return view('user.tagihan.create');
}



}
