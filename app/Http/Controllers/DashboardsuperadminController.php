<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Olahraga;


class DashboardsuperadminController extends Controller
{
    public function index()
    {
        $olahraga = Olahraga::count();
        //$admin = Admin::count();
        // $calonMurid = Murid::where('level','calon murid')->count();
        // $murid = Murid::where('level','murid')->count();
        // $lulusan = Murid::where('level','lulusan')->count();
        // $instruktur = Instruktur::count();
        // $paket = Paket::count();
        // $jadwal = Jadwal::count();
        // $testimoni = Testimoni::count();
        // $riwayat = Riwayat::count();
        // $pemasukkan = Pemasukkan::sum('nominal');
        // $pengeluaran = Pengeluaran::sum('nominal');

        return view('superadmin.home', compact('olahraga'));
    }
}
