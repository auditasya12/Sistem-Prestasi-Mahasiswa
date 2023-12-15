@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('aplikom.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fas fa-solid fa-mobile-screen"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Aplikom</h4>
                                </div>
                                <div class="card-body">
                                    {{ $aplikom }}
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('artikel.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-solid fa-file-pdf"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Artikel</h4>
                                </div>
                                <div class="card-body">
                                {{ $artikel }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="{{ route('produk.index') }}">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-solid fa-cubes-stacked"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Desain Produk</h4>
                                </div>
                                <div class="card-body">
                                    {{ $produk }} 
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('buku.index') }}">    
                <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                        <i class="fas fa-solid fa-book-bookmark"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Buku</h4>
                            </div>
                            <div class="card-body">
                                {{$buku}}
                            </div>
                        </div>
                    </div>
                </a>
                </div>
              
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="{{ route('film.index') }}">   
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                        <i class="fas fa-solid fa-film"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Film</h4>
                            </div>
                            <div class="card-body">
                                {{$film}}
                            </div>
                        </div>
                    </div>
                </a>
                </div>
              
            </div>
        </div>
    </section>
@endsection
