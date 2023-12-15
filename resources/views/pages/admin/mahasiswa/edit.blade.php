@extends('layouts.main')
@section('title', 'Edit Mahasiswa')

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
                            <h4>Edit Mahasiswa {{ $mahasiswa->nama }}</h4>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <img src="{{ asset('storage/images/mahasiswa/' . $mahasiswa->foto) }}" style="width:380px;" alt="Foto">
                                <div class="form-group">
                                    <label for="foto">Foto Mahasiswa</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input id="foto" type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" id="foto">
                                            <label class="custom-file-label" for="foto">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Mahasiswa</label>
                                    <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama Mahasiswa') }}" value="{{ $mahasiswa->nama }}">
                                </div>
                                <div class="d-flex">
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="number" id="nim" name="nim" class="form-control @error('nim') is-invalid @enderror" placeholder="{{ __('NIM Mahasiswa') }}" value="{{ $mahasiswa->nim }}">
                                    </div>
                                    <div class="form-group ml-4">
                                        <label for="telp">No. Telp</label>
                                        <input type="text" id="telp" name="telp" class="form-control @error('telp') is-invalid @enderror" placeholder="{{ __('No. Telp Mahasiswa') }}" value="{{ $mahasiswa->telp }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Program Studi</label>
                                    <input type="text" id="prodi" name="prodi" class="form-control @error('prodi') is-invalid @enderror" placeholder="{{ __('Program Studi') }}" value="{{ $mahasiswa->prodi }}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="{{ __('Alamat') }}">{{ $mahasiswa->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="angkatan_id">Angkatan</label>
                                    <select id="angkatan_id" name="angkatan_id" class="select2bs4 form-control @error('angkatan_id') is-invalid @enderror">
                                        <option value="">-- Pilih Angkatan --</option>
                                        @foreach ($angkatan as $data )
                                            <option value="{{ $data->id }}"
                                            @if ($mahasiswa->angkatan_id == $data->id)
                                                selected
                                            @endif
                                        >{{ $data->tahun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label><br/>
                                    <?php
                                    if($mahasiswa->status == 0){
                                        echo '<input type="radio" name="status" value="0" checked>Tidak Aktif
                                        <input type="radio" name="status" value="1">Aktif';
                                        }else{
                                        echo '<input type="radio" name="status" value="0" >Tidak Aktif
                                        <input type="radio" name="status" value="1" checked>Aktif';
                                        }
                                        ?>
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
