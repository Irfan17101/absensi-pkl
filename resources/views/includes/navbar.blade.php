<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container-fluid">
        <div class="d-flex align-items-center gap-3">
            {{-- Toggle sidebar (mobile) --}}
            <button class="btn btn-outline-primary d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M2.5 12.5A.5.5 0 0 1 3 12h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 8h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 4h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                <span class="visually-hidden">Toggle Menu</span>
            </button>

            <a class="navbar-brand nav-brand ms-1" href="{{ auth()->check() ? (auth()->user()->role === 'admin' ? url('/admin') : url('/absensi')) : url('/') }}">
                <span class="d-none d-sm-inline">SIMP • Absensi PKL</span>
                <span class="d-sm-none">SIMP PKL</span>
            </a>
        </div>

        <div class="d-flex align-items-center">
            @auth
                <div class="me-3 text-muted small d-none d-md-block">
                    Halo, <strong>{{ auth()->user()->name }}</strong> • <span class="text-capitalize">{{ auth()->user()->role }}</span>
                </div>

                {{-- Mobile user info --}}
                <div class="me-3 d-md-none">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D6EFD&color=fff&size=32" 
                         alt="{{ auth()->user()->name }}" 
                         class="rounded-circle border border-primary">
                </div>

                {{-- Logout --}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                <button class="btn btn-outline-danger btn-sm" onclick="submitLogout()">
                    <span class="d-none d-sm-inline">Logout</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right d-sm-none" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                </button>
            @endauth
        </div>
    </div>
</nav>