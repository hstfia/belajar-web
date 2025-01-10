<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use function Laravel\Prompts\info;

class PenggunaController extends Controller
{
    function index(){
        $data['list'] = Pengguna::get();
        return view('admin.data-pengguna.index', $data);
    }


    function create(){
        return view('admin.data-pengguna.create');
    }

    public function store(Request $request)
    {
        $request->validate(Pengguna::$field, Pengguna::$message);

        $pengguna = new Pengguna;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt($request->nik_kk);
        $pengguna->nama_kk = $request->nama_kk;
        $pengguna->nik_kk = $request->nik_kk;
        $pengguna->tlp_kk = $request->tlp_kk;
        $pengguna->lat_kk = $request->lat_kk;
        $pengguna->lng_kk = $request->lng_kk;
        $pengguna->alamat_kk = $request->alamat_kk;
        $pengguna->foto_kk = Pengguna::handleUpload($request->foto_kk);
        $simpan = $pengguna->save();

        if ($simpan) {
            return redirect('admin/pengguna')->with('success', 'Data berhasil ditambahkan!');
        }
        return back()->with('danger', 'Data gagal ditambahkan!');
    }


    function edit(Pengguna $pengguna) {
        $data['list']= $pengguna;
        // return $data;
        return view('admin.data-pengguna.edit', $data);
    }

    function update(Pengguna $pengguna) {

        $pengguna->email = request('email');
        $pengguna->nama_kk = request('nama_kk');
        $pengguna->nik_kk = request('nik_kk');
        $pengguna->tlp_kk = request('tlp_kk');
        $pengguna->lat_kk = request('lat_kk');
        $pengguna->alamat_kk = request('alamat_kk');
        $pengguna->foto_kk = "-";
        $pengguna->save();
        return redirect('admin/pengguna');
    }


    function detail(Pengguna $pengguna){
        $data['list'] = $pengguna;
        return view('admin.data-pengguna.detail', $data);
    }

    function destroy(Pengguna $pengguna) {

        $pengguna->delete();
        return back();
    }
}
