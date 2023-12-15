@extends('layouts.main')
@section('title', 'Edit Kategori')

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
                            <h4>Edit Kategori{{ $kategori->nama_kategori }}</h4>
                            <a href="{{ route('kategori.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="tingkat">Nama Kategori</label>
                                    <input type="text" id="tingkat" name="tingkat" class="form-control @error('tingkat') is-invalid @enderror" placeholder="{{ __('Tingkat') }}" value="{{ $kategori->tingkat }}">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
