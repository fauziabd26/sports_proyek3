<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Sports;
use App\Pitch;

class UtamaController extends Controller
{
    public function index()
    {
        $pitch = Pitch::all();
        $sports = Sports::all();
        return view('user.template',compact('pitch','sports'));
	}
	public function user()
    {
        $pitch = Pitch::all();
        $sports = Sports::all();
        return view('user.dashboardoperator',compact('pitch','sports'));
	}
}
