<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Olahraga;
use App\Fasilitas;

class UtamaController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        $olahraga = OLahraga::all();
        return view('user.template',compact('fasilitas','olahraga'));
	}
}
