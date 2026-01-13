@extends('layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
<div class="container-fluid px-3 px-md-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/anggota" class="text-decoration-none">Data Anggota</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah Anggota</li>
                </ol>
            </nav>
            <h1 class="h3 mb-1 text-dark">Tambah Anggota PKL</h1>
            <p class="text-muted mb-0">Tambahkan data anggota baru untuk sistem absensi PKL</p>
        </div>
        <a href="/admin/anggota" class="btn btn-outline-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            {{-- Form Card --}}
            <div class="card card-elevated border-0">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="mb-0 text-dark fw-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-plus me-2 text-primary" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                        Form Tambah Anggota
                    </h5>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="/admin/anggota" id="anggotaForm">
                        @csrf

                        {{-- Nama --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill me-1" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4 1 1 1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                </svg>
                                Nama Lengkap
                            </label>
                            <input type="text" 
                                   name="name" 
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   placeholder="Masukkan nama lengkap anggota"
                                   value="{{ old('name') }}"
                                   required
                                   autofocus>
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-exclamation-circle me-1" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">Nama lengkap sesuai dengan identitas resmi</div>
                        </div>

                        {{-- Email --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill me-1" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                </svg>
                                Alamat Email
                            </label>
                            <input type="email" 
                                   name="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   placeholder="contoh: anggota@email.com"
                                   value="{{ old('email') }}"
                                   required>
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-exclamation-circle me-1" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">Email akan digunakan untuk login ke sistem</div>
                        </div>

                        {{-- Password --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill me-1" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                Password
                            </label>
                            <div class="input-group">
                                <input type="password" 
                                       name="password" 
                                       id="password"
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                       placeholder="Minimal 8 karakter"
                                       required>
                                <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" id="eyeIcon" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-exclamation-circle me-1" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-text">Password minimal 8 karakter, gunakan kombinasi huruf dan angka</div>
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill me-1" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                Konfirmasi Password
                            </label>
                            <div class="input-group">
                                <input type="password" 
                                       name="password_confirmation" 
                                       id="password_confirmation"
                                       class="form-control form-control-lg" 
                                       placeholder="Ketik ulang password"
                                       required>
                                <button type="button" class="btn btn-outline-secondary" onclick="toggleConfirmPassword()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" id="eyeIconConfirm" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="form-text">Pastikan password yang dimasukkan sama</div>
                        </div>

                        {{-- Form Actions --}}
                        <div class="d-flex gap-2 pt-3 border-top">
                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check-circle me-2" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                                Simpan Data
                            </button>
                            <a href="/admin/anggota" class="btn btn-outline-secondary btn-lg px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x-circle me-2" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Sidebar Info --}}
        <div class="col-lg-4">
            <div class="card card-elevated border-0 mb-4">
                <div class="card-header bg-white border-bottom py-3">
                    <h5 class="mb-0 text-dark fw-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-info-circle me-2 text-primary" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>
                        Informasi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-info border-0 bg-info bg-opacity-10">
                        <h6 class="alert-heading fw-semibold mb-2">Petunjuk Pengisian:</h6>
                        <ul class="mb-0 ps-3">
                            <li class="mb-1">Pastikan data yang dimasukkan valid dan sesuai</li>
                            <li class="mb-1">Email harus unik dan belum terdaftar</li>
                            <li class="mb-1">Password minimal 8 karakter</li>
                            <li class="mb-1">Anggota akan dapat login setelah data disimpan</li>
                            <li class="mb-1">Default role anggota adalah "anggota"</li>
                        </ul>
                    </div>
                    
                    <div class="mt-4">
                        <h6 class="fw-semibold text-dark mb-3">Data yang akan dibuat:</h6>
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person text-primary" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1h10Z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="small text-muted">Role Default</div>
                                <div class="fw-medium text-dark">Anggota</div>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-calendar-check text-success" viewBox="0 0 16 16">
                                    <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="small text-muted">Akses Sistem</div>
                                <div class="fw-medium text-dark">Absensi Saya</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    // Toggle password visibility
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('class', 'bi bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('class', 'bi bi-eye');
        }
    }
    
    // Toggle confirm password visibility
    function toggleConfirmPassword() {
        const passwordInput = document.getElementById('password_confirmation');
        const eyeIcon = document.getElementById('eyeIconConfirm');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('class', 'bi bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('class', 'bi bi-eye');
        }
    }
    
    // Form validation
    document.getElementById('anggotaForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;
        
        if (password !== confirmPassword) {
            e.preventDefault();
            alert('Password dan Konfirmasi Password tidak sama!');
            return false;
        }
        
        if (password.length < 8) {
            e.preventDefault();
            alert('Password minimal 8 karakter!');
            return false;
        }
    });
</script>

<style>
    .form-control-lg {
        padding: 0.75rem 1rem;
        font-size: 1rem;
    }
    
    .form-label {
        font-size: 0.875rem;
        letter-spacing: 0.3px;
    }
    
    .form-text {
        font-size: 0.8rem;
        margin-top: 0.375rem;
    }
    
    .input-group .btn-outline-secondary {
        border-left: 0;
        border-color: #dee2e6;
    }
    
    .input-group .btn-outline-secondary:hover {
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }
    
    .breadcrumb {
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
    }
    
    .breadcrumb-item a {
        color: #6c757d;
    }
    
    .breadcrumb-item.active {
        color: #495057;
        font-weight: 500;
    }
    
    .alert-info {
        border: 1px solid rgba(13, 202, 240, 0.25);
    }
    
    .alert-info ul {
        margin-bottom: 0;
    }
</style>
@endsection