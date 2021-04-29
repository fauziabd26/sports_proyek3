<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pitch;
use App\Sports;
use App\Mitra;
use DB;

class DashboardadminController extends Controller
{
    public function indexadmin()
    {
        $user = User::count();
        $pitch = Pitch::count();
        $sports = Sports::count();
        // $calonMurid = Murid::where('level','calon murid')->count();
        // $murid = Murid::where('level','murid')->count();
        // $lulusan = Murid::where('level','lulusan')->count();
        // $pemasukkan = Pemasukkan::sum('nominal');
        // $pengeluaran = Pengeluaran::sum('nominal');

        return view('admin.home', compact('user', 'pitch', 'sports'));
    }
    public function indexsuperAdmin()
    {
        $olahraga = Olahraga::count();
        $penyewa = Penyewa::count();
        $fasilitas = Fasilitas::count();
        //$admin = Admin::count();
        // $calonMurid = Murid::where('level','calon murid')->count();
        // $murid = Murid::where('level','murid')->count();
        // $lulusan = Murid::where('level','lulusan')->count();
        //$pemasukkan = Pemasukkan::sum('nominal');
        // $pengeluaran = Pengeluaran::sum('nominal');

        return view('superadmin.home', compact('olahraga','penyewa', 'fasilitas'));
    }
    public function indexcalonAdmin()
    {
        $mitra = DB::table('mitra')
                ->join('admin', 'admin.id_admin', '=', 'mitra.id_admin')
                ->select('mitra.*', 'admin.*')
                ->where('mitra.id_admin', session('admin'))
                ->get();
        $admin = Admin::all();
        return view('calonadmin.home', compact('mitra', 'admin'));
    }
    
}
