@extends('layouts.main')
@section('title', 'Verisikasi CU Kompetisi Detail')

@section('content')
    <div class="section">
        <h5 style="color:#fff">Verifikasi CU Kompetensi : Detail</h5>
        <a href="{{ route('kompetisi.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                            <form method="POST" action="{{ route('kompetisi.update', $kompetisi->id) }}" enctype="multipart/form-data">
                            @csrf
                                @method('PUT')    
                                <div class="form-group">
                                @if (Str::endsWith($kompetisi->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/kompetisi/' . $kompetisi->foto) }}" style="width:380px;" alt="Foto">
@elseif (Str::endsWith($kompetisi->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/kompetisi/' . $kompetisi->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif   
<label for="foto">Foto Kompetisi</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="foto" type="hidden" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" value="{{ $kompetisi->foto }}" readonly>
                                        </div>
                                    </div>
                                </div> 
                            <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $kompetisi->mahasiswa_id }}">
                                    <input type="text" class="form-control" value="{{ $kompetisi->mahasiswa->nama }}" readonly>
                                </div> 
                                <div class="form-group">
                                    <label>Nama Kompetisi</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $kompetisi->nama }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Deskrispi</label>
                                    <textarea name="deskripsi" class="form-control" value="{{ $kompetisi->deskripsi }}" readonly><?php echo $kompetisi->deskripsi?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Kelopok / Individu</label>
                                    <input type="text" name="kel" class="form-control" value="{{ $kompetisi->kel }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Penyelenggara</label>
                                    <input type="text" name="instansi" class="form-control" value="{{ $kompetisi->instansi }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tingkat Kompetisi</label>
                                    <input type="text" name="kategori" class="form-control" value="{{ $kompetisi->kategori }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" name="tahun" class="form-control" value="{{ $kompetisi->tahun }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                        $data = $kompetisi->status;
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
                                <div class="profile-widget-item-label">Nama Kompetisi</div>
                                <div class="profile-widget-item-value">{{ $kompetisi->nama }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Deskripsi</div>
                                <div class="profile-widget-item-value">{{ $kompetisi->deskripsi }}</div>
                            </div>
                            </div>
                        </div> -->
                        <!-- <div class="profile-widget-description pb-0">
                            <div class="profile-widget-name">{{ $kompetisi->nama }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> siswa {{ $kompetisi->mahasiswa->nama }}
                                </div>
                            </div>
                            <label for="alamat">Penyelenggara</label>
                            <p>{{ $kompetisi->instansi }}</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
