<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Olahraga;

class OlahragaController extends Controller
{
    public function index()
    {
        $olahraga = \App\Olahraga::all();
        return view('superadmin.olahraga', ['olahraga' => $olahraga]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $olahraga = DB::table('olahraga')
            ->where('name_olahraga', 'like', "%" . $cari . "%")
            ->paginate();
        return view('superadmin.olahraga', ['olahraga' => $olahraga]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $olahraga = new Olahraga();
        $olahraga->name_olahraga = $request->name_olahraga;

        $image          = $request->file('file');
        $imageName = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path('images/'), $imageName);
        $olahraga->image = $imageName;
        $olahraga->save();
        return redirect('/olahraga')->with('sukses', 'Data Kategori Olahraga Berhasil Ditambahkan');
    }

    public function show()
    {
        $olahraga = Olahraga::all();
        return view('superadmin.showolahraga', compact('olahraga'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id_olahraga)
    {
        $olahraga = Olahraga::find($id_olahraga);

        $olahraga->name_olahraga = $request->name_olahraga;

        if (empty($request->image)) {
            $olahraga->image = $olahraga->image;
        } else {
            unlink(public_path('images/') . $olahraga->image);
            $file       = $request->file('image');
            $name_file  = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/'), $name_file);
            $olahraga->image = $name_file;
        }
        $olahraga->save();
        return redirect('/olahraga')->with('alert-success', 'Data berhasil diubah');
    }
    public function destroy($id_olahraga)
    {
        try {
            $olahraga = Olahraga::find($id_olahraga);
    	    $olahraga->delete();
    	    return redirect('/olahraga')->with('alert-success','Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/olahraga')->withErrors('Data gagal Dihapus');
        }
    }
}
