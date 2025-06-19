<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.accounts.manager', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Tidak bisa menghapus admin.');
        }

        $user->delete();
        return redirect()->back()->with('success', 'Akun user berhasil dihapus.');
    }
}
