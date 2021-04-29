<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyewa;
use DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'nama_penyewa'  => 'required|string',
            'email'         => 'required|unique:penyewa|min:3|string|max:100', 
            'password'      => 'required|string|min:5',
            'alamat'        => 'required|string',
            'telepon'       => 'required|string',
        ],
        [
            'email.unique'              => 'Email sudah ada yang pakai',
            'email.min'                 => 'Email minimal 3',
            'email.required'            => 'Email harus diisi',
            'nama_penyewa.required'     => 'Nama harus diisi',
            'alamat.required'           => 'Alamat harus diisi',
            'password.required'         => 'Password harus diisi', 
            'alamat.required'           => 'Alamat harus diisi',
            'telepon.required'          => 'Nomor Telepon harus diisi',
            'max'                       => 'panjang karakter maksimal 100',
        ]);
        $data = array(
            'id_penyewa'=>$request->id_penyewa,
            'nama_penyewa'=>$request->nama_penyewa,
            'email'=>$request->email,
            'password'=>$request->password,
            'alamat'=>$request->alamat,
            'telepon'=>$request->telepon,
            
        );
        Penyewa::create($data);
        return redirect('/homeuser')->with('success','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
