<?php

namespace App\Http\Controllers;

use App\DataRegister;
use App\MasterInstitusi;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('pendaftaran.index');
    }

    public function home($id)
    {
        $data = DataRegister::with('institusi')->find($id); 
        return view('pendaftaran.home', compact('data'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $tanggalLahir = explode("/",$request->tanggal_lahir);

        $input = [
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $tanggalLahir[2].'-'.$tanggalLahir[1].'-'.$tanggalLahir[0],
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'kategori_pendaftar_id' => $request->kategori_pendaftar == 'm' ? 2 : 1,
        ];

        if (isset($request->universitas_baru)) {
            $newInstitusi = MasterInstitusi::create([
                'nama' => strtoupper($request->universitas_baru),
                'kategori_institusi_id' => 2
            ]);
            $input['master_institusi_id'] = $newInstitusi->id;
        }

        if (isset($request->sekolah_baru)) {
            $newInstitusi = MasterInstitusi::create([
                'nama' => strtoupper($request->sekolah_baru),
                'kategori_institusi_id' => 1
            ]);
            $input['master_institusi_id'] = $newInstitusi->id;
        }

        if (empty($request->universitas_baru) && empty($request->sekolah_baru)) {
           $input['master_institusi_id'] = $request->institusi;
        }

        // return $input;
        $data = DataRegister::create($input);

        return redirect()->route('pendaftaran.home', ['id' => $data->id]);
    }

    public function get_data_sekolah()
    {
        $data = MasterInstitusi::where('kategori_institusi_id', 1)->get();
        if (empty($data)) {
            $data = [];
        }
        return response()->json($data, 200);
    }

    public function get_data_universitas()
    {
        $data = MasterInstitusi::where('kategori_institusi_id', 2)->get();
        if (empty($data)) {
            $data = [];
        }
        return response()->json($data, 200);
    }
}
