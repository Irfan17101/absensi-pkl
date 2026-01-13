<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function __construct()
    {
        // pastikan user sudah login
        $this->middleware('auth');
    }

    /**
     * Tampilkan daftar absensi
     * - Admin: semua absensi (filter tanggal & user)
     * - Anggota: hanya absensi sendiri
     */
    public function index(Request $request)
    {
        $user   = Auth::user();
        $date   = $request->query('date');
        $userId = $request->query('user_id');

        // ================= ADMIN =================
        if ($user->role === 'admin') {

            $query = Absensi::with('user')
                ->orderBy('tanggal', 'desc')
                ->orderBy('jam_masuk', 'desc');

            if ($date) {
                $query->whereDate('tanggal', $date);
            }

            if ($userId) {
                $query->where('user_id', $userId);
            }

            $absensis = $query->paginate(20);

            return view('admin.absensi.index', compact(
                'absensis',
                'date',
                'userId'
            ));
        }

        // ================= ANGGOTA =================
        $query = Absensi::where('user_id', $user->id)
            ->orderBy('tanggal', 'desc')
            ->orderBy('jam_masuk', 'desc');

        if ($date) {
            $query->whereDate('tanggal', $date);
        }

        $absensis = $query->paginate(20);

        return view('anggota.absensi.index', compact(
            'absensis',
            'date'
        ));
    }

    /**
     * Simpan absensi (1x per hari)
     */
    public function store(Request $request)
    {
        $request->validate([
            'status'     => 'required|in:hadir,izin,sakit',
            'keterangan' => 'nullable|string|max:1000',
        ]);

        $user  = Auth::user();
        $today = Carbon::today()->toDateString();

        // Cegah absen ganda di hari yang sama
        $already = Absensi::where('user_id', $user->id)
            ->whereDate('tanggal', $today)
            ->exists();

        if ($already) {
            return back()->with('error', 'Anda sudah melakukan absensi hari ini.');
        }

        Absensi::create([
            'user_id'    => $user->id,
            'tanggal'    => $today,
            'jam_masuk'  => Carbon::now()->format('H:i:s'),
            'status'     => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Absensi berhasil dicatat.');
    }

    /**
     * Detail absensi
     * Admin & pemilik data saja
     */
    public function show(Absensi $absensi)
    {
        $user = Auth::user();

        if ($user->role !== 'admin' && $absensi->user_id !== $user->id) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return view('absensi.show', compact('absensi'));
    }

    /**
     * Hapus absensi
     * Admin & pemilik data
     */
    public function destroy(Absensi $absensi)
    {
        $user = Auth::user();

        if ($user->role !== 'admin' && $absensi->user_id !== $user->id) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        $absensi->delete();

        return back()->with('success', 'Data absensi berhasil dihapus.');
    }
}
