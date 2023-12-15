<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $produk    = produk::OrderBy('nama', 'asc')->get();
        $mahasiswa  = Mahasiswa::all();
        return view('pages.admin.produk.index', compact('produk','mahasiswa'));
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
            'deskripsi' => 'required',
            'tahun' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'status' => 'required',
        ]);

        if (isset($request->foto)) {
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
            $foto = $file->storeAs('storage/images/produk/', $namaFoto, 'public');
        }
        Produk::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tahun' => $request->tahun,
            'foto' => $namaFoto,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data desain produk berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $produk     = produk::findOrFail($id);

        return view('pages.admin.produk.detail', compact('produk', 'mahasiswa'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $produk     = produk::findOrFail($id);

        return view('pages.admin.produk.edit', compact('produk', 'mahasiswa'));
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        if ($request->id != $produk->id) {
            $this->validate($request, [
                'id' => 'unique:produks'
            ], [
                'id.unique' => 'ID Sudah Ada',
            ]);
        }
            $produk->mahasiswa_id    = $request->mahasiswa_id;
            $produk->nama            = $request->nama;
            $produk->deskripsi       = $request->deskripsi;
            $produk->tahun           = $request->tahun;
            $produk->status          = $request->status;

            if($request->hasFile('foto')) {
                $lokasi = 'storage/images/produk/' . $produk->foto;
                if (File::exists($lokasi)) {
                    File::delete($lokasi);
                }
                $foto       = $request->file('foto');
                $namaFoto   = time() . '.' . $foto->getClientOriginalExtension();
                $tujuanFoto = public_path('storage/images/produk/');
                $foto->move($tujuanFoto, $namaFoto);
                $produk->foto = $namaFoto;
            }
            $produk->update();
    
            return redirect()->route('produk.index')->with('success', 'Data produk berhasil diubah');
         }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        $lokasi = 'storage/images/produk/' . $produk->foto;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        $produk->delete();
        return redirect()->route('produk.index')->with('success', 'Data produk berhasil dihapus');

     }
}
