<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mitra;
use App\Http\Resources\Mitra as MitraResource;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mitra = Mitra::where('id_user', Auth::user()->id)->get();

        return view('backend.mitra', ['mitra' => $mitra]);
    }

    public function super()
    {
        $mitra = Mitra::all();
        return view('backend.mitra-super', ['mitra' => $mitra]);
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
    public function mitrastore(Request $request)
    {
        $mitra = new Mitra();
        $mitra->nama_mitra  = $request->nama_mitra;
        $mitra->deskripsi   = $request->deskripsi;
        $mitra->alamat      = $request->alamat;
        $mitra->kota        = $request->kota;
        $mitra->phone        = $request->phone;

        $image              = $request->file('file');
        $imageName          = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path('images/mitra/'), $imageName);
        $mitra->foto_mitra  = $imageName;
        $mitra->save();
        return redirect('/mitra-super')->with('sukses', 'Data Berhasil Ditambahkan');
    }
    public function store(Request $request)
    {
        $mitra = new Mitra();
        $mitra->nama_mitra  = $request->nama_mitra;
        $mitra->deskripsi   = $request->deskripsi;
        $mitra->alamat      = $request->alamat;
        $mitra->kota        = $request->kota;
        $mitra->phone       = $request->phone;
        $mitra->id_user     = Auth::user()->id;


        $image              = $request->file('file');
        $imageName          = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path('images/mitra/'), $imageName);
        $mitra->foto_mitra  = $imageName;
        $mitra->save();
        return redirect('/mitra-admin')->with('sukses', 'Data Berhasil Ditambahkan');
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
    public function update(Request $request, $id_mitra)
    {
        $mitra = Mitra::find($id_mitra);

        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->deskripsi = $request->deskripsi;
        $mitra->alamat = $request->alamat;
        $mitra->kota = $request->kota;
        $mitra->phone = $request->phone;

        if (empty($request->image)) {
            $mitra->foto_mitra = $mitra->foto_mitra;
        } else {
            unlink(public_path('images/mitra/') . $mitra->foto_mitra);
            $file       = $request->file('image');
            $name_file  = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/mitra/'), $name_file);
            $mitra->foto_mitra = $name_file;
        }
        $mitra->save();
        return redirect('/mitra-admin')->with('alert-success', 'Data berhasil diubah');
    }

    public function mitraupdate(Request $request, $id_mitra)
    {
        $mitra = Mitra::find($id_mitra);

        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->deskripsi = $request->deskripsi;
        $mitra->alamat = $request->alamat;
        $mitra->kota = $request->kota;
        $mitra->phone = $request->phone;

        if (empty($request->image)) {
            $mitra->foto_mitra = $mitra->foto_mitra;
        } else {
            unlink(public_path('images/mitra/') . $mitra->foto_mitra);
            $file       = $request->file('image');
            $name_file  = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/mitra/'), $name_file);
            $mitra->foto_mitra = $name_file;
        }
        $mitra->save();
        return redirect('/mitra-super')->with('alert-success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_mitra)
    {
        try {
            $mitra = Mitra::find($id_mitra);
            $mitra->delete();
            return redirect('/mitra-admin')->with('alert-success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/mitra-admin')->withErrors('Data gagal Dihapus');
        }
    }
    public function hapus($id_mitra)
    {
        try {
            $mitra = Mitra::find($id_mitra);
            $mitra->delete();
            return redirect('/mitra-super')->with('alert-success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/mitra-super')->withErrors('Data gagal Dihapus');
        }
    }
}
