<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
{
    $totalUsers = User::where('role', 'user')->count();

    return view('admin.dashboard', compact('totalUsers'));
}



}
