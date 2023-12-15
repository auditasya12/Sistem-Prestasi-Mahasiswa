@extends('layouts.main')
@section('title', 'Edit Penghargaan')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
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
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Edit Penghargaan {{ $penghargaan->nama }}</h4>
                            <a href="{{ route('penghargaan.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('penghargaan.update', $penghargaan->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') 
                                @if (Str::endsWith($penghargaan->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/penghargaan/' . $penghargaan->foto) }}" style="width:380px;" alt="Foto">
@elseif (Str::endsWith($penghargaan->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/penghargaan/' . $penghargaan->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
                                <div class="form-group">
                                    <label for="foto">Foto Penghargaan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="foto" type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto">
                                            <label class="custom-file-label" for="foto">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="mahasiswa_id">Nama Mahasiswa</label>
                                    <select id="mahasiswa_id" name="mahasiswa_id" class="select2bs4 form-control @error('mahasiswa_id') is-invalid @enderror">
                                        <option value="">-- Pilih Mahasiswa --</option>
                                        @foreach ($mahasiswa as $data )
                                            <option value="{{ $data->id }}"
                                            @if ($penghargaan->mahasiswa_id == $data->id)
                                                selected
                                            @endif
                                        >{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label for="nama">Nama Penghargaan</label>
                                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama Penghargaan') }}" value="{{ $penghargaan->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="instansi">Penyelenggara</label>
                                    <input type="text" id="instansi" name="instansi" class="form-control @error('instansi') is-invalid @enderror" placeholder="{{ __('Nama Penyelenggara') }}" value="{{ $penghargaan->instansi }}">
                                </div>
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" id="lokasi" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" placeholder="{{ __('Lokasi') }}" value="{{ $penghargaan->lokasi }}">
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror" placeholder="{{ __('Kategori') }}" value="{{ $penghargaan->kategori }}">
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Tingkat Penghargaan</label>
                                    <input type="text" id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror" placeholder="{{ __('Kategori') }}" value="{{ $penghargaan->kategori }}">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_mulai">Tanggal Mulai</label>
                                    <input type="date" id="tgl_mulai" name="tgl_mulai" class="form-control @error('tgl_mulai') is-invalid @enderror" placeholder="{{ __('Tanggal Mulai') }}" value="{{ $penghargaan->tgl_mulai }}">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_selesai">Tanggal Selesai</label>
                                    <input type="date" id="tgl_selesai" name="tgl_selesai" class="form-control @error('tgl_selesai') is-invalid @enderror" placeholder="{{ __('Tanggal Selesai') }}" value="{{ $penghargaan->tgl_selesai }}">
                                </div>
                                <input type="hidden" name="status" class="form-control" value="{{ $penghargaan->status }}">

                                <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
