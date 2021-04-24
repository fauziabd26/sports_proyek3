<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fasilitas;
use App\Olahraga;
use DB;
use App\Http\Resources\Fasilitas as FasilitasResource;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = DB::table('fasilitas')
            ->join('olahraga', 'olahraga.id_olahraga', '=', 'fasilitas.id_olahraga')
            ->select('fasilitas.*', 'olahraga.*')
            ->get();
        var_dump($fasilitas);
        return view('admin.fasilitas', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $fasilitas = new Fasilitas();
        $fasilitas->name = $request->name;
        $fasilitas->fasilitas = $request->fasilitas;
        $fasilitas->id_olahraga = $request->id_olahraga;
        $fasilitas->alamat = $request->alamat;
        $fasilitas->kota = $request->kota;

        $image          = $request->file('foto');
        $imageName = time() . "_" . $image->getClientOriginalName();
        $image->move('images/fasilitas/', $imageName);
        $fasilitas->foto = $imageName;
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

        if (empty($request->foto)) {
            $fasilitas->foto = $fasilitas->foto;
        } else {
            unlink('images/fasilitas/', $fasilitas->foto);
            $file = $request->file('foto');
            $imageName = time() . "_" . $file->getClientOriginalName();
            $file->move('images/fasilitas/', $imageName);
            $fasilitas->foto = $name_file;
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
