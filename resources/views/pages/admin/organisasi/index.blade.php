@extends('layouts.main')
@section('title', 'List Portofolio')

@section('content')
<section class="section custom-section">
    <div class="section-body">
        <div class="d-flex">
        <h5 style="color:#fff;margin-right:5px">
            Total Karir Organisasi Mahasiswa
        </h5>
        <br>
        <small style="color:#fff">
            (Capaian unggulan organisasi merupakan wujud capaian meraih gelar kejuaraan. Dapat berupa lomba bidang penalaran, olahraga, kesenian, keagamaan, atau sejenisnya). 
        </small>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- <div class="card-header d-flex justify-content-between">
                        <h4>List Portofolio</h4>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Data Guru</button>
                    </div> -->
                    <div class="card-body">
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
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Nama Karir Organisasi</th>
                                        <th>Jabatan</th>
                                        <th>Masa Jabatan</th>
                                        <th>Tahun</th>
                                        <th>Tingkat</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                @foreach ($organisasi as $result => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->mahasiswa->nama }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->jabatan }}</td>
                                        <td>{{ $data->masa_jabatan }}</td>
                                        <td>{{ $data->tahun }}</td>
                                        <td>{{ $data->kategori }}</td>
                                        <td>
                                        <?php
                                        if($data->status == 0){
                                            echo '<small class="badge badge-warning">Belum Disetujui</small>';
                                        }
                                        else if($data->status == 1){
                                            echo '<small class="badge badge-success">Disetujui</small>';
                                        }
                                        else{
                                            echo '<small class="badge badge-danger">Ditolak</small>';
                                        }
                                    ?>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('organisasi.show', Crypt::encrypt($data->id)) }}" class="btn btn-primary btn-sm" style="margin-right: 8px"><i class="nav-icon fas fa-info"></i> &nbsp; Verifikasi</a>
                                                <a href="{{ route('organisasi.edit', Crypt::encrypt($data->id)) }}" class="btn btn-success btn-sm"><i class="nav-icon fas fa-edit"></i> &nbsp; Edit</a>
                                                <form method="POST" action="{{ route('organisasi.destroy', $data->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm show_confirm" data-toggle="tooltip" title='Delete' style="margin-left: 8px"><i class="nav-icon fas fa-trash-alt"></i> &nbsp; Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
@push('script')
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Yakin ingin menghapus data ini?`
                , text: "Data akan terhapus secara permanen!"
                , icon: "warning"
                , buttons: true
                , dangerMode: true
            , })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
@endpush
