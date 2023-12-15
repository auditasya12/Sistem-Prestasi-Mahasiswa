<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku    = buku::OrderBy('nama', 'asc')->get();
        $mahasiswa  = Mahasiswa::all();
        return view('pages.admin.buku.index', compact('buku','mahasiswa'));
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
            'pengarang' => 'required',
            'penerbit' => 'required',
            'kategori' => 'required',
            'jumlah_hal' => 'required',
            'isbn' => 'required',
            'sinopsis' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'tahun' => 'required',
            'status' => 'required',
        ]);

        if (isset($request->foto)) {
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
            $foto = $file->storeAs('storage/images/buku/', $namaFoto, 'public');
        }
        Buku::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'nama' => $request->nama,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'kategori' => $request->kategori,
            'jumlah_hal' => $request->jumlah_hal,
            'isbn' => $request->isbn,
            'sinopsis' => $request->sinopsis,
            'foto' => $namaFoto,
            'tahun' => $request->tahun,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data buku berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $buku    = buku::findOrFail($id);

        return view('pages.admin.buku.detail', compact('buku', 'mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id         = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $buku    = buku::findOrFail($id);

        return view('pages.admin.buku.edit', compact('buku', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        if ($request->id != $buku->id) {
            $this->validate($request, [
                'id' => 'unique:bukus'
            ], [
                'id.unique' => 'ID Sudah Ada',
            ]);
        }
            $buku->mahasiswa_id    = $request->mahasiswa_id;
            $buku->nama            = $request->nama;
            $buku->pengarang        = $request->pengarang;
            $buku->penerbit        = $request->penerbit;
            $buku->kategori        = $request->kategori;
            $buku->jumlah_hal        = $request->jumlah_hal;
            $buku->isbn        = $request->isbn;
            $buku->sinopsis        = $request->sinopsis;
            $buku->tahun           = $request->tahun;
            if($request->hasFile('foto')) {
                $lokasi = 'storage/images/buku/' . $buku->foto;
                if (File::exists($lokasi)) {
                    File::delete($lokasi);
                }
                $foto       = $request->file('foto');
                $namaFoto   = time() . '.' . $foto->getClientOriginalExtension();
                $tujuanFoto = public_path('storage/images/buku/');
                $foto->move($tujuanFoto, $namaFoto);
                $buku->foto = $namaFoto;
            }
            $buku->status          = $request->status;
    
            $buku->update();
    
            return redirect()->route('buku.index')->with('success', 'Data buku berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $lokasi = 'storage/images/buku/' . $buku->foto;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus');

    }
}
