<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UtamaController extends Controller
{
    public function index()
    {
        $fasilitas = DB::table('fasilitas')->get();
        return view('user.template',compact('fasilitas'));
	}
}
