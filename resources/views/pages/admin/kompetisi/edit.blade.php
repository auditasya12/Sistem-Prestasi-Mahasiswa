@extends('layouts.main')
@section('title', 'Edit Kompetisi')

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
                            <h4>Edit Kompetisi {{ $kompetisi->nama }}</h4>
                            <a href="{{ route('kompetisi.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('kompetisi.update', $kompetisi->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') 
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
                                <div class="form-group">
                                    <label for="foto">Foto Kompetisi</label>
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
                                            @if ($kompetisi->mahasiswa_id == $data->id)
                                                selected
                                            @endif
                                        >{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label for="nama">Nama Kompetisi</label>
                                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama Kompetisi') }}" value="{{ $kompetisi->nama }}">
                                </div>
                               <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="{{ __('Deskripsi') }}">{{ $kompetisi->deskripsi }}</textarea>
                                 </div>
                                
                               <div class="form-group">
                                    <label for="kel">Jenis</label>
                                    <input type="text" id="kel" name="kel" class="form-control @error('kel') is-invalid @enderror" placeholder="{{ __('Jenis Kompetisi') }}" value="{{ $kompetisi->kel }}">
                                </div>
                                <div class="form-group">
                                    <label for="instansi">Penyelenggara</label>
                                    <input type="text" id="instansi" name="instansi" class="form-control @error('instansi') is-invalid @enderror" placeholder="{{ __('Nama Penyelenggara') }}" value="{{ $kompetisi->instansi }}">
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="text" id="tahun" name="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="{{ __('Tahun') }}" value="{{ $kompetisi->tahun }}">
                                </div>
                                <input type="hidden" name="status" class="form-control" value="{{ $kompetisi->status }}">
                               
                                <div class="form-group">
                                    <label for="kategori">kategori Kompetisi</label>
                                    <input type="text" id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror" placeholder="{{ __('kategori Kompetisi') }}" value="{{ $kompetisi->kategori }}">
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan Perubahan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
