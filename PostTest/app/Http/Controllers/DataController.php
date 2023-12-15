<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{

    public function show()
    {
        return view('home');
    }
    public function submitData(Request $request)
    {
        $data = [
            'NIK' => $request->input('NIK'),
            'Nama' => $request->input('Nama'),
            'Provinsi' => $request->input('Provinsi'),
            'Kota' => $request->input('Kota'),
            'Nomor' => $request->input('Nomor'),
        ];

        return view('dashboardAdmin', $data);
    }
}
