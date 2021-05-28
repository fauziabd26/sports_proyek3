<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sports;
use App\Http\Resources\Sports as OlahragaResource;

class SportsController extends Controller
{
    public function index()
    {
        $sports = Sports::all();
        return view('backend.sports.olahraga', ['sports' => $sports]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $olahraga = DB::table('olahraga')
            ->where('name_olahraga', 'like', "%" . $cari . "%")
            ->paginate();
        return view('admin.olahraga', ['olahraga' => $olahraga]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $sports = new Sports();
        $sports->name_sports = $request->name_sports;

        $image          = $request->file('file');
        $imageName = time() . "_" . $image->getClientOriginalName();
        $image->move(public_path('images/olahraga/'), $imageName);
        $sports->image_sports = $imageName;
        $sports->save();
        return redirect('/admin-sports')->with('alert-success', 'Data Berhasil Ditambahkan');
    }

    public function show()
    {
        $sports = Sports::all();
        return view('superadmin.showolahraga', compact('sports'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id_sports)
    {
        $sports = Sports::find($id_sports);

        $sports->name_sports = $request->name_sports;

        if (empty($request->image)) {
            $sports->image_sports = $sports->image_sports;
        } else {
            unlink(public_path('images/olahraga/') . $sports->image_sports);
            $file       = $request->file('image');
            $name_file  = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('images/olahraga/'), $name_file);
            $sports->image_sports = $name_file;
        }
        $sports->save();
        return redirect('/admin-sports')->with('alert-success', 'Data berhasil diubah');
    }
    public function destroy($id_sports)
    {
        try {
            $sports = Sports::find($id_sports);
            $sports->delete();
            return redirect('/olahraga')->with('alert-success', 'Data berhasil dihapus!');
        } catch (\Throwable $th) {
            return redirect('/olahraga')->withErrors('Data gagal Dihapus');
        }
    }
}
