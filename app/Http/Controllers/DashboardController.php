<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Fungsi helper untuk memastikan user sudah login
    private function getUser()
    {
        if (!session('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return DB::table('users')->where('id', session('user_id'))->first();
    }

    public function index()
    {
        $user = $this->getUser();
        if (is_object($user) === false) return $user; // Jika redirect, kembalikan
        return view('dashboard.index', compact('user'));
    }

    public function course()
    {
        $user = $this->getUser();
        if (is_object($user) === false) return $user;
        return view('dashboard.course', compact('user'));
    }

    public function participant()
    {
        $user = $this->getUser();
        if (is_object($user) === false) return $user;
        return view('dashboard.participant', compact('user'));
    }

    public function enrollment()
    {
        $user = $this->getUser();
        if (is_object($user) === false) return $user;
        return view('dashboard.enrollment', compact('user'));
    }

    public function akunStaff()
    {
        $user = $this->getUser();
        if (is_object($user) === false) return $user;
        return view('dashboard.akun-staff', compact('user'));
    }
}