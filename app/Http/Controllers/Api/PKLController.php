<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PKL;
use Illuminate\Http\Request;

class PKLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PKL::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'industri_id' => 'required|exists:industri,id',
            'guru_id' => 'required|exists:guru,id',
            'mulai' => 'required|date',
            'selesai' => 'nullable|date|after_or_equal:mulai',  // Optional field, ensures selesai is after mulai if provided.
        ]);

        $pkl = PKL::create([
            'siswa_id' => $request->siswa_id,
            'industri_id' => $request->industri_id,
            'guru_id' => $request->guru_id,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
        ]);

        return response()->json([
            'message' => 'Data PKL berhasil disimpan',
            'pkl' => $pkl,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pkl = PKL::with('siswa', 'guru', 'industri')->find($id);

        if (!$pkl) {
            return response()->json(['message' => 'Data PKL tidak ditemukan'], 404);
        }

        return response()->json([
            'pkl' => $pkl,
            'siswa_id' => $pkl->siswa ? $pkl->siswa->nama : null,
            'industri_id' => $pkl->industri ? $pkl->industri->nama : null,
            'guru_id' => $pkl->guru ? $pkl->guru->nama : null,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pkl = PKL::find($id);

        if (!$pkl) {
            return response()->json(['message' => 'Data PKL tidak ditemukan'], 404);
        }

        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'industri_id' => 'required|exists:industri,id',
            'guru_id' => 'required|exists:guru,id',
            'mulai' => 'required|date',
            'selesai' => 'nullable|date|after_or_equal:mulai',  // Optional field, ensures selesai is after mulai if provided.
        ]);

        $pkl->update([
            'siswa_id' => $request->siswa_id,
            'industri_id' => $request->industri_id,
            'guru_id' => $request->guru_id,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
        ]);

        $pkl->load('siswa', 'guru', 'industri');

        return response()->json([
            'message' => 'Data PKL berhasil diperbarui',
            'pkl' => $pkl,
            'siswa_id' => $pkl->siswa ? $pkl->siswa->nama : null,
            'industri_id' => $pkl->industri ? $pkl->industri->nama : null,
            'guru_id' => $pkl->guru ? $pkl->guru->nama : null,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pkl = PKL::find($id);

        if (!$pkl) {
            return response()->json(['message' => 'Data PKL tidak ditemukan'], 404);
        }

        $pkl->delete();

        return response()->json(['message' => 'Data PKL berhasil dihapus']);
    }
}