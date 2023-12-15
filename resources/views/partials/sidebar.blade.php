<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mt-4 mb-3">
            <!-- <img src="{{ asset('assets/img/logoprestof.jpeg') }}" alt="logoprestof" width="200" class="shadow-lights"> -->
            <h3 class="badge badge-info"><b>
                SISITEM INFORMASI
            <br>
                PRESTASI MAHASISWA</b>
            </h3>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">{{ strtoupper(substr(config('app.name'), 0, 2)) }}</a>
        </div>
        <ul class="sidebar-menu">
            @if (Auth::check() && Auth::user()->roles == 'admin')
            <li class="{{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-dashboard"></i> <span>Dashboard</span></a></li>
            <hr style="width:220px;color:#000">

            <li class="menu-header">Master Data</li>
            <!-- <li class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('kategori.index') }}"><i class="fas fa-solid fa-lines-leaning"></i> <span>Kelola Kategori</span></a></li> -->
            <li class="{{ request()->routeIs('angkatan.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('angkatan.index') }}"><i class="fas fa-solid fa-people-roof"></i> <span>Kelola Angkatan</span></a></li>
            <hr style="width:220px;color:#000">

            <li class="menu-header">Data Prestasi</li>
<!-- 
            <li class="{{ request()->routeIs('jurusan.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('jurusan.index') }}"><i class="fas fa-book"></i> <span>Jurusan</span></a></li>

            <li class="{{ request()->routeIs('mapel.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('mapel.index') }}"><i class="fas fa-book"></i> <span>Mata Pelajaran</span></a></li>

            <li class="{{ request()->routeIs('guru.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('guru.index') }}"><i class="fas fa-user"></i> <span>Guru</span></a></li>

            <li class="{{ request()->routeIs('kelas.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('kelas.index') }}"><i class="far fa-building"></i> <span>Kelas</span></a></li> -->

            <!-- <li class="{{ request()->routeIs('siswa.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('siswa.index') }}"><i class="fas fa-users"></i> <span>Siswa</span></a></li> -->

            <!-- <li class="{{ request()->routeIs('jadwal.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('jadwal.index') }}"><i class="fas fa-calendar"></i> <span>Jadwal</span></a></li>
            
            <li class="{{ request()->routeIs('user.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-user"></i> <span>User</span></a></li>
            
            <li class="menu-header">Data Ubah</li>  -->

            <li class="{{ request()->routeIs('admin.dashboard-porto.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard-porto') }}"><i class="fas fa-columns"></i> <span>Portofolio Mahasiswa</span></a></li>
            
            <li class="{{ request()->routeIs('admin.mahasiswa-dashboard.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.mahasiswa-dashboard') }}"><i class="fas fa-users"></i> <span>Kelola Mahasiswa</span></a></li>
            <hr style="width:220px;color:#000">
            
            <li class="{{ request()->routeIs('user.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-key"></i> <span>User</span></a></li>
            
            @elseif (Auth::check() && Auth::user()->roles == 'mahasiswa')
            <li class="{{ request()->routeIs('mahasiswa.dashboard.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('mahasiswa.dashboard') }}"><i class="fas fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="{{ request()->routeIs('mahasiswa.portofolio.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('mahasiswa.portofolio') }}"><i class="fas fa-user"></i> <span>Profil</span></a></li>
            <li class="{{ request()->routeIs('mahasiswa.app-dashboard.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('mahasiswa.app-dashboard') }}"><i class="fas fa-trophy"></i> <span>Capaian Unggulan</span></a></li>
            
            @endif

        </ul>
    </aside>
</div>
