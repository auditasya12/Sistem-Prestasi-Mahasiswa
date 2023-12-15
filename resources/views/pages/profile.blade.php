@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <div class="section">
        <div class="section-body">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-sm-6 col-lg-6">
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
                    <div class="card profile-widget">
                        @if (Auth::user()->roles == 'mahasiswa')
                        <div class="col-12 col-sm-12 col-lg-12">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">PROFIL MAHASISWA</div>
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
                        <div class="profile-widget-header">
                        <div class="profile-widget-items mt-3">
                           
                            @if ($mahasiswa->foto != null)
                            <center><img alt="image" src="{{ asset('storage/images/mahasiswa/' . $mahasiswa->foto) }}" class="profile-widget-picture"  style="width:150px;height:100px;"></center>
                            @else
                            <center><img alt="image" src="https://via.placeholder.com/300" class="rounded-circle profile-widget-picture"></center>
                                
                            @endif

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
               @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
