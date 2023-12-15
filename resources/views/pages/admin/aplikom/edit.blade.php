@extends('layouts.main')
@section('title', 'Edit Aplikom')

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
                            <h4>Edit Aplikom {{ $aplikom->nama }}</h4>
                            <a href="{{ route('aplikom.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('aplikom.update', $aplikom->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
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
                                <div class="form-group">
                                    <label for="foto">Foto Aplikom</label>
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
                                            @if ($aplikom->mahasiswa_id == $data->id)
                                                selected
                                            @endif
                                        >{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label for="nama">Nama Inovasi</label>
                                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama aplikom') }}" value="{{ $aplikom->nama }}">
                                </div>
                               <div class="form-group">
                                    <label for="versi">Versi</label>
                                    <input type="text" id="versi" name="versi" class="form-control @error('versi') is-invalid @enderror" placeholder="{{ __('Versi') }}" value="{{ $aplikom->versi }}">
                                </div>
                               <div class="form-group">
                                    <label for="kel">Kelompok / Individu</label>
                                    <input type="text" id="kel" name="kel" class="form-control @error('kel') is-invalid @enderror" placeholder="{{ __('Kelompok / Individu') }}" value="{{ $aplikom->kel }}">
                                </div>
                               <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="{{ __('Deskripsi') }}">{{ $aplikom->deskripsi }}</textarea>
                                 </div>
                               <input type="hidden" name="status" class="form-control" value="{{ $aplikom->status }}">
                               
                               <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="text" id="tahun" name="tahun" class="form-control @error('tahun') is-invalid @enderror" placeholder="{{ __('Tahun aplikom') }}" value="{{ $aplikom->tahun }}">
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
