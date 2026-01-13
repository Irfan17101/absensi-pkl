@extends('layouts.app')

@section('title', 'Absensi Anggota PKL')

@section('content')

<div class="row">
    <div class="col-md-6">

        {{-- FORM ABSENSI --}}
        <div class="card mb-4">
            <div class="card-header fw-bold">
                Form Absensi Hari Ini
            </div>

            <div class="card-body">
                <form action="/absensi" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Status Kehadiran</label>
                        <select name="status" class="form-select" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="hadir">Hadir</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan (Opsional)</label>
                        <textarea name="keterangan" class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Simpan Absensi
                    </button>
                </form>
            </div>
        </div>

    </div>

    <div class="col-md-12">

        {{-- TABEL RIWAYAT ABSENSI --}}
        <div class="card">
            <div class="card-header fw-bold">
                Riwayat Absensi
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($absensis as $absensi)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $absensi->tanggal->format('d-m-Y') }}</td>
                                <td>{{ $absensi->jam_masuk }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ ucfirst($absensi->status) }}
                                    </span>
                                </td>
                                <td>{{ $absensi->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">
                                    Belum ada data absensi
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- PAGINATION --}}
                <div class="mt-3">
                    {{ $absensis->links() }}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
