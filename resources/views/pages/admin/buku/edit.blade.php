@extends('layouts.main')
@section('title', 'Edit Buku')

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
                            <h4>Edit buku {{ $buku->nama }}</h4>
                            <a href="{{ route('buku.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                <div class="form-group">
                                    <label for="foto">Foto Buku</label>
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
                                            @if ($buku->mahasiswa_id == $data->id)
                                                selected
                                            @endif
                                        >{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label for="nama">Nama Buku</label>
                                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama buku') }}" value="{{ $buku->nama }}">
                                </div>
                               <div class="form-group">
                                    <label for="pengarang">Pengarang</label>
                                    <input type="text" id="pengarang" name="pengarang" class="form-control @error('pengarang') is-invalid @enderror" placeholder="{{ __('Pengarang') }}" value="{{ $buku->pengarang }}">
                                </div>
                               <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" id="penerbit" name="penerbit" class="form-control @error('penerbit') is-invalid @enderror" placeholder="{{ __('Penerbit') }}" value="{{ $buku->penerbit }}">
                                </div>
                               <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" id="kategori" name="kategori" class="form-control @error('kategori') is-invalid @enderror" placeholder="{{ __('Kategori') }}" value="{{ $buku->kategori }}">
                                </div>
                               <div class="form-group">
                                    <label for="jumlah_hal">Jumlah Halaman</label>
                                    <input type="text" id="jumlah_hal" name="jumlah_hal" class="form-control @error('jumlah_hal') is-invalid @enderror" placeholder="{{ __('Jumlah Halaman') }}" value="{{ $buku->jumlah_hal }}">
                                </div>
                               <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" id="isbn" name="isbn" class="form-control @error('isbn') is-invalid @enderror" placeholder="{{ __('ISBN') }}" value="{{ $buku->isbn }}">
                                </div>
                               <div class="form-group">
                                    <label for="sinopsis">Sinopsis</label>
                                    <textarea id="sinopsis" name="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror" placeholder="{{ __('sinopsis') }}">{{ $buku->sinopsis }}</textarea>
                                 </div>
                               <input type="hidden" name="status" class="form-control" value="{{ $buku->status }}">
                               
                               <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="text" id="tahun" name="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="{{ __('Tahun buku') }}" value="{{ $buku->tahun }}">
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
