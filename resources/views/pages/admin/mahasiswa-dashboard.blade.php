@extends('layouts.main')
@section('title', 'Dashboard Mahasiswa')

@section('content')
    <section class="section custom-section">
        <div class="section-header d-flex justify-content-between">
            <h1>Dashboard Mahasiswa</h1> 
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Data Mahasiswa
            </button>    
        </div>
        
        
        @if ($errors->any())
        <div class="col md-12">
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
        </div>
        @endif

        <div class="section-body">
            <div class="row">
            <div class="col-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>&times;</span>
                                </button>
                                {{ $message }}
                            </div>
                        </div>
                        @endif
       
            </div>
                        @foreach ($angkatans as $data)
                        <div class="col-md-3">
                                <a href="{{ route('mahasiswa.show', Crypt::encrypt($data->id)) }}">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-warning">
                                            <i class="fas fa-solid fa-building"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <div class="d-flex">
                                                    <h4>{{ $data->tahun }}</h4> 
                                                    <small style="font-size:8pt;margin-top:-12px">*Mahasiswa terdaftar</small>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                {{ $data->mahasiswas_count }}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                        </div> 
                        @endforeach
                            <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Mahasiswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('mahasiswa.store') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="nim">NIM</label>
                                                            <input type="number" id="nim" name="nim" class="form-control @error('nim') is-invalid @enderror" placeholder="{{ __('NIM') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="nama">Nama</label>
                                                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="{{ __('Nama Lengkap') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="prodi">Program Studi</label>
                                                            <input type="text" id="prodi" name="prodi" class="form-control @error('prodi') is-invalid @enderror" placeholder="{{ __('Program Studi') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="angkatan">Angkatan Tahun</label>
                                                            <select id="angkatan_id" name="angkatan_id" class="select2 form-control @error('angkatan_id') is-invalid @enderror">
                                                                <option value="">-- Pilih Angkatan --</option>
                                                                @foreach ($angkatan as $data )
                                                                <option value="{{ $data->id }}">{{ $data->tahun }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="telp">Telepon</label>
                                                            <input type="number" id="telp" name="telp" class="form-control @error('telp') is-invalid @enderror" placeholder="{{ __('Telepon / WA') }}">
                                                        </div>
                                                        <input type="hidden" name="status" value="1">
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-whitesmoke br">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- akhir modal -->
            </div>
        </div>
    </section>
@endsection