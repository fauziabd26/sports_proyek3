<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifikasi;
use DB;

class NotifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifikasi = Notifikasi::all();
        return view('admin.notifikasi', ['notifikasi' => $notifikasi]);
    
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
            'notif'  => 'required|string'
        ],
        [
            'notif.required'            => 'Notifikasi harus diisi',
        ]);
        $data = array(
            'id_penyewa'=>$request->id_penyewa,
            'notif'=>$request->notif,
        );
        Notifikasi::create($data);
        return redirect('/notifikasi')->with('alert-success','Notifikasi Berhasil Ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notifikasi = Notifikasi::all();
        return view('user.notifikasi', ['notifikasi' => $notifikasi]);
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
        $notifikasi = Notifikasi::find($id);

        $notifikasi->notif = $request->notif;
        $notifikasi->save();
        return redirect('/notifikasi')->with('alert-success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $notifikasi = Notifikasi::find($id);
            $notifikasi->delete();
            return redirect('/notifikasi')->with('alert-success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/notifikasi')->withErrors('Data gagal Dihapus');
        }
    }
}
