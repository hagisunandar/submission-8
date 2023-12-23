<?php

namespace App\Http\Controllers;
use App\Models\Guestbook;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index() {

        $student = Guestbook::all();
        return response()->json([
			'student' => $student
			]);
    }

    public function show($id){

        $mahasiswa = Guestbook::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Data diri tidak ditemukan',
            ], 210);}
            return response()->json(['data' => $mahasiswa]);
    }

    public function store(Request $request){

        $mahasiswa = Guestbook::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'nomor_wa' => $request->input('nomor_wa')
        ]);

        return response()->json([
            'message' => 'Data diri berhasil dibuat',
            'student' => $mahasiswa
        ], 210);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Guestbook::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Data diri tidak ditemukan'
            ], 404);
        }

        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->nomor_wa = $request->input('nomor_wa');
        $mahasiswa->save();

        return response()->json([
            'message' => 'Mahasiswa berhasil diperbarui',
            'student' => $mahasiswa
        ], 200);
    }

    public function destroy($id)
    {
        $mahasiswa = Guestbook::find($id);
        $mahasiswa->delete();

        return response()->json([
            'message' => 'Mahasiswa berhasil dihapus'
        ], 200);
    }
}
