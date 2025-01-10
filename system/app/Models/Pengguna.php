<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = "tb_pengguna";
    protected $fillable  = [
       'email', 'password',  'nama_kk', 'nik_kk', 'tlp_kk','lat_kk','lng_kk', 'alamat_kk', 'foto_kk'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    static $field = [
        'email' => 'required',
        'nama_kk' => 'required',
        'nik_kk' => 'required',
        'tlp_kk' => 'required',
        'lat_kk' => 'required',
        'lng_kk' => 'required',
        'alamat_kk' => 'required',
        'foto_kk' => 'required',
    ];

    static $message = [
        'email.required' => 'Inputan tidak boleh kosong !',
        'nama_kk.required' => 'Inputan tidak boleh kosong !',
        'nik_kk.required' => 'Inputan tidak boleh kosong !',
        'tlp_kk.required' => 'Inputan tidak boleh kosong !',
        'lat_kk.required' => 'Inputan tidak boleh kosong !',
        'lng_kk.required' => 'Inputan tidak boleh kosong !',
        'alamat_kk.required' => 'Inputan tidak boleh kosong !',
        'foto_kk.required' => 'Inputan tidak boleh kosong !',
    ];

    public static function handleUpload($file){
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $tmp = $file->move('public/assets/img/fotopengguna/', $fileName);
        return $tmp;
    }

}
