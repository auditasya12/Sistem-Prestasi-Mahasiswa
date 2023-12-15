@extends('layouts.main')
@section('title', 'Verifikasi CU Aplikom Detail')

@section('content')
    <div class="section">
        <h5 style="color:#fff">Verifikasi CU Aplikom : Detail</h5>
        <a href="{{ route('aplikom.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                            <form method="POST" action="{{ route('aplikom.update', $aplikom->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')   
                            <div class="form-group">
                            @if (Str::endsWith($aplikom->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/aplikom/' . $aplikom->foto) }}" style="width:380px;" alt="Foto">
@elseif (Str::endsWith($aplikom->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/aplikom/' . $aplikom->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
                                    <label for="foto">Foto Aplikom</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="foto" type="hidden" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" value="{{ $aplikom->foto }}" readonly>
                                        </div>
                                    </div>
                                </div> 
                            <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $aplikom->mahasiswa_id }}">
                                    <input type="text" class="form-control" value="{{ $aplikom->mahasiswa->nama }}" readonly>
                                </div> 
                                <div class="form-group">
                                    <label>Nama Inovasi</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $aplikom->nama }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Versi</label>
                                    <input type="text" name="versi" class="form-control" value="{{ $aplikom->versi }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kelompok / Individu</label>
                                    <input type="text" name="kel" class="form-control" value="{{ $aplikom->kel }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" readonly><?php echo $aplikom->deskripsi?></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Foto</label>
                                    <input type="text" name="foto" class="form-control" value="{{ $aplikom->kel }}" readonly>
                                </div> -->
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" name="tahun" class="form-control" value="{{ $aplikom->tahun }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                        $data = $aplikom->status;
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
                                <div class="profile-widget-item-label">Nama aplikom</div>
                                <div class="profile-widget-item-value">{{ $aplikom->nama }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Deskripsi</div>
                                <div class="profile-widget-item-value">{{ $aplikom->deskripsi }}</div>
                            </div>
                            </div>
                        </div> -->
                        <!-- <div class="profile-widget-description pb-0">
                            <div class="profile-widget-name">{{ $aplikom->nama }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> siswa {{ $aplikom->mahasiswa->nama }}
                                </div>
                            </div>
                            <label for="alamat">Penyelenggara</label>
                            <p>{{ $aplikom->instansi }}</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
