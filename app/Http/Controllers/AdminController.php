<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // jumlah anggota PKL (role anggota)
        $totalAnggota = User::where('role', 'anggota')->count();

        // total absensi
        $totalAbsensi = Absensi::count();

        // absensi hari ini
        $absensiHariIni = Absensi::whereDate('tanggal', Carbon::today())->count();

        // absensi terbaru (limit 5)
        $absensiTerbaru = Absensi::with('user')
            ->orderBy('tanggal', 'desc')
            ->orderBy('jam_masuk', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalAnggota',
            'totalAbsensi',
            'absensiHariIni',
            'absensiTerbaru'
        ));
    }
}
