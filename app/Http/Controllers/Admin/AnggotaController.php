<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Tampilkan daftar anggota PKL
     */
    public function index()
    {
        $anggota = User::where('role', 'anggota')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.anggota.index', compact('anggota'));
    }

    /**
     * Form tambah anggota
     */
    public function create()
    {
        return view('admin.anggota.create');
    }

    /**
     * Simpan anggota baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => 'password123', // otomatis di-hash oleh mutator User
            'role'     => 'anggota',
        ]);

        return redirect('/admin/anggota')
            ->with('success', 'Anggota PKL berhasil ditambahkan.');
    }

    /**
     * Form edit anggota
     */
    public function edit(User $anggota)
    {
        return view('admin.anggota.edit', compact('anggota'));
    }

    /**
     * Update data anggota + ganti password (opsional)
     */
    public function update(Request $request, User $anggota)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:users,email,' . $anggota->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        // ✅ password hanya diupdate jika diisi
        if ($request->filled('password')) {
            $data['password'] = $request->password;
            // otomatis di-hash oleh mutator User
        }

        $anggota->update($data);

        return redirect('/admin/anggota')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    /**
     * Hapus anggota
     */
    public function destroy(User $anggota)
    {
        $anggota->delete();

        return back()->with('success', 'Anggota berhasil dihapus.');
    }
}
