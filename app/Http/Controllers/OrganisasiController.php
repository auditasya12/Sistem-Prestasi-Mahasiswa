<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisasi    = Organisasi::OrderBy('nama', 'asc')->get();
        $mahasiswa      = Mahasiswa::all();
        return view('pages.admin.organisasi.index', compact('organisasi','mahasiswa'));
    
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
            'jabatan' => 'required',
            'masa_jabatan' => 'required',
            'tahun' => 'required',
            'kategori' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'status' => 'required',
        ]);

        if (isset($request->foto)) {
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
            $foto = $file->storeAs('storage/images/organisasi/', $namaFoto, 'public');
        }
        Organisasi::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'masa_jabatan' => $request->masa_jabatan,
            'tahun' => $request->tahun,
            'kategori' => $request->kategori,
            'foto' => $namaFoto,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data organisasi berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id             = Crypt::decrypt($id);
        $mahasiswa      = Mahasiswa::all();
        $organisasi    = Organisasi::findOrFail($id);

        return view('pages.admin.organisasi.detail', compact('organisasi', 'mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id             = Crypt::decrypt($id);
        $mahasiswa      = Mahasiswa::all();
        $organisasi    = Organisasi::findOrFail($id);

        return view('pages.admin.organisasi.edit', compact('organisasi', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisasi $organisasi)
    {
        if ($request->id != $organisasi->id) {
            $this->validate($request, [
                'id' => 'unique:organisasis'
            ], [
                'id.unique' => 'ID Sudah Ada',
            ]);
        }
          
            $organisasi->mahasiswa_id   = $request->mahasiswa_id;
            $organisasi->nama           = $request->nama;
            $organisasi->jabatan        = $request->jabatan;
            $organisasi->masa_jabatan   = $request->masa_jabatan;
            $organisasi->tahun          = $request->tahun;
            $organisasi->kategori    = $request->kategori;
            if($request->hasFile('foto')) {
                $lokasi = 'storage/images/organisasi/' . $organisasi->foto;
                if (File::exists($lokasi)) {
                    File::delete($lokasi);
                }
                $foto       = $request->file('foto');
                $namaFoto   = time() . '.' . $foto->getClientOriginalExtension();
                $tujuanFoto = public_path('storage/images/organisasi/');
                $foto->move($tujuanFoto, $namaFoto);
                $organisasi->foto = $namaFoto;
            }
            $organisasi->status        = $request->status;
    
            $organisasi->update();
    
            return redirect()->route('organisasi.index')->with('success', 'Data organisasi berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organisasi = Organisasi::find($id);
        $lokasi = 'storage/images/organisasi/' . $organisasi->foto;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        $organisasi->delete();
        return redirect()->route('organisasi.index')->with('success', 'Data organisasi berhasil dihapus');

    }
}
