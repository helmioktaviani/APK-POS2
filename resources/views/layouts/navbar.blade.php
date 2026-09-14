<!-- Load Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- 1. WAJIB ADA: Tag pembuka <nav> dengan class bootstrap yang benar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-2">
    <div class="container-fluid">
        
        <!-- NAMA BRAND PENGGANTI TULISAN POS -->
        <a class="navbar-brand fw-bold text-primary" href="#">TOKO KOSMETIK</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- DAFTAR MENU -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}" href="{{ route('admin.users') }}">Users</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('produk*') ? 'active' : '' }}" href="{{ route('produk.index') }}">Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('penjualan*') ? 'active' : '' }}" href="{{ route('penjualan.index') }}">Penjualan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('Tentang*') ? 'active' : '' }}" href="{{ route('Tentang kami') }}">Tentang Kami</a>
                </li>
            </ul>

            <!-- 2. DIPERBAIKI: Form Logout yang rapi di sisi kanan (Method diganti POST) -->
            <form class="d-flex" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm px-3">Logout</button>
            </form>
            
        </div>
    </div>
</nav>
