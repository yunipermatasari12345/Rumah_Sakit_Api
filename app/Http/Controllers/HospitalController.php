<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function index()
    {
        return response()->json(Hospital::all());
    }

    public function show($id)
    {
        $hospital = Hospital::find($id);
        if (!$hospital) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json($hospital);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'tipe' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $hospital = Hospital::create($request->all());
        return response()->json($hospital, 201);
    }

    public function update(Request $request, $id)
    {
        $hospital = Hospital::find($id);
        if (!$hospital) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $hospital->update($request->all());
        return response()->json($hospital);
    }

    public function destroy($id)
    {
        $hospital = Hospital::find($id);
        if (!$hospital) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $hospital->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
