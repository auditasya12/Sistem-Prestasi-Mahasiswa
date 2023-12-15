<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Penghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PenghargaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penghargaan    = Penghargaan::OrderBy('nama', 'asc')->get();
        $mahasiswa      = Mahasiswa::all();
        return view('pages.admin.penghargaan.index', compact('penghargaan','mahasiswa'));
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
            'instansi' => 'required',
            'lokasi' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'kategori' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'status' => 'required',
        ]);

        if (isset($request->foto)) {
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
            $foto = $file->storeAs('storage/images/penghargaan/', $namaFoto, 'public');
        }
        Penghargaan::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'nama' => $request->nama,
            'instansi' => $request->instansi,
            'lokasi' => $request->lokasi,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'kategori' => $request->kategori,
            'foto' => $namaFoto,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data penghargaan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id             = Crypt::decrypt($id);
        $mahasiswa      = Mahasiswa::all();
        $penghargaan    = Penghargaan::findOrFail($id);

        return view('pages.admin.penghargaan.detail', compact('penghargaan', 'mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id             = Crypt::decrypt($id);
        $mahasiswa      = Mahasiswa::all();
        $penghargaan    = Penghargaan::findOrFail($id);

        return view('pages.admin.penghargaan.edit', compact('penghargaan', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Penghargaan $penghargaan)
    {
        if ($request->id != $penghargaan->id) {
            $this->validate($request, [
                'id' => 'unique:penghargaans'
            ], [
                'id.unique' => 'ID Sudah Ada',
            ]);
        }
          
            $penghargaan->mahasiswa_id  = $request->mahasiswa_id;
            $penghargaan->nama          = $request->nama;
            $penghargaan->instansi      = $request->instansi;
            $penghargaan->lokasi        = $request->lokasi;
            $penghargaan->tgl_mulai     = $request->tgl_mulai;
            $penghargaan->tgl_selesai   = $request->tgl_selesai;
            $penghargaan->kategori      = $request->kategori;
            if($request->hasFile('foto')) {
                $lokasi = 'storage/images/penghargaan/' . $penghargaan->foto;
                if (File::exists($lokasi)) {
                    File::delete($lokasi);
                }
                $foto       = $request->file('foto');
                $namaFoto   = time() . '.' . $foto->getClientOriginalExtension();
                $tujuanFoto = public_path('storage/images/penghargaan/');
                $foto->move($tujuanFoto, $namaFoto);
                $penghargaan->foto = $namaFoto;
            }
            
            $penghargaan->status        = $request->status;
    
            $penghargaan->update();
    
            return redirect()->route('penghargaan.index')->with('success', 'Data Penghargaan berhasil diubah');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penghargaan = Penghargaan::find($id);
        $lokasi = 'storage/images/penghargaan/' . $penghargaan->foto;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        $penghargaan->delete();
        return redirect()->route('penghargaan.index')->with('success', 'Data penghargaan berhasil dihapus');

    }
}
