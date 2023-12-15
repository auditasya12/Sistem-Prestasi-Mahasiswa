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
                    Selamat Datang {{ auth()->user()->name }} di <strong>Sistem Informasi Prestasi Mahasiswa</strong>
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
                                    <h4>Total Ajuan Capaian Unggulan</h4>
                                </div>
                                <div class="card-body">
                                    {{ $alltots }}
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
                                <h4>Capaian Unggulan Terverifikasi</h4>
                            </div>
                            <div class="card-body">
                                {{ $trmtot }}
                            </div>
                        </div>
                    </div>
                </a>
                </div>
            </div>
        </div>
    </section>
@endsection
