<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $angkatan  = Angkatan::orderBy('tahun', 'asc')->get();
        return view('pages.admin.angkatan.index', compact('angkatan'));
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
        $request->validate([
            'tahun' => 'required|string|max:255',
        ]);

        angkatan::create([
            'tahun' => $request->input('tahun'),
        ]);

        return redirect()->back()->with('success', 'Tahun angkatan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function show(angkatan $angkatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $angkatan = Angkatan::find($id);
        return view('pages.admin.angkatan.edit', compact('angkatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angkatan $angkatan)
    {
        $data = $request->all();

        if ($request->id != $angkatan->id) {
            $this->validate($request, [
                'id' => 'unique:angkatans'
            ], [
                'id.unique' => 'ID Sudah Ada',
            ]);
        }
        $angkatan->tahun           = $request->tahun;

        $angkatan->update();

        return redirect()->route('angkatan.index')->with('success', 'Tahun angkatan berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\angkatan  $angkatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $angkatan = angkatan::find($id);
        $angkatan->delete();

        return redirect()->back()->with('success', 'Tahun angkatan berhasil dihapus');
    }
}
