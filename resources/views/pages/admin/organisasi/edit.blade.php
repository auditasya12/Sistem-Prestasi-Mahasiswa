@extends('layouts.main')
@section('title', 'Edit Organisasi')

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
                            <h4>Edit organisasi {{ $organisasi->nama }}</h4>
                            <a href="{{ route('organisasi.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('organisasi.update', $organisasi->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') 
                                @if (Str::endsWith($organisasi->foto, ['.jpg', '.jpeg', '.png']))
    <!-- Jika berbentuk foto -->
    <img src="{{ asset('storage/storage/images/organisasi/' . $organisasi->foto) }}" style="width:380px;" alt="Foto">
@elseif (Str::endsWith($organisasi->foto, ['.pdf']))
    <!-- Jika berbentuk PDF -->
    <a href="{{ asset('storage/storage/images/organisasi/' . $organisasi->foto) }}" target="_blank">Lihat PDF</a>
@else
    <!-- Jika bukan foto atau PDF, mungkin tampilkan pesan atau sesuatu yang sesuai -->
    <p>Format file tidak didukung</p>
@endif
                                <div class="form-group">
                                    <label for="foto">Foto Karir Organisasi</label>
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
                                            @if ($organisasi->mahasiswa_id == $data->id)
                                                selected
                                            @endif
                                        >{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label for="nama">Nama organisasi</label>
                                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama organisasi') }}" value="{{ $organisasi->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan" class="form-control @error('jabatan') is-invalid @enderror" placeholder="{{ __('Jabatan Organisasi') }}" value="{{ $organisasi->jabatan }}">
                                </div>
                                <div class="form-group">
                                    <label for="masa_jabatan">Masa Jabatan</label>
                                    <input type="number" id="masa_jabatan" name="masa_jabatan" class="form-control @error('masa_jabatan') is-invalid @enderror" placeholder="{{ __('Jabatan') }}" value="{{ $organisasi->masa_jabatan }}">
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="text" id="tahun" name="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="{{ __('Tahun') }}" value="{{ $organisasi->tahun }}">
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror" placeholder="{{ __('Kategori') }}" value="{{ $organisasi->kategori }}">
                                </div>
                                <input type="hidden" name="status" class="form-control" value="{{ $organisasi->status }}">

                                <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
