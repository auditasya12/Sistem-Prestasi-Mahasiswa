@extends('layouts.main')
@section('title', 'Verifikasi CU Penghargaan Detail')

@section('content')
    <div class="section">
        <h5 style="color:#fff">Verifikasi CU Penghargaan : Detail</h5>
        <a href="{{ route('penghargaan.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
        <div class="section-body"> 
            <div class="row d-flex justify-content-center">
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
                <div class="col-12 col-sm-12 col-lg-8">
                    
                    <div class="card profile-widget">
                    <div class="card-body">
                            <form method="POST" action="{{ route('penghargaan.update', $penghargaan->id) }}" enctype="multipart/form-data">
                            @csrf
                                @method('PUT')    
                                <div class="form-group">
                                @if (Str::endsWith($penghargaan->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/penghargaan/' . $penghargaan->foto) }}" style="width:380px;" alt="Foto">
@elseif (Str::endsWith($penghargaan->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/penghargaan/' . $penghargaan->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif <label for="foto">Foto Penghargaan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="foto" type="hidden" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" value="{{ $penghargaan->foto }}" readonly>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $penghargaan->mahasiswa_id }}">
                                    <input type="text" class="form-control" value="{{ $penghargaan->mahasiswa->nama }}" readonly>
                                </div> 
                                <div class="form-group">
                                    <label>Nama Penghargaan</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $penghargaan->nama }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Instansi Penyelenggara</label>
                                    <input type="text" name="instansi" class="form-control" value="{{ $penghargaan->instansi }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Lokasi</label>
                                    <input type="text" name="lokasi" class="form-control" value="{{ $penghargaan->lokasi }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" name="tgl_mulai" class="form-control" value="{{ $penghargaan->tgl_mulai }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" name="tgl_selesai" class="form-control" value="{{ $penghargaan->tgl_selesai }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tingkat Penghargaan</label>
                                    <input type="text" name="kategori" class="form-control" value="{{ $penghargaan->kategori }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                        $data = $penghargaan->status;
                                        if($data == 0){
                                            echo '<small class="badge badge-warning">Belum Disetujui</small>';
                                        }
                                        else if($data == 1){
                                            echo '<small class="badge badge-success">Disetujui</small>';
                                        }
                                        else{
                                            echo '<small class="badge badge-danger">Ditolak</small>';
                                        }
                                    ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Aksi Verifikasi</label>
                                        <div class="d-flex">
                                            <input type="radio" name="status" value="1"><small class="badge badge-success mr-3">Terima</small>
                                            <input type="radio" name="status" value="2"><small class="badge badge-danger">Tolak</small>
                                        </div>
                                        
                                    </div>
                                
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                        <!-- <div class="profile-widget-header">
                            <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Nama penghargaan</div>
                                <div class="profile-widget-item-value">{{ $penghargaan->nama }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Deskripsi</div>
                                <div class="profile-widget-item-value">{{ $penghargaan->deskripsi }}</div>
                            </div>
                            </div>
                        </div> -->
                        <!-- <div class="profile-widget-description pb-0">
                            <div class="profile-widget-name">{{ $penghargaan->nama }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> siswa {{ $penghargaan->mahasiswa->nama }}
                                </div>
                            </div>
                            <label for="alamat">Penyelenggara</label>
                            <p>{{ $penghargaan->instansi }}</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
