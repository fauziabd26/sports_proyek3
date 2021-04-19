<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Fasilitas;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = \App\Fasilitas::all();
        return view('admin.fasilitas', ['fasilitas' => $fasilitas]);
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
        $file = $request->file('file');
        $new_name = rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('file'), $new_name);

        $fasilitas= array(
            'id'        =>$request->id,
            'name'      =>$request->name,
            'fasilitas' =>$request->fasilitas,
            'kategori'  =>$request->kategori,
            'alamat'    =>$request->alamat,
            'kota'      =>$request->kota,
            'file'      =>$new_name,
        );
        Fasilitas::create($fasilitas);
        return redirect('/fasilitas')->with('sukses', 'Data Fasilitas Berhasil Ditambahkan');
    }

    public function show()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.showfasilitas', compact('obat'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('file');
        if($request->hasFile('file'))
        {
            $new_name = rand().'.'.$foto->getClientOriginalExtension();
            $file->move(public_path('file'), $new_name);
            $fasilitas = array(
                'name'      =>$request->name,
                'fasilitas' =>$request->fasilitas,
                'kategori'  =>$request->kategori,
                'alamat'    =>$request->alamat,
                'kota'      =>$request->kota,
                'file'      =>$new_name,
            );
            Fasilitas::whereId($id)->update($fasilitas);
            return redirect('/fasilitas');
        }else {
            $fasilitas = array(
                'name'      =>$request->name,
                'fasilitas' =>$request->fasilitas,
                'kategori'  =>$request->kategori,
                'alamat'    =>$request->alamat,
                'kota'      =>$request->kota,
            );
            Fasilitas::whereId($id)->update($fasilitas);
            return redirect('/fasilitas');
        }
    }
    public function destroy($id)
    {
        try {
            DB::table('fasilitas')->where('id', $id)->delete();
            return redirect('/fasilitas')->with('success', 'Paket Berhasil Dihapus');
        } catch (\Throwable $th) {
            return redirect('/fasilitas')->withErrors('Data gagal Dihapus');
        }
    }
}
