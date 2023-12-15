@extends('layouts.main')
@section('title', 'Verifikasi CU film Detail')

@section('content')
    <div class="section">
        <h5 style="color:#fff">Verifikasi CU Film : Detail</h5>
        <a href="{{ route('film.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                            <form method="POST" action="{{ route('film.update', $film->id) }}" enctype="multipart/form-data">
                            @csrf
                                @method('PUT')    
                                <div class="form-group">
                                @if (Str::endsWith($film->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/film/' . $film->foto) }}" style="width:380px;" alt="Foto">
@elseif (Str::endsWith($film->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/film/' . $film->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif    <label for="foto">Foto Film</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="foto" type="hidden" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" value="{{ $film->foto }}" readonly>
                                        </div>
                                    </div>
                                </div> 
                            <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $film->mahasiswa_id }}">
                                    <input type="text" class="form-control" value="{{ $film->mahasiswa->nama }}" readonly>
                                </div> 
                                <div class="form-group">
                                    <label>Judul Film</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $film->nama }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Sutradara</label>
                                    <input type="text" name="sutradara" class="form-control" value="{{ $film->sutradara }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pemain</label>
                                    <input type="text" name="pemain" class="form-control" value="{{ $film->pemain }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Halaman</label>
                                    <input type="text" name="genre" class="form-control" value="{{ $film->genre }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Durasi</label>
                                    <input type="text" name="durasi" class="form-control" value="{{ $film->durasi }}" readonly>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Sinopsis</label>
                                    <textarea name="sinopsis" class="form-control" readonly><?php echo $film->sinopsis?></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Foto</label>
                                    <input type="text" name="foto" class="form-control" value="{{ $film->pemain }}" readonly>
                                </div> -->
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" name="tahun" class="form-control" value="{{ $film->tahun }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                        $data = $film->status;
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
                                <div class="profile-widget-item-label">Nama film</div>
                                <div class="profile-widget-item-value">{{ $film->nama }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">sinopsis</div>
                                <div class="profile-widget-item-value">{{ $film->sinopsis }}</div>
                            </div>
                            </div>
                        </div> -->
                        <!-- <div class="profile-widget-description pb-0">
                            <div class="profile-widget-name">{{ $film->nama }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> siswa {{ $film->mahasiswa->nama }}
                                </div>
                            </div>
                            <label for="alamat">Penyelenggara</label>
                            <p>{{ $film->instansi }}</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
