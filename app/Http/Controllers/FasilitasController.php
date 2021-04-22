<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Fasilitas;
use App\Olahraga;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = DB::table('fasilitas')
            ->join('olahraga', 'olahraga.id_olahraga', '=', 'fasilitas.id_olahraga')
            ->select('fasilitas.*', 'olahraga.*')
            ->get();
        $olahraga  = Olahraga::all();
        return view('admin.fasilitas', compact('olahraga', 'fasilitas'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $fasilitas = DB::table('fasilitas')
            ->where('kota', 'like', "%" . $cari . "%")
            ->paginate();
        return view('admin.fasilitas', ['fasilitas' => $fasilitas]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $fasilitas = new Fasilitas();
        $fasilitas->name = $request->name;
        $fasilitas->fasilitas = $request->fasilitas;
        $fasilitas->id_olahraga = $request->id_olahraga;
        $fasilitas->alamat = $request->alamat;
        $fasilitas->kota = $request->kota;

        $image          = $request->file('image');
        $imageName = time()."_".$image->getClientOriginalName();
        $image->move('images/fasilitas/',$imageName);
        $fasilitas->image = $imageName;
        $fasilitas->save();
        return redirect('/fasilitas')->with('sukses', 'Data Fasilitas Berhasil Ditambahkan');
    }

    public function show()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.showfasilitas', compact('fasilitas'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id_fasilitas)
    {
        $fasilitas = Fasilitas::find($id_fasilitas);

        $fasilitas->name = $request->name;
        $fasilitas->fasilitas = $request->fasilitas;
        $fasilitas->id_olahraga = $request->id_olahraga;
        $fasilitas->alamat = $request->alamat;
        $fasilitas->kota = $request->kota;

        if(empty($request->image))
        {
            $fasilitas->image = $fasilitas->image;
        }
        else
        {
            unlink('images/fasilitas/',$fasilitas->image);
            $file = $request->file('image');
            $imageName = time()."_".$file->getClientOriginalName();
            $file->move('images/fasilitas/',$imageName);
            $fasilitas->image = $name_file;
        }
        $fasilitas->save();
        return redirect('/fasilitas')->with('alert-success', 'Data Berhasil diubah');
    }
    public function destroy($id_fasilitas)
    {
        try {
            DB::table('fasilitas')->where('id_fasilitas', $id_fasilitas)->delete();
            return redirect('/fasilitas')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect('/fasilitas')->withErrors('Data gagal Dihapus');
        }
    }
}
