<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film       = film::OrderBy('nama', 'asc')->get();
        $mahasiswa  = Mahasiswa::all();
       return view('pages.admin.film.index', compact('film','mahasiswa'));
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
            'sutradara' => 'required',
            'pemain' => 'required',
            'genre' => 'required',
            'durasi' => 'required',
            'sinopsis' => 'required',
            'foto' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'status' => 'required',
        ]);

        if (isset($request->foto)) {
            $file = $request->file('foto');
            $namaFoto = time() . '.' . $file->getClientOriginalExtension();
            $foto = $file->storeAs('storage/images/film/', $namaFoto, 'public');
        }
        Film::create([
            'mahasiswa_id' => $request->mahasiswa_id,
            'nama' => $request->nama,
            'sutradara' => $request->sutradara,
            'pemain' => $request->pemain,
            'genre' => $request->genre,
            'durasi' => $request->durasi,
            'sinopsis' => $request->sinopsis,
            'tahun' => $request->tahun,
            'foto' => $namaFoto,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Data film berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        $id         = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $film       = film::findOrFail($id);

        return view('pages.admin.film.detail', compact('film', 'mahasiswa'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id         = Crypt::decrypt($id);
        $mahasiswa  = Mahasiswa::all();
        $film       = film::findOrFail($id);

        return view('pages.admin.film.edit', compact('film', 'mahasiswa'));
 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        if ($request->id != $film->id) {
            $this->validate($request, [
                'id' => 'unique:films'
            ], [
                'id.unique' => 'ID Sudah Ada',
            ]);
        }
            $film->mahasiswa_id    = $request->mahasiswa_id;
            $film->nama            = $request->nama;
            $film->sutradara        = $request->sutradara;
            $film->pemain        = $request->pemain;
            $film->genre       = $request->genre;
            $film->durasi        = $request->durasi;
            $film->sinopsis        = $request->sinopsis;
            $film->foto        = $request->foto;
            $film->tahun           = $request->tahun;
            if($request->hasFile('foto')) {
                $lokasi = 'storage/images/film/' . $film->foto;
                if (File::exists($lokasi)) {
                    File::delete($lokasi);
                }
                $foto       = $request->file('foto');
                $namaFoto   = time() . '.' . $foto->getClientOriginalExtension();
                $tujuanFoto = public_path('storage/images/film/');
                $foto->move($tujuanFoto, $namaFoto);
                $film->foto = $namaFoto;
            }
            $film->status          = $request->status;
    
            $film->update();
    
            return redirect()->route('film.index')->with('success', 'Data film berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        $lokasi = 'storage/images/film/' . $film->foto;
        if (File::exists($lokasi)) {
            File::delete($lokasi);
        }

        $film->delete();
        return redirect()->route('film.index')->with('success', 'Data film berhasil dihapus');

   }
}
