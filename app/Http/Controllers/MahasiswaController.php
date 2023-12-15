<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class MahasiswaController extends Controller
{
    public function index()
    { 
        $mahasiswa = Mahasiswa::OrderBy('nama', 'asc')->get();
        $angkatan = Angkatan::all();
        return view('pages.admin.mahasiswa.index', compact('mahasiswa', 'angkatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'prodi' => 'required',
            'alamat' => 'required',
            'angkatan_id' => 'required',
            'telp' => 'required',
            'status' => 'required',
        ], [
            'nim.unique' => 'NIM sudah terdaftar',

        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'alamat' => $request->alamat,
            'angkatan_id' => $request->angkatan_id,
            'telp' => $request->telp,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.mahasiswa-dashboard')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $data = DB::table('mahasiswas')
        ->join('angkatans', 'mahasiswas.angkatan_id', '=', 'angkatans.id')
        ->where('angkatans.id', $id)
        // ->where('mahasiswas.status', 1)
        ->select('mahasiswas.*', 'angkatans.tahun')
        ->orderBy('angkatans.tahun', 'asc')
        ->get();

        // Mendapatkan tahun angkatan berdasarkan ID
        $tahunAngkatan = DB::table('angkatans')->where('id', $id)->value('tahun');
        $angkatan = Angkatan::all();
        return view('pages.admin.mahasiswa.index', compact('data', 'tahunAngkatan', 'angkatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $angkatan = Angkatan::all();
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('pages.admin.mahasiswa.edit', compact('mahasiswa', 'angkatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {  
        if ($request->nim != $mahasiswa->nim) {
        $this->validate($request, [
            'nim' => 'unique:mahasiswas'
        ], [
            'nim.unique' => 'NIM sudah terdaftar',
        ]);
        }
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->prodi = $request->prodi;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->angkatan_id = $request->angkatan_id;
        $mahasiswa->telp = $request->telp;
        if($request->hasFile('foto')) {
            $lokasi = 'storage/images/mahasiswa/' . $mahasiswa->foto;
            if (File::exists($lokasi)) {
                File::delete($lokasi);
            }
            $foto       = $request->file('foto');
            $namaFoto   = time() . '.' . $foto->getClientOriginalExtension();
            $tujuanFoto = public_path('storage/images/mahasiswa/');
            $foto->move($tujuanFoto, $namaFoto);
            $mahasiswa->foto = $namaFoto;
        }
        $mahasiswa->status = $request->status;

        $mahasiswa->update();

        return redirect()->route('admin.mahasiswa-dashboard')->with('success', 'Data mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $lokasi = 'img/mahasiswa/' . $mahasiswa->foto;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        $mahasiswa->delete();
        return redirect()->route('admin.mahasiswa-dashboard')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
