@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')
<div class="container-fluid px-3 px-md-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/anggota" class="text-decoration-none">Data Anggota</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Anggota</li>
                </ol>
            </nav>
            <h1 class="h3 mb-1 text-dark">Edit Anggota PKL</h1>
            <p class="text-muted mb-0">Perbarui data anggota sistem absensi PKL</p>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-gear me-2 text-primary" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
                        </svg>
                        Form Edit Anggota
                    </h5>
                </div>
                
                <div class="card-body">
                    <form method="POST" action="/admin/anggota/{{ $anggota->id }}" id="editAnggotaForm">
                        @csrf
                        @method('PUT')

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
                                   value="{{ old('name', $anggota->name) }}"
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
                                   value="{{ old('email', $anggota->email) }}"
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
                        </div>

                        {{-- Divider --}}
                        <div class="my-4 position-relative">
                            <hr>
                            <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted small">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-key me-1" viewBox="0 0 16 16">
                                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                </svg>
                                Ubah Password (Opsional)
                            </span>
                        </div>

                        {{-- Password Baru --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill me-1" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                Password Baru
                                <small class="text-muted fw-normal">(kosongkan jika tidak ingin mengubah)</small>
                            </label>
                            <div class="input-group">
                                <input type="password" 
                                       name="password" 
                                       id="password"
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                       placeholder="Minimal 8 karakter">
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
                            <div class="form-text">Biarkan kosong jika tidak ingin mengubah password</div>
                        </div>

                        {{-- Konfirmasi Password --}}
                        <div class="mb-4">
                            <label class="form-label fw-medium text-dark mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill me-1" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                                Konfirmasi Password Baru
                            </label>
                            <div class="input-group">
                                <input type="password" 
                                       name="password_confirmation" 
                                       id="password_confirmation"
                                       class="form-control form-control-lg" 
                                       placeholder="Ketik ulang password baru">
                                <button type="button" class="btn btn-outline-secondary" onclick="toggleConfirmPassword()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" id="eyeIconConfirm" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="form-text">Diisi hanya jika mengubah password</div>
                        </div>

                        {{-- Form Actions --}}
                        <div class="d-flex gap-2 pt-3 border-top">
                            <button type="submit" class="btn btn-primary btn-lg px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check-circle me-2" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                                Update Data
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
                        Informasi Anggota
                    </h5>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($anggota->name) }}&background=0D6EFD&color=fff&size=80" 
                             alt="{{ $anggota->name }}" 
                             class="rounded-circle border border-primary border-3 mb-3"
                             width="80"
                             height="80">
                        <h5 class="fw-bold text-dark mb-1">{{ $anggota->name }}</h5>
                        <div class="text-muted">{{ $anggota->email }}</div>
                    </div>
                    
                    <div class="mb-4">
                        <h6 class="fw-semibold text-dark mb-3">Detail Akun:</h6>
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-badge text-primary" viewBox="0 0 16 16">
                                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="small text-muted">Role</div>
                                <div class="fw-medium text-dark text-capitalize">{{ $anggota->role ?? 'anggota' }}</div>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-calendar-date text-success" viewBox="0 0 16 16">
                                    <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-.829 2-1.875 0-1.094-.781-1.828-1.953-1.875V8.5c.863.063 1.539.688 1.563 1.609h-1.203c-.029-.354-.305-.719-.75-.719-.5 0-.75.398-.75.969v.328c0 .518.41.781 1.023.781.617 0 1.031-.391 1.031-1.016 0-.68-.469-1.203-1.203-1.203-.656 0-1.172.328-1.172.875v.063h-.75zm2.062-3.516V5.344h-1.78v.89h.89v.375h-.89v.703h1.78V8.5H8.312V7.531h-.75V6.5h.75v-.875z"/>
                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="small text-muted">Tanggal Bergabung</div>
                                <div class="fw-medium text-dark">{{ $anggota->created_at->translatedFormat('d F Y') }}</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-warning border-0 bg-warning bg-opacity-10">
                        <h6 class="alert-heading fw-semibold mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle me-2" viewBox="0 0 16 16">
                                <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                            </svg>
                            Perhatian
                        </h6>
                        <ul class="mb-0 ps-3 small">
                            <li class="mb-1">Pastikan data yang diubah sudah benar</li>
                            <li class="mb-1">Password bersifat opsional, diisi hanya jika ingin mengubah</li>
                            <li class="mb-1">Jika mengubah password, pastikan konfirmasi password sama</li>
                            <li class="mb-1">Perubahan email akan mempengaruhi proses login</li>
                        </ul>
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
    document.getElementById('editAnggotaForm').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;
        
        // If password is filled, validate it
        if (password !== '') {
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password baru dan Konfirmasi Password tidak sama!');
                return false;
            }
            
            if (password.length < 8) {
                e.preventDefault();
                alert('Password baru minimal 8 karakter!');
                return false;
            }
        }
        
        // If password is empty but confirmation is filled, show warning
        if (password === '' && confirmPassword !== '') {
            e.preventDefault();
            alert('Harap isi password baru jika ingin mengkonfirmasi password!');
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
    
    .alert-warning {
        border: 1px solid rgba(255, 193, 7, 0.25);
    }
    
    .alert-warning ul {
        margin-bottom: 0;
    }
    
    .position-relative hr {
        border-top: 2px dashed #dee2e6;
    }
    
    .position-absolute span {
        font-size: 0.75rem;
        white-space: nowrap;
    }
</style>
@endsection