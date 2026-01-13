@php
    $user = auth()->user();
    $currentPath = request()->path();
    
    // Function untuk menentukan active state
    function isActive($paths, $currentPath) {
        if (is_array($paths)) {
            foreach ($paths as $path) {
                if (str_starts_with($currentPath, $path)) {
                    return true;
                }
            }
            return false;
        }
        return str_starts_with($currentPath, $paths);
    }
@endphp

<!-- Desktop sidebar -->
<aside class="d-none d-lg-block bg-white border-end app-sidebar">
    <div class="p-3">
        <div class="d-flex align-items-center mb-4">
            <div class="me-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(optional($user)->name ?? 'User') }}&background=0D6EFD&color=fff&size=48" 
                     alt="avatar" 
                     class="rounded-circle border border-primary">
            </div>
            <div>
                <div class="fw-bold text-truncate" style="max-width: 180px;">{{ optional($user)->name }}</div>
                <div class="text-muted small text-capitalize badge bg-light text-dark">{{ optional($user)->role }}</div>
            </div>
        </div>

        <hr class="my-3">

        <ul class="nav nav-pills flex-column">
            @if($user && $user->role === 'admin')
                <li class="nav-item mb-1">
                    <a href="/admin" class="nav-link sidebar-link d-flex align-items-center {{ $currentPath === 'admin' ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer2 me-2" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923 1.959c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
                        </svg>
                        <span class="text-dark {{ $currentPath === 'admin' ? 'text-primary fw-semibold' : '' }}">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin/anggota" class="nav-link sidebar-link d-flex align-items-center {{ isActive(['admin/anggota'], $currentPath) ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people me-2" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                        </svg>
                        <span class="text-dark {{ isActive(['admin/anggota'], $currentPath) ? 'text-primary fw-semibold' : '' }}">Data Anggota</span>
                    </a>
                </li>
                <li class="nav-item mb-1">
                    <a href="/admin/absensi" class="nav-link sidebar-link d-flex align-items-center {{ isActive(['admin/absensi'], $currentPath) ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check me-2" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                        <span class="text-dark {{ isActive(['admin/absensi'], $currentPath) ? 'text-primary fw-semibold' : '' }}">Absensi</span>
                    </a>
                </li>
            @else
                <li class="nav-item mb-1">
                    <a href="/absensi" class="nav-link sidebar-link d-flex align-items-center {{ $currentPath === 'absensi' ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check me-2" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                        <span class="text-dark {{ $currentPath === 'absensi' ? 'text-primary fw-semibold' : '' }}">Absensi Saya</span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</aside>

<!-- Offcanvas sidebar (mobile) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
    <div class="offcanvas-header border-bottom">
        <div class="d-flex align-items-center">
            <div class="me-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode(optional($user)->name ?? 'User') }}&background=0D6EFD&color=fff&size=40" 
                     alt="avatar" 
                     class="rounded-circle border border-primary">
            </div>
            <div>
                <h6 class="offcanvas-title mb-0 text-dark">{{ optional($user)->name }}</h6>
                <small class="text-muted text-capitalize badge bg-light text-dark">{{ optional($user)->role }}</small>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <ul class="nav flex-column">
            @if($user && $user->role === 'admin')
                <li class="nav-item">
                    <a href="/admin" class="nav-link px-4 py-3 border-bottom text-dark {{ $currentPath === 'admin' ? 'bg-light text-primary fw-semibold' : '' }}">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer2 me-2" viewBox="0 0 16 16">
                                <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923 1.959c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
                            </svg>
                            Dashboard
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/anggota" class="nav-link px-4 py-3 border-bottom text-dark {{ isActive(['admin/anggota'], $currentPath) ? 'bg-light text-primary fw-semibold' : '' }}">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people me-2" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                            </svg>
                            Data Anggota
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/absensi" class="nav-link px-4 py-3 border-bottom text-dark {{ isActive(['admin/absensi'], $currentPath) ? 'bg-light text-primary fw-semibold' : '' }}">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check me-2" viewBox="0 0 16 16">
                                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                            Absensi
                        </div>
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a href="/absensi" class="nav-link px-4 py-3 border-bottom text-dark {{ $currentPath === 'absensi' ? 'bg-light text-primary fw-semibold' : '' }}">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check me-2" viewBox="0 0 16 16">
                                <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                            Absensi Saya
                        </div>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>