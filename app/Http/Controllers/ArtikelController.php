<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel    = Artikel::OrderBy('nama', 'asc')->get();
        $mahasiswa  = Mahasiswa::all();
        return view('pages.admin.artikel.index', compact('artikel','mahasiswa'));
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
            'mahasiswa_id' => 'required',
            'nama' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'tahun' => 'required',
            'status' => 'required',
        ]);
        if (isset($request->foto)) {
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
            $foto = $file->storeAs('storage/images/artikel/', $namaFoto, 'public');
        }
        Artikel::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'nama' => $request->nama,
            'penerbit' => $request->penerbit,
            'tahun' => $request->tahun,
            'foto' => $namaFoto,
            'tahun' => $request->tahun,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data artikel berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $artikel    = Artikel::findOrFail($id);

        return view('pages.admin.artikel.detail', compact('artikel', 'mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id         = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $artikel    = Artikel::findOrFail($id);

        return view('pages.admin.artikel.edit', compact('artikel', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        if ($request->id != $artikel->id) {
            $this->validate($request, [
                'id' => 'unique:artikels'
            ], [
                'id.unique' => 'ID Sudah Ada',
            ]);
        }
            $artikel->mahasiswa_id    = $request->mahasiswa_id;
            $artikel->nama            = $request->nama;
            $artikel->penerbit        = $request->penerbit;
            $artikel->tahun           = $request->tahun;
            if($request->hasFile('foto')) {
                $lokasi = 'storage/images/artikel/' . $artikel->foto;
                if (File::exists($lokasi)) {
                    File::delete($lokasi);
                }
                $foto       = $request->file('foto');
                $namaFoto   = time() . '.' . $foto->getClientOriginalExtension();
                $tujuanFoto = public_path('storage/images/artikel/');
                $foto->move($tujuanFoto, $namaFoto);
                $artikel->foto = $namaFoto;
            }
            $artikel->status          = $request->status;
    
            $artikel->update();
    
            return redirect()->route('artikel.index')->with('success', 'Data artikel berhasil diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $lokasi = 'storage/images/artikel/' . $artikel->foto;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        $artikel->delete();
        return redirect()->route('artikel.index')->with('success', 'Data artikel berhasil dihapus');
    }
}
