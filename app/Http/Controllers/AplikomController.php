<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Aplikom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class AplikomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aplikom    = Aplikom::OrderBy('nama', 'asc')->get();
        $mahasiswa  = Mahasiswa::all();
        return view('pages.admin.aplikom.index', compact('aplikom','mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'versi' => 'required',
            'kel' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'tahun' => 'required',
            'status' => 'required',
        ]);

        if (isset($request->foto)) {
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
            $foto = $file->storeAs('storage/images/aplikom/', $namaFoto, 'public');
        }
        Aplikom::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'nama' => $request->nama,
            'versi' => $request->versi,
            'kel' => $request->kel,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFoto,
            'tahun' => $request->tahun,
            'status' => $request->status,
        ]);
        
        return back()->with('success', 'Data aplikom berhasil dibuat!');
    }

    public function detail(){
        // Mendapatkan ID pengguna yang sedang login
        $userID = Auth::id();

        // Mengambil berita yang terkait dengan pengguna yang sedang login
        $detailAplikom = \App\Models\User::find($userID)->aplikom;

        return view('mahasiswa.aplikom.index', compact('detailAplikom'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aplikom  $aplikom
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $aplikom  = Aplikom::findOrFail($id);

        return view('pages.admin.aplikom.detail', compact('aplikom', 'mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aplikom  $aplikom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id         = Crypt::decrypt($id);
        $aplikom    = Aplikom::findOrFail($id);
        $mahasiswa  = Mahasiswa::all();
        // $mahasiswa  = $aplikom->mahasiswa;

        return view('pages.admin.aplikom.edit', compact('aplikom', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aplikom  $aplikom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aplikom $aplikom)
    {
        if ($request->id != $aplikom->id) {
            $this->validate($request, [
                'id' => 'unique:aplikoms'
            ], [
                'id.unique' => 'ID Sudah Ada',
            ]);
        }
        
            $aplikom->mahasiswa_id    = $request->mahasiswa_id;
            $aplikom->nama            = $request->nama;
            $aplikom->versi           = $request->versi;
            $aplikom->kel             = $request->kel;
            $aplikom->deskripsi       = $request->deskripsi;
            $aplikom->tahun           = $request->tahun;
            $aplikom->status          = $request->status; 

            if($request->hasFile('foto')) {
                $lokasi = 'storage/images/aplikom/' . $aplikom->foto;
                if (File::exists($lokasi)) {
                    File::delete($lokasi);
                }
                $foto       = $request->file('foto');
                $namaFoto   = time() . '.' . $foto->getClientOriginalExtension();
                $tujuanFoto = public_path('storage/images/aplikom/');
                $foto->move($tujuanFoto, $namaFoto);
                $aplikom->foto = $namaFoto;
            }
            $aplikom->update();
    
            return redirect()->route('aplikom.index')->with('success', 'Data aplikom berhasil diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aplikom  $aplikom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aplikom = Aplikom::find($id);
        $lokasi = 'storage/images/aplikom/' . $aplikom->foto;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        $aplikom->delete();
        return redirect()->route('aplikom.index')->with('success', 'Data aplikom berhasil dihapus');
    }
}
