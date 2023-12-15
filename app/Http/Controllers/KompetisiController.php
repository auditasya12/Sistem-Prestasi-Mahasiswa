<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kompetisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class KompetisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kompetisi = Kompetisi::OrderBy('nama', 'asc')->get();
        $mahasiswa = Mahasiswa::all();
        return view('pages.admin.kompetisi.index', compact('kompetisi','mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        abort(404);
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
            'mahasiswa_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'kel' => 'required',
            'instansi' => 'required',
            'kategori' => 'required',
            'tahun' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'status' => 'required',
        ]);

        if (isset($request->foto)) {
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
            $foto = $file->storeAs('storage/images/kompetisi/', $namaFoto, 'public');
        }
        Kompetisi::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kel' => $request->kel,
            'instansi' => $request->instansi,
            'kategori' => $request->kategori,
            'tahun' => $request->tahun,
            'foto' => $namaFoto,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data kompetisi berhasil dibuat!');
    }

    
    public function tampilDataKompetisi()
    {
        $mahasiswa = Auth::where('nim', Auth::user()->nim)->first();
        $kompetisi = Kompetisi::findOrFail($mahasiswa->mahasiswa_id);
    
        return view('pages.mahasiswa.app-dashboard',  compact('mahasiswa', 'kompetisi'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kompetisi  $kompetisi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $kompetisi  = Kompetisi::findOrFail($id);

        return view('pages.admin.kompetisi.detail', compact('kompetisi', 'mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kompetisi  $kompetisi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $kompetisi  = Kompetisi::findOrFail($id);

        return view('pages.admin.kompetisi.edit', compact('kompetisi', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kompetisi  $kompetisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kompetisi $kompetisi)
    { 
        if ($request->id != $kompetisi->id) {
        $this->validate($request, [
            'id' => 'unique:kompetisis'
        ], [
            'id.unique' => 'ID Sudah Ada',
        ]);
    }
        $kompetisi->mahasiswa_id    = $request->mahasiswa_id;
        $kompetisi->nama            = $request->nama;
        $kompetisi->deskripsi       = $request->deskripsi;
        $kompetisi->kel             = $request->kel;
        $kompetisi->instansi        = $request->instansi;
        $kompetisi->kategori        = $request->kategori;
        $kompetisi->tahun           = $request->tahun;
        
        if($request->hasFile('foto')) {
            $lokasi = 'storage/images/kompetisi/' . $kompetisi->foto;
            if (File::exists($lokasi)) {
                File::delete($lokasi);
            }
            $foto       = $request->file('foto');
            $namaFoto   = time() . '.' . $foto->getClientOriginalExtension();
            $tujuanFoto = public_path('storage/images/kompetisi/');
            $foto->move($tujuanFoto, $namaFoto);
            $kompetisi->foto = $namaFoto;
        }
        $kompetisi->status          = $request->status;

        $kompetisi->update();

        return redirect()->route('kompetisi.index')->with('success', 'Data kompetisi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kompetisi  $kompetisi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kompetisi = Kompetisi::find($id);
        $lokasi = 'storage/images/kompetisi/' . $kompetisi->foto;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        $kompetisi->delete();
        return redirect()->route('kompetisi.index')->with('success', 'Data kompetisi berhasil dihapus');

    }
}
