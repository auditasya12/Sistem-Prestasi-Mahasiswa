@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <!-- Alert dengan Bootstrap -->
                <div id="myAlert" class="alert alert-block alert-success alert-dismissible fade show" role="alert">
                    Selamat Datang di <strong>Sistem Informasi Prestasi Mahasiswa</strong>
                    <button type="button" class="close" onclick="hideAlert()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('admin.dashboard-porto') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Portofolio Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    {{ $alltot }}
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('admin.mahasiswa-dashboard') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Mahasiswa</h4>
                                </div>
                                <div class="card-body">
                                    {{ $mahasiswa }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <a href="{{ route('user.index') }}">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-medal"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>User</h4>
                            </div>
                            <div class="card-body">
                                {{ $user }}
                            </div>
                        </div>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </section>
@endsection
