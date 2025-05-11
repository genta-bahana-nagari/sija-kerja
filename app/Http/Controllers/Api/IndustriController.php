<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Industri;
use Illuminate\Http\Request;

class IndustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Industri::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_usaha' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:industri,email',
            'guru_pembimbing' => 'required|exists:guru,id',
        ]);

        Industri::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $industri = Industri::with('guru')->find($id);

        if (!$industri) {
            return response()->json(['message' => 'Industri tidak ditemukan'], 404);
        }

        return response()->json([
            'industri' => $industri,
            'guru_pembimbing' => $industri->guru ? $industri->guru->nama : null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $industri = Industri::find($id);

        if (!$industri) {
            return response()->json(['message' => 'Industri tidak ditemukan'], 404);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'bidang_usaha' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'email' => 'required|email|unique:industri,email,' . $id,
            'guru_pembimbing' => 'required|exists:guru,id',
        ]);

        $industri->update($request->all());

        $industri->load('guru');

        return response()->json([
            'message' => 'Data industri berhasil diperbarui',
            'industri' => $industri,
            'guru_pembimbing' => $industri->guru ? $industri->guru->nama : null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $industri = Industri::find($id);

        if (!$industri) {
            return response()->json(['message' => 'Industri tidak ditemukan'], 404);
        }

        $industri->delete();

        return response()->json(['message' => 'Data industri berhasil dihapus']);
    }
}
