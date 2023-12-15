@extends('layouts.main')
@section('title', 'List Ajuan Portofolio')

@section('content')
<section class="section custom-section">
<div class="section-header">
            <h1>Pengajuan</h1>
        </div>
<div class="section-body">
@if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ $message }}
                            </div>
                        </div>
                        @endif
            <div class="row">
           
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fas fa-trophy mt-4"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header mb-1">
                                    <h4>Total Kompetisi Disetujui :  {{ $kompetisis }}</h4>
                                </div> 
                                <div class="card-body d-flex mb-1">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalKompetisi">
                                    <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Ajuan
                                </button>
                                <button class="btn btn-success ml-2" data-toggle="modal" data-target="#infoKompetisi">
                                    <i class="nav-icon fas fa-search"></i>&nbsp; Detail
                                </button>
                                </div>
                            </div>
                        </div>
            </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-medal   mt-4"></i>
                            </div>
                            <div class="card-wrap">
                            <div class="card-header mb-1">
                                    <h4>Total Penghargaan Disetujui :  {{ $penghargaan }}</h4>
                                </div> 
                                <div class="card-body d-flex mb-1">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalPenghargaan">
                                    <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Ajuan
                                </button>
                                <button class="btn btn-success ml-2" data-toggle="modal" data-target="#infoPenghargaan">
                                    <i class="nav-icon fas fa-search"></i>&nbsp; Detail
                                </button>
                                </div>
                            </div>
                        </div>
                </div>
               
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-solid fa-seedling   mt-4"></i>
                            </div>
                            <div class="card-wrap">
                                 <div class="card-header mb-1">
                                    <h4>Total Karir Organisasi :  {{ $organisasi }}</h4>
                                </div> 
                                <div class="card-body d-flex mb-1">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalOrganisasi">
                                    <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Ajuan
                                </button>
                                <button class="btn btn-success ml-2" data-toggle="modal" data-target="#infoOrganisasi">
                                    <i class="nav-icon fas fa-search"></i>&nbsp; Detail
                                </button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-6 col-12">
                    <div id="myAlert" class="alert alert-block alert-info alert-dismissible fade show" role="alert">
                        <center><strong>HASIL KARYA </strong><i class="fa fa-arrow-down"></i></center>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                                <i class="fas fa-solid fa-mobile-screen  mt-4"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header mb-1">
                                    <h4>Total Aplikom Disetujui :  {{ $aplikom }}</h4>
                                </div> 
                                <div class="card-body d-flex mb-1">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAplikom">
                                    <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Ajuan
                                </button>
                                <button class="btn btn-success ml-2" data-toggle="modal" data-target="#infoAplikom">
                                    <i class="nav-icon fas fa-search"></i>&nbsp; Detail
                                </button>
                                </div>
                            </div>
                        </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-solid fa-file-pdf   mt-4"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header mb-1">
                                    <h4>Total Artikel Disetujui :  {{ $artikel }}</h4>
                                </div> 
                                <div class="card-body d-flex mb-1">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalArtikel">
                                    <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Ajuan
                                </button>
                                <button class="btn btn-success ml-2" data-toggle="modal" data-target="#infoArtikel">
                                    <i class="nav-icon fas fa-search"></i>&nbsp; Detail
                                </button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="fas fa-solid fa-cubes-stacked  mt-4"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header mb-1">
                                    <h4>Total Desain Produk Disetujui :  {{ $produk }}</h4>
                                </div> 
                                <div class="card-body d-flex mb-1">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalProduk">
                                    <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Ajuan
                                </button>
                                <button class="btn btn-success ml-2" data-toggle="modal" data-target="#infoProduk">
                                    <i class="nav-icon fas fa-search"></i>&nbsp; Detail
                                </button>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                        <i class="fas fa-solid fa-book mt-4"></i>
                        </div>
                        <div class="card-wrap">
                                <div class="card-header mb-1">
                                    <h4>Total Buku Disetujui :  {{ $buku }}</h4>
                                </div> 
                                <div class="card-body d-flex mb-1">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalBuku">
                                    <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Ajuan
                                </button>
                                <button class="btn btn-success ml-2" data-toggle="modal" data-target="#infoBuku">
                                    <i class="nav-icon fas fa-search"></i>&nbsp; Detail
                                </button>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                        <i class="fas fa-solid fa-film mt-4"></i>
                        </div>
                        <div class="card-wrap">
                                <div class="card-header mb-1">
                                    <h4>Total Film Disetujui :  {{ $film }}</h4>
                                </div> 
                                <div class="card-body d-flex mb-1">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalFilm">
                                    <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Ajuan
                                </button>
                                <button class="btn btn-success ml-2" data-toggle="modal" data-target="#infoFilm">
                                    <i class="nav-icon fas fa-search"></i>&nbsp; Detail
                                </button>
                                </div>
                        </div>
                    </div>
                </div>
                
            <!-- Modal Kompetisi -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modalKompetisi">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kompetisi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                                <form action="{{ route('kompetisi.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                @if ($errors->any())
                                                
                                                <div class="alert alert-danger alert-dismissible show fade">
                                                    <div class="alert-body">
                                                        <button class="close" data-dismiss="alert">
                                                            <span>&times;</span>
                                                        </button>
                                                        @foreach ($errors->all() as $error )
                                                        {{ $error }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="card-body">
                                                    <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $idMahasiswa }}" required>

                                                    <div class="form-group">
                                                        <label for="nama">Nama Kompetisi</label>
                                                        <input type="text" name="nama" class="form-control" placeholder="Nama Kompetisi" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsi">Deskripsi</label>
                                                        <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="{{ __('Deskripsi') }}"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kel">Kelompok / Pribadi</label>
                                                        <input type="text" name="kel" class="form-control" placeholder="Kelompok / Pribadi" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="instansi">Instansi</label>
                                                        <input type="text" name="instansi" class="form-control" placeholder="Instansi" required>
                                                    </div> 
                                                    <div class="form-group">
                                                        <label for="kategori">Tingkat</label>
                                                        <input type="text" name="kategori" class="form-control" placeholder="Kategori" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tahun">Tahun</label>
                                                        <input type="text" name="tahun" class="form-control" placeholder="Tahun" required>
                                                    </div> 
                                                    <div class="form-group">
                                                    <label for="foto">Bukti Dokumen</label>
                                                    <input type="file" name="foto" class="form-control">
                                                    <small style="color:red">*file gambar berupa jpg, png, jpeg, pdf</small>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" name="status" class="form-control" value="0" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal- br">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Modal Detail Kompetisi -->
            <div class="modal fade" tabindex="-1" role="dialog" id="infoKompetisi">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pengajuan Kompetisi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Kompetisi</th>
                                        <th>Deskrispi</th>
                                        <th>Kelompok</th>
                                        <th>Penyelenggara</th>
                                        <th>Tingkat</th>
                                        <th>Tahun</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listkompetisi as $dKompetisi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dKompetisi->mahasiswa->nama }}</td>
                                                        <td>{{ $dKompetisi->nama }}</td>
                                                        <td>{{ $dKompetisi->deskripsi }}</td>
                                                        <td>{{ $dKompetisi->kel }}</td>
                                                        <td>{{ $dKompetisi->instansi }}</td>
                                                        <td>{{ $dKompetisi->kategori }}</td>
                                                        <td>{{ $dKompetisi->tahun }}</td>
                                                        <td>
                                                        @if (Str::endsWith($dKompetisi->foto, ['.jpg', '.jpeg', '.png']))
                                                            <!-- Jika berbentuk foto -->
                                                            <img src="{{ asset('storage/storage/images/kompetisi/' . $dKompetisi->foto) }}" style="width:120px;" alt="Foto">
                                                        @elseif (Str::endsWith($dKompetisi->foto, ['.pdf']))
                                                            <!-- Jika berbentuk PDF -->
                                                            <a href="{{ asset('storage/storage/images/kompetisi/' . $dKompetisi->foto) }}" target="_blank">Lihat PDF</a>
                                                        @else
                                                            <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
                                                            <p>Format file tidak didukung</p>
                                                        @endif
                                                        </td>
                                                        <td>
                                                        <?php
                                                        if($dKompetisi->status == 0){
                                                            echo '<small class="badge badge-warning">Belum Disetujui</small>';
                                                        }
                                                        else if($dKompetisi->status == 1){
                                                            echo '<small class="badge badge-success">Disetujui</small>';
                                                        }
                                                        else{
                                                            echo '<small class="badge badge-danger">Ditolak</small>';
                                                        }
                                                    ?>
                                                    </tr>
                                @endforeach
                
                                </tbody>
                                </table>
                </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>

            <!-- Modal Penghargaan -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modalPenghargaan">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Penghargaan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                            <form action="{{ route('penghargaan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($errors->any())
                                            
                                            <div class="alert alert-danger alert-dismissible show fade">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert">
                                                        <span>&times;</span>
                                                    </button>
                                                    @foreach ($errors->all() as $error )
                                                    {{ $error }}
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                            <div class="card-body">
                                                <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $idMahasiswa }}" required>

                                                <div class="form-group">
                                                    <label for="nama">Nama Penghargaan</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="Nama Penghargaan" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="instansi">Instansi</label>
                                                    <input type="text" name="instansi" class="form-control" placeholder="Nama Instansi Pelenggara" required>
                                                </div> 
                                                <div class="form-group">
                                                    <label for="lokasi">Tempat / Lokasi</label>
                                                    <input type="text" name="lokasi" class="form-control" placeholder="Tempat / Lokasi" required>
                                                </div> 
                                                <div class="form-group">
                                                    <label for="instansi">Tanggal Mulai</label>
                                                    <input type="date" name="tgl_mulai" class="form-control" required>
                                                </div> 
                                                <div class="form-group">
                                                    <label for="instansi">Tanggal Selesai</label>
                                                    <input type="date" name="tgl_selesai" class="form-control" required>
                                                </div> 
                                                <div class="form-group">
                                                    <label for="kategori">Tingkat</label>
                                                    <input type="text" name="kategori" class="form-control" placeholder="Tingkat" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="foto">Bukti Dokumen</label>
                                                <input type="file" name="foto" class="form-control">
                                                <small style="color:red">*file gambar berupa jpg, png, jpeg, pdf</small>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="status" class="form-control" value="0" required>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal- br">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                    </div>
                            </form>
                            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
             <!-- Modal Detail Penghargaan -->
             <div class="modal fade" tabindex="-1" role="dialog" id="infoPenghargaan">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pengajuan Penghargaan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Penghargaan</th>
                                        <th>Penyelenggara</th>
                                        <th>Lokasi</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Tingkat</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listpenghargaan as $dPenghargaan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dPenghargaan->mahasiswa->nama }}</td>
                                                        <td>{{ $dPenghargaan->nama }}</td>
                                                        <td>{{ $dPenghargaan->instansi }}</td>
                                                        <td>{{ $dPenghargaan->lokasi }}</td>
                                                        <td>{{ $dPenghargaan->tgl_mulai }}</td>
                                                        <td>{{ $dPenghargaan->tgl_selesai }}</td>
                                                        <td>{{ $dPenghargaan->kategori }}</td>
                                                        <td>
                                                        @if (Str::endsWith($dPenghargaan->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/penghargaan/' . $dPenghargaan->foto) }}" style="width:120px;" alt="Foto">
@elseif (Str::endsWith($dPenghargaan->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/penghargaan/' . $dPenghargaan->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
                                                        <td>
                                                        <?php
                                                        if($dPenghargaan->status == 0){
                                                            echo '<small class="badge badge-warning">Belum Disetujui</small>';
                                                        }
                                                        else if($dPenghargaan->status == 1){
                                                            echo '<small class="badge badge-success">Disetujui</small>';
                                                        }
                                                        else{
                                                            echo '<small class="badge badge-danger">Ditolak</small>';
                                                        }
                                                    ?>
                                                    </tr>
                                @endforeach
                
                                </tbody>
                                </table>
                </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>

            
            <!-- Modal Artikel -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modalArtikel">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Artikel</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($errors->any())
                                            
                                            <div class="alert alert-danger alert-dismissible show fade">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert">
                                                        <span>&times;</span>
                                                    </button>
                                                    @foreach ($errors->all() as $error )
                                                    {{ $error }}
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                            <div class="card-body">
                                                <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $idMahasiswa }}" required>

                                            <div class="form-group">
                                                <label for="nama">Nama Artikel</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Artikel" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jabatan">Penerbit</label>
                                                <input type="text" name="penerbit" class="form-control" placeholder="Penerbit" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="tahun">Tahun</label>
                                                <input type="text" name="tahun" class="form-control" placeholder="Tahun" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="foto">Bukti Dokumen</label>
                                                <input type="file" name="foto" class="form-control">
                                                <small style="color:red">*file gambar berupa jpg, png, jpeg, pdf</small>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="status" class="form-control" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal- br">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                </div>
                                </div>
                                </form>
                            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
             <!-- Modal Detail Artikel -->
            <div class="modal fade" tabindex="-1" role="dialog" id="infoArtikel">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pengajuan Artikel</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Artikel</th>
                                        <th>Penerbit</th>
                                        <th>Tahun</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listartikel as $dArtikel)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dArtikel->mahasiswa->nama }}</td>
                                                        <td>{{ $dArtikel->nama }}</td>
                                                        <td>{{ $dArtikel->penerbit }}</td>
                                                        <td>{{ $dArtikel->tahun }}</td>
                                                        <td>
                                                        @if (Str::endsWith($dArtikel->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/artikel/' . $dArtikel->foto) }}" style="width:120px;" alt="Foto">
@elseif (Str::endsWith($dArtikel->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/artikel/' . $dArtikel->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
                                                        <td>
                                                        <?php
                                                        if($dArtikel->status == 0){
                                                            echo '<small class="badge badge-warning">Belum Disetujui</small>';
                                                        }
                                                        else if($dArtikel->status == 1){
                                                            echo '<small class="badge badge-success">Disetujui</small>';
                                                        }
                                                        else{
                                                            echo '<small class="badge badge-danger">Ditolak</small>';
                                                        }
                                                    ?>
                                                    </tr>
                                @endforeach
                
                                </tbody>
                                </table>
                </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>


            <!-- Modal Buku -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modalBuku">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Buku</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                            <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($errors->any())
                                            
                                            <div class="alert alert-danger alert-dismissible show fade">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert">
                                                        <span>&times;</span>
                                                    </button>
                                                    @foreach ($errors->all() as $error )
                                                    {{ $error }}
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                            <div class="card-body">
                                                <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $idMahasiswa }}" required>

                                            <div class="form-group">
                                                <label for="nama">Nama Buku</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Buku" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pengarang">Pengarang</label>
                                                <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pengarang">Penerbit</label>
                                                <input type="text" name="penerbit" class="form-control" placeholder="Penrbit" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="kategori">Kategori</label>
                                                <input type="text" name="kategori" class="form-control" placeholder="Kategori" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlah_hal">Jumlah Halaman</label>
                                                <input type="number" name="jumlah_hal" class="form-control" placeholder="Jumlah Halaman" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="isbn">ISBN</label>
                                                <input type="text" name="isbn" class="form-control" placeholder="ISBN" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="sinopsis">Sinopsis</label>
                                                    <textarea id="sinopsis" name="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror" placeholder="{{ __('Deskripsi') }}"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun</label>
                                                <input type="text" name="tahun" class="form-control" placeholder="Tahun" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="foto">Bukti Dokumen</label>
                                                <input type="file" name="foto" class="form-control">
                                                <small style="color:red">*file gambar berupa jpg, png, jpeg, pdf</small>
                                                </div>
                                            <div class="form-group">
                                                <input type="hidden" name="status" class="form-control" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal- br">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </div>
                                </form>            
                            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
            
             <!-- Modal Detail Buku -->
             <div class="modal fade" tabindex="-1" role="dialog" id="infoBuku">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pengajuan Buku</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Buku</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Kategori</th>
                                        <th>Jumlah Hal</th>
                                        <th>ISBN</th>
                                        <th>Sinopsis</th>
                                        <th>Tahun</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listbuku as $dBuku)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dBuku->mahasiswa->nama }}</td>
                                                        <td>{{ $dBuku->nama }}</td>
                                                        <td>{{ $dBuku->pengarang }}</td>
                                                        <td>{{ $dBuku->penerbit }}</td>
                                                        <td>{{ $dBuku->kategori }}</td>
                                                        <td>{{ $dBuku->jumlah_hal }}</td>
                                                        <td>{{ $dBuku->isbn }}</td>
                                                        <td>{{ $dBuku->sinopsis }}</td>
                                                        <td>{{ $dBuku->tahun }}</td>
                                                        <td>
                                                        @if (Str::endsWith($dBuku->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/buku/' . $dBuku->foto) }}" style="width:120px;" alt="Foto">
@elseif (Str::endsWith($dBuku->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/buku/' . $dBuku->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
                                                        <td>
                                                        <?php
                                                        if($dBuku->status == 0){
                                                            echo '<small class="badge badge-warning">Belum Disetujui</small>';
                                                        }
                                                        else if($dBuku->status == 1){
                                                            echo '<small class="badge badge-success">Disetujui</small>';
                                                        }
                                                        else{
                                                            echo '<small class="badge badge-danger">Ditolak</small>';
                                                        }
                                                    ?>
                                                    </tr>
                                @endforeach
                
                                </tbody>
                                </table>
                </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>

             <!-- Modal Aplikom -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modalAplikom">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Aplikom</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                            <form action="{{ route('aplikom.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($errors->any())
                                            
                                            <div class="alert alert-danger alert-dismissible show fade">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert">
                                                        <span>&times;</span>
                                                    </button>
                                                    @foreach ($errors->all() as $error )
                                                    {{ $error }}
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                            <div class="card-body">
                                                <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $idMahasiswa }}" required>

                                            <div class="form-group">
                                                <label for="nama">Nama Aplikom</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Aplikom" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="versi">Versi</label>
                                                <input type="text" name="versi" class="form-control" placeholder="Versi" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="kel">Kelompok / Pribadi</label>
                                                <input type="text" name="kel" class="form-control" placeholder="Kelompok / Pribadi" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                    <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="{{ __('Deskripsi') }}"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun</label>
                                                <input type="text" name="tahun" class="form-control" placeholder="Tahun" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="foto">Bukti Dokumen</label>
                                                <input type="file" name="foto" class="form-control">
                                                <small style="color:red">*file gambar berupa jpg, png, jpeg, pdf</small>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="status" class="form-control" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal- br">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </div>
                                </form>            
                            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Modal Detail Aplikom -->
            <div class="modal fade" tabindex="-1" role="dialog" id="infoAplikom">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pengajuan Aplikom</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Aplikom</th>
                                        <th>Versi</th>
                                        <th>Kelompok / Pribadi</th>
                                        <th>Deskripsi</th>
                                        <th>Tahun</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listaplikom as $dAplikom)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dAplikom->mahasiswa->nama }}</td>
                                                        <td>{{ $dAplikom->nama }}</td>
                                                        <td>{{ $dAplikom->versi }}</td>
                                                        <td>{{ $dAplikom->kel }}</td>
                                                        <td>{{ $dAplikom->deskripsi }}</td>
                                                        <td>{{ $dAplikom->tahun }}</td>
                                                        <td>
                                                        @if (Str::endsWith($dAplikom->foto, ['.jpg', '.jpeg', '.png']))
                                                            <!-- Jika berbentuk foto -->
                                                            <img src="{{ asset('storage/storage/images/aplikom/' . $dAplikom->foto) }}" style="width:120px;" alt="Foto">
                                                        @elseif (Str::endsWith($dAplikom->foto, ['.pdf']))
                                                            <!-- Jika berbentuk PDF -->
                                                            <a href="{{ asset('storage/storage/images/aplikom/' . $dAplikom->foto) }}" target="_blank">Lihat PDF</a>
                                                        @else
                                                            <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
                                                            <p>Format file tidak didukung</p>
                                                        @endif
                                                        <td>
                                                        <?php
                                                        if($dAplikom->status == 0){
                                                            echo '<small class="badge badge-warning">Belum Disetujui</small>';
                                                        }
                                                        else if($dAplikom->status == 1){
                                                            echo '<small class="badge badge-success">Disetujui</small>';
                                                        }
                                                        else{
                                                            echo '<small class="badge badge-danger">Ditolak</small>';
                                                        }
                                                    ?>
                                                    </tr>
                                @endforeach
                
                                </tbody>
                                </table>
                </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>

            
             <!-- Modal Produk -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modalProduk">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Desain Produk</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($errors->any())
                                            
                                            <div class="alert alert-danger alert-dismissible show fade">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert">
                                                        <span>&times;</span>
                                                    </button>
                                                    @foreach ($errors->all() as $error )
                                                    {{ $error }}
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                            <div class="card-body">
                                                <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $idMahasiswa }}" required>

                                            <div class="form-group">
                                                <label for="nama">Nama Desain Produk</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Desain Produk" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi</label>
                                                <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="{{ __('Deskripsi') }}"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun</label>
                                                <input type="text" name="tahun" class="form-control" placeholder="Tahun" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="foto">Bukti Dokumen</label>
                                                <input type="file" name="foto" class="form-control">
                                                <small style="color:red">*file gambar berupa jpg, png, jpeg, pdf</small>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="status" class="form-control" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal- br">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </div>
                                </form>            
                            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Modal Detail Produk -->
            <div class="modal fade" tabindex="-1" role="dialog" id="infoProduk">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pengajuan Desain Produk</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Desain / Produk</th>
                                        <th>Deskripsi</th>
                                        <th>Tahun</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listproduk as $dProduk)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dProduk->mahasiswa->nama }}</td>
                                                        <td>{{ $dProduk->nama }}</td>
                                                        <td>{{ $dProduk->deskripsi }}</td>
                                                        <td>{{ $dProduk->tahun }}</td>
                                                        <td>
                                                        @if (Str::endsWith($dProduk->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/produk/' . $dProduk->foto) }}" style="width:120px;" alt="Foto">
@elseif (Str::endsWith($dProduk->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/produk/' . $dProduk->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
                                                        <td>
                                                        <?php
                                                        if($dProduk->status == 0){
                                                            echo '<small class="badge badge-warning">Belum Disetujui</small>';
                                                        }
                                                        else if($dProduk->status == 1){
                                                            echo '<small class="badge badge-success">Disetujui</small>';
                                                        }
                                                        else{
                                                            echo '<small class="badge badge-danger">Ditolak</small>';
                                                        }
                                                    ?>
                                                    </tr>
                                @endforeach
                
                                </tbody>
                                </table>
                </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
            

            
             <!-- Modal Film -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modalFilm">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Film</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                            <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($errors->any())
                                            
                                            <div class="alert alert-danger alert-dismissible show fade">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert">
                                                        <span>&times;</span>
                                                    </button>
                                                    @foreach ($errors->all() as $error )
                                                    {{ $error }}
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                            <div class="card-body">
                                                <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $idMahasiswa }}" required>

                                            <div class="form-group">
                                                <label for="nama">Nama Film</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Film" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Sutradara</label>
                                                <input type="text" name="sutradara" class="form-control" placeholder="Sutradara" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Pemain</label>
                                                <input type="text" name="pemain" class="form-control" placeholder="Pemain" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Genre</label>
                                                <input type="text" name="genre" class="form-control" placeholder="Genre" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Durasi</label>
                                                <input type="text" name="durasi" class="form-control" placeholder="Durasi" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Sinopsis</label>
                                                <textarea id="sinopsis" name="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror" placeholder="{{ __('Sinopsis') }}"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun</label>
                                                <input type="text" name="tahun" class="form-control" placeholder="Tahun" required>
                                            </div> 
                                            <div class="form-group">
                                                <label for="foto">Bukti Dokumen</label>
                                                <input type="file" name="foto" class="form-control">
                                                <small style="color:red">*file gambar berupa jpg, png, jpeg, pdf</small>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="status" class="form-control" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal- br">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </div>
                                </form>            
                            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
             <!-- Modal Detail Film -->
             <div class="modal fade" tabindex="-1" role="dialog" id="infoFilm">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pengajuan Film</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Film</th>
                                        <th>Sutradara</th>
                                        <th>Pemain</th>
                                        <th>Genre</th>
                                        <th>Durasi</th>
                                        <th>Sinopsis</th>
                                        <th>Tahun</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listfilm as $dFilm)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dFilm->mahasiswa->nama }}</td>
                                                        <td>{{ $dFilm->nama }}</td>
                                                        <td>{{ $dFilm->sutradara }}</td>
                                                        <td>{{ $dFilm->pemain }}</td>
                                                        <td>{{ $dFilm->genre}}</td>
                                                        <td>{{ $dFilm->durasi}}</td>
                                                        <td>{{ $dFilm->sinopsis}}</td>
                                                        <td>{{ $dFilm->tahun}}</td>
                                                        <td>
                                                        @if (Str::endsWith($dFilm->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/film/' . $dFilm->foto) }}" style="width:120px;" alt="Foto">
@elseif (Str::endsWith($dFilm->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/film/' . $dFilm->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
                                                        <td>
                                                        <?php
                                                        if($dFilm->status == 0){
                                                            echo '<small class="badge badge-warning">Belum Disetujui</small>';
                                                        }
                                                        else if($dFilm->status == 1){
                                                            echo '<small class="badge badge-success">Disetujui</small>';
                                                        }
                                                        else{
                                                            echo '<small class="badge badge-danger">Ditolak</small>';
                                                        }
                                                    ?>
                                                    </tr>
                                @endforeach
                
                                </tbody>
                                </table>
                </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
            
            
            
             <!-- Modal Organisasi -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modalOrganisasi">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Karir Organisasi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                            <form action="{{ route('organisasi.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($errors->any())
                                            
                                            <div class="alert alert-danger alert-dismissible show fade">
                                                <div class="alert-body">
                                                    <button class="close" data-dismiss="alert">
                                                        <span>&times;</span>
                                                    </button>
                                                    @foreach ($errors->all() as $error )
                                                    {{ $error }}
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                            <div class="card-body">
                                                <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $idMahasiswa }}" required>

                                            <div class="form-group">
                                                <label for="nama">Nama Karir Organisasi</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Karir Organisasi" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Jabatan</label>
                                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan Organisasi" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nama">Masa Jabatan</label>
                                                <input type="number" name="masa_jabatan" class="form-control" placeholder="Masa Jabatan Organisasi" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tahun">Tahun</label>
                                                <input type="text" name="tahun" class="form-control" placeholder="Tahun" required>
                                            </div> 
                                            <div class="form-group">
                                                    <label for="kategori">Tingkat</label>
                                                    <input type="text" name="kategori" class="form-control" placeholder="Katgeori" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="foto">Bukti Dokumen</label>
                                                    <input type="file" name="foto" class="form-control">
                                                    <small style="color:red">*file gambar berupa jpg, png, jpeg, pdf</small>
                                                </div>
                                            <div class="form-group">
                                                <input type="hidden" name="status" class="form-control" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal- br">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                                    </div>
                                </div>
                                </form>            
                            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>

             <!-- Modal Detail Organisasi -->
             <div class="modal fade" tabindex="-1" role="dialog" id="infoOrganisasi">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Detail Pengajuan Karir Organisasi</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Karir Organisasi</th>
                                        <th>Jabatan</th>
                                        <th>Masa Jabatan</th>
                                        <th>Tahun</th>
                                        <th>Tingkat</th>
                                        <th>Bukti</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($listorganisasi as $dOrganisasi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $dOrganisasi->mahasiswa->nama }}</td>
                                                        <td>{{ $dOrganisasi->nama }}</td>
                                                        <td>{{ $dOrganisasi->jabatan }}</td>
                                                        <td>{{ $dOrganisasi->masa_jabatan }}</td>
                                                        <td>{{ $dOrganisasi->tahun }}</td>
                                                        <td>{{ $dOrganisasi->kategori }}</td>
                                                        <td>
                                                        @if (Str::endsWith($dOrganisasi->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/organisasi/' . $dOrganisasi->foto) }}" style="width:120px;" alt="Foto">
@elseif (Str::endsWith($dOrganisasi->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/organisasi/' . $dOrganisasi->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
                                                        <td>
                                                        <?php
                                                        if($dOrganisasi->status == 0){
                                                            echo '<small class="badge badge-warning">Belum Disetujui</small>';
                                                        }
                                                        else if($dOrganisasi->status == 1){
                                                            echo '<small class="badge badge-success">Disetujui</small>';
                                                        }
                                                        else{
                                                            echo '<small class="badge badge-danger">Ditolak</small>';
                                                        }
                                                    ?>
                                                    </tr>
                                @endforeach
                
                                </tbody>
                                </table>
                </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection


