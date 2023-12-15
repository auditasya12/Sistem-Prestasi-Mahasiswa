<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Materi;
use App\Models\Tugas;
//yang diganti
use App\Models\Kompetisi;
use App\Models\Penghargaan;
use App\Models\Organisasi;
//hasil karya
use App\Models\Aplikom;
use App\Models\Artikel;
use App\Models\Buku;
use App\Models\Film;
use App\Models\Produk;
//mahasiswa
use App\Models\Mahasiswa;
use App\Models\Angkatan;
use App\Models\User;
//akhir diganti
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        $kompetisi      = Kompetisi::count();
        $penghargaan    = Penghargaan::count();
        $organisasi     = Organisasi::count();

        //menghitung hasil 
        $aplikom    = Aplikom::count();
        $artikel    = Artikel::count();
        $buku       = Buku::count();
        $film       = Film::count();
        $produk     = Produk::count();
        $mahasiswa  = Mahasiswa::count();
        $user       = User::count();

        $alltot = $kompetisi+$penghargaan+$organisasi+$aplikom+$artikel+$buku+$film+$produk;

        return view('pages.admin.dashboard', compact('kompetisi', 'penghargaan', 'organisasi', 'aplikom', 'artikel', 'buku', 'film', 'alltot', 'mahasiswa', 'user'));
 }

    public function admins(){
        $kompetisi      = Kompetisi::count();
        $penghargaan    = Penghargaan::count();
        $organisasi     = Organisasi::count();

        //menghitung hasil 
        $aplikom    = Aplikom::count();
        $artikel    = Artikel::count();
        $buku       = Buku::count();
        $film       = Film::count();
        $produk     = Produk::count();

        $tot = $aplikom + $artikel + $buku + $film + $produk;
        return view('pages.admin.dashboard-porto', compact('kompetisi', 'penghargaan', 'organisasi', 'aplikom', 'artikel', 'buku', 'film', 'tot'));
    }

    //
    public function adminsub(){
        $kompetisi      = Kompetisi::count();
        $penghargaan    = Penghargaan::count();
        $organisasi     = Organisasi::count();

        //menghitung hasil 
        $aplikom    = Aplikom::count();
        $artikel    = Artikel::count();
        $buku       = Buku::count();
        $film       = Film::count();
        $produk     = Produk::count();

        $tot = $aplikom + $artikel + $buku + $film + $produk;
        return view('pages.admin.dashboard-subporto', compact('kompetisi', 'penghargaan', 'organisasi', 'aplikom', 'artikel', 'buku', 'film', 'produk', 'tot'));
    }

    //dashboard admin bagian mahasiswa
    public function adminmhs(){
        $mahasiswa   = Mahasiswa::all();
        $angkatan    = Angkatan::all();
        $angkatans = Angkatan::withCount('mahasiswas')->get();
        return view('pages.admin.mahasiswa-dashboard', compact('angkatans', 'angkatan', 'mahasiswa'));
    }
    
    public function mahasiswas()
    {
        // Mendapatkan NIM mahasiswa yang sedang login
        $nimMahasiswa = Auth::user()->nim;

        // Mendapatkan ID mahasiswa berdasarkan NIM
        $idMahasiswa = Mahasiswa::where('nim', $nimMahasiswa)->value('id');
        
        // Mendefinisikan status yang diterima
        $statusDiterima = 1;
        // menghitung semua hasil masukan data
        $allkompetisi      = Kompetisi::where('mahasiswa_id', $idMahasiswa)->count();
        $allpenghargaan    = Penghargaan::where('mahasiswa_id', $idMahasiswa)->count();
        $allorganisasi     = Organisasi::where('mahasiswa_id', $idMahasiswa)->count();
        $allaplikom    = Aplikom::where('mahasiswa_id', $idMahasiswa)->count();
        $allartikel    = Artikel::where('mahasiswa_id', $idMahasiswa)->count();
        $allbuku       = Buku::where('mahasiswa_id', $idMahasiswa)->count();
        $allfilm       = Film::where('mahasiswa_id', $idMahasiswa)->count();
        $allproduk     = Produk::where('mahasiswa_id', $idMahasiswa)->count();
        $alltots = $allkompetisi+$allpenghargaan+$allorganisasi+$allaplikom+$allartikel+$allbuku+$allfilm+$allproduk;
        
        // menghitung semua hasil masukan data status oke
        $trmkompetisi      = Kompetisi::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
        $trmpenghargaan    = Penghargaan::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
        $trmorganisasi     = Organisasi::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
        $trmaplikom    = Aplikom::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
        $trmartikel    = Artikel::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
        $trmbuku       = Buku::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
        $trmfilm       = Film::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
        $trmproduk     = Produk::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
        $trmtot = $trmkompetisi+$trmpenghargaan+$trmorganisasi+$trmaplikom+$trmartikel+$trmbuku+$trmfilm+$trmproduk;
        return view('pages.mahasiswa.dashboard', compact('idMahasiswa', 'allkompetisi', 'allpenghargaan', 'allorganisasi', 'allaplikom', 'allartikel', 'allbuku', 'allfilm', 'allproduk', 'alltots'
        , 'trmkompetisi', 'trmpenghargaan', 'trmorganisasi', 'trmaplikom', 'trmartikel', 'trmbuku', 'trmfilm', 'trmproduk', 'trmtot'));
    }
    public function datadir(){
        $angkatan   = Angkatan::all();
        $mahasiswa  = Mahasiswa::where('user_id', Auth::user()->id)->first();
        return view('pages.mahasiswa.portofolio', compact('mahasiswa', 'angkatan'));

    }
    public function porto(){
        // Mendapatkan NIM mahasiswa yang sedang login
    $nimMahasiswa = Auth::user()->nim;

    // Mendapatkan ID mahasiswa berdasarkan NIM
    $idMahasiswa = Mahasiswa::where('nim', $nimMahasiswa)->value('id');

    // Mendefinisikan status yang diterima
    $statusDiterima = 1;
    $listkompetisi = Kompetisi::where([
        'mahasiswa_id' => $idMahasiswa,
    ])->get();
    $listpenghargaan = Penghargaan::where([
        'mahasiswa_id' => $idMahasiswa,
    ])->get();
    $listartikel = Artikel::where([
        'mahasiswa_id' => $idMahasiswa,
    ])->get();
    $listbuku = Buku::where([
        'mahasiswa_id' => $idMahasiswa,
    ])->get();
    $listaplikom = Aplikom::where([
        'mahasiswa_id' => $idMahasiswa,
    ])->get();
    $listfilm = Film::where([
        'mahasiswa_id' => $idMahasiswa,
    ])->get();
    $listorganisasi = Organisasi::where([
        'mahasiswa_id' => $idMahasiswa,
    ])->get();
    $listproduk = Produk::where([
        'mahasiswa_id' => $idMahasiswa,
    ])->get();


    // Menghitung jumlah Aplikom berdasarkan ID mahasiswa dan status diterima
    $aplikom        = Aplikom::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
    $kompetisis      = Kompetisi::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
    $penghargaan    = Penghargaan::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
    $organisasi     = Organisasi::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();

    // Menghitung hasil
    $artikel    = Artikel::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
    $buku       = Buku::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
    $film       = Film::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();
    $produk     = Produk::where('mahasiswa_id', $idMahasiswa)->where('status', $statusDiterima)->count();

    // Pass the $idMahasiswa variable to the view
    return view('pages.mahasiswa.app-dashboard', compact('idMahasiswa', 'listkompetisi', 'listpenghargaan', 'listartikel', 'listbuku', 'listaplikom', 'listproduk', 'listfilm', 'listorganisasi', 'kompetisis', 'penghargaan', 'organisasi', 'aplikom', 'artikel', 'buku', 'film', 'produk'));

    }
}
