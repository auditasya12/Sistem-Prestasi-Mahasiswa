@extends('layouts.main')
@section('title', 'Verifikasi CU Artikel Detail')

@section('content')
    <div class="section">
        <h5 style="color:#fff">Verifikasi CU Artikel : Detail</h5>
        <a href="{{ route('artikel.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                            <form method="POST" action="{{ route('artikel.update', $artikel->id) }}" enctype="multipart/form-data">
                            @csrf
                                @method('PUT') 
                                <div class="form-group">
                                @if (Str::endsWith($artikel->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/artikel/' . $artikel->foto) }}" style="width:380px;" alt="Foto">
@elseif (Str::endsWith($artikel->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/artikel/' . $artikel->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
                                    <label for="foto">Foto Artikel</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="foto" type="hidden" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" value="{{ $artikel->foto }}" readonly>
                                        </div>
                                    </div>
                                </div>    
                            <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $artikel->mahasiswa_id }}">
                                    <input type="text" class="form-control" value="{{ $artikel->mahasiswa->nama }}" readonly>
                                </div> 
                                <div class="form-group">
                                    <label>Nama Artikel</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $artikel->nama }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" value="{{ $artikel->penerbit }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" name="tahun" class="form-control" value="{{ $artikel->tahun }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                        $data = $artikel->status;
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
