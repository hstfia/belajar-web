<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    function index(){
        $data['list'] = Alat::get();
        return view('admin.data-alat.index', $data);
    }
}
