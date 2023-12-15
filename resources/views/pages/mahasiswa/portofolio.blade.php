@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-8">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Detail Profil Mahasiswa</div>
                                <div class="profile-widget-item-label">
                                <?php
                                        if($mahasiswa->status == 0){
                                            echo '<small class="badge badge-success">Tidak Aktif</small>';
                                        }
                                        else if($mahasiswa->status == 1){
                                            echo '<small class="badge badge-success">Aktif</small>';
                                        }
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-items">
                            <!-- nim -->
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">NIM</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-value">{{ $mahasiswa->nim }}</div>
                            </div>
                        </div>
                        <!-- nama -->
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Nama</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-value">{{ $mahasiswa->nama }}</div>
                            </div>
                        </div>
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Program Studi</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-value">{{ $mahasiswa->prodi }}</div>
                            </div>
                        </div>
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Alamat</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-value">{{ $mahasiswa->alamat }}</div>
                            </div>
                        </div>
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Tahun Masuk</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-value">{{ $mahasiswa->angkatan->tahun }}</div>
                            </div>
                        </div>
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Telepon</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-value">{{ $mahasiswa->telp }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-lg-4">
                <div class="card profile-widget" style="background-color:transparent">
                    <div class="profile-widget-header">
                    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                        <div class="profile-widget-items">
                        <center>   
                            @if ($mahasiswa->foto != null)
                                <img alt="image" src="{{ asset('storage/images/mahasiswa/' . $mahasiswa->foto) }}" class="profile-widget-picture"  style="width:320px;height:auto;">
                            @else
                                <img alt="image" src="https://via.placeholder.com/300" class="rounded-circle profile-widget-picture">
                                <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                               <input type="file" name="foto" class="form-control">
                                            </div>
                                        </div>
                                    <center><button class="btn btn-primary mr-5">Upload Foto</button></center>
                                </div>
                            @endif
                        </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
</section>
@endsection
