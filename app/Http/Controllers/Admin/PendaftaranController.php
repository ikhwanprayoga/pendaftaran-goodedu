<?php

namespace App\Http\Controllers\Admin;

use App\DataRegister;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        $datas = DataRegister::get();

        return view('admin.data-pendaftar.index', compact('datas'));
    }
}
