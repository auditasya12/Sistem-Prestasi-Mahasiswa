@extends('layouts.main')
@section('title', 'Verisikasi CU Buku Detail')

@section('content')
    <div class="section">
        <h5 style="color:#fff">Verifikasi CU Buku : Detail</h5>
        <a href="{{ route('buku.index') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                            <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
                            @csrf
                                @method('PUT')    
                            <div class="form-group">
                            @if (Str::endsWith($buku->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/buku/' . $buku->foto) }}" style="width:380px;" alt="Foto">
@elseif (Str::endsWith($buku->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/buku/' . $buku->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
<label for="foto">Foto Buku</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="foto" type="hidden" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto" value="{{ $buku->foto }}" readonly>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="hidden" name="mahasiswa_id" class="form-control" value="{{ $buku->mahasiswa_id }}">
                                    <input type="text" class="form-control" value="{{ $buku->mahasiswa->nama }}" readonly>
                                </div> 
                                <div class="form-group">
                                    <label>Nama Buku</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $buku->nama }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input type="text" name="pengarang" class="form-control" value="{{ $buku->pengarang }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" value="{{ $buku->penerbit }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <input type="text" name="kategori" class="form-control" value="{{ $buku->kategori }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Halaman</label>
                                    <input type="text" name="jumlah_hal" class="form-control" value="{{ $buku->jumlah_hal }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text" name="isbn" class="form-control" value="{{ $buku->isbn }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Sinopsjs</label>
                                    <textarea name="sinopsis" class="form-control" readonly><?php echo $buku->sinopsis?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="text" name="tahun" class="form-control" value="{{ $buku->tahun }}" readonly>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Foto</label>
                                    <input type="text" name="foto" class="form-control" value="{{ $buku->kel }}" readonly>
                                </div> -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                        $data = $buku->status;
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
                                <div class="profile-widget-item-label">Nama buku</div>
                                <div class="profile-widget-item-value">{{ $buku->nama }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Deskripsi</div>
                                <div class="profile-widget-item-value">{{ $buku->deskripsi }}</div>
                            </div>
                            </div>
                        </div> -->
                        <!-- <div class="profile-widget-description pb-0">
                            <div class="profile-widget-name">{{ $buku->nama }}
                                <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> siswa {{ $buku->mahasiswa->nama }}
                                </div>
                            </div>
                            <label for="alamat">Penyelenggara</label>
                            <p>{{ $buku->instansi }}</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
