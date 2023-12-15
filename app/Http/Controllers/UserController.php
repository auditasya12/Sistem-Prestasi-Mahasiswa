<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::OrderBy('roles', 'asc')->get();
        return view('pages.admin.user.index', compact('user'));
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
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'roles' => 'required',
        ], [
            'email.unique' => 'Email sudah terdaftar',
        ]);

        if ($request->roles == 'mahasiswa') {
            $countMahasiswa = Mahasiswa::where('nim', $request->nim)->count();
            $mahasiswaId = Mahasiswa::where('nim', $request->nim)->get();
            foreach ($mahasiswaId as $val) {
                $mahasiswa = Mahasiswa::findOrFail($val->id);
            }

            if ($countMahasiswa >= 1) {
                User::create([
                    'name' => $mahasiswa->nama,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'roles' => $request->roles,
                    'nim' => $request->nim,
                ]);

                // Add user id to guru table
                $mahasiswa->user_id = User::where('email', $request->email)->first()->id;
                $mahasiswa->save();

                return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan');
            } else {
                return redirect()->route('user.index')->with('error', 'NIM tidak terdaftar sebagai mahasiswa');
            }
        } else if($request->roles == 'admin'){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'roles' => $request->roles
            ]);
            return redirect()->route('user.index')->with('success', 'Data user berhasil ditambahkan');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
        $admin = User::findOrFail(Auth::user()->id);

        return view('pages.profile', compact('mahasiswa', 'admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (Auth::user()->roles == 'mahasiswa') {
            
            $this->validate($request, [
                'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
           
            if (isset($request->foto)) {
                $file = $request->file('foto');
                $namaFoto = time() . '.' . $file->getClientOriginalExtension();
                $foto = $file->storeAs('images/mahasiswa', $namaFoto, 'public');
            }
            // Save to guru table
            $mahasiswa = Mahasiswa::where('user_id', Auth::user()->id)->first();
            $mahasiswa->foto      = $namaFoto;
            $mahasiswa->update();
            
            return redirect()->route('mahasiswa.portofolio')->with('success', 'Data berhasil diubah');
            // Save to user table
        }else{
            abort(404);
        }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('success', 'Data user berhasil dihapus');
    }

}
