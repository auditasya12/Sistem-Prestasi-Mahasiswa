@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                    <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('kompetisi.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Kompetisi</h4>
                                </div>
                                <div class="card-body">
                                    {{ $kompetisi }}
                                </div>
                            </div>
                        </div>
                    </a>
                    </div> -->
                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('penghargaan.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-medal"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Penghargaan</h4>
                                </div>
                                <div class="card-body">
                                {{ $penghargaan }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('organisasi.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-solid fa-hands-bound"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Karir Organisasi</h4>
                                </div>
                                <div class="card-body">
                                    {{ $organisasi }} 
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('admin.dashboard-subporto') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                            <i class="fas fa-solid fa-hands-bound"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Hasil Karya</h4>
                                </div>
                                <div class="card-body">
                                    {{$tot}}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
               -->
              
            </div>
        </div>
    </section>
@endsection
