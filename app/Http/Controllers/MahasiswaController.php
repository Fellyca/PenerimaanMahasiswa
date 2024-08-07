<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        $title = "mahasiswa";
        $mahasiswas = Pendaftaran::all();
        
        return view('Pendaftaran.updatestatus', compact('title', 'mahasiswas'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Pendaftaran::findOrFail($id);

        // Validasi dan perbarui status
        $request->validate([
            'status' => 'required|in:diproses,diterima,ditolak',
        ]);

        $mahasiswa->status = $request->input('status');
        $mahasiswa->save();

        return redirect()->back()->with('success', 'Status berhasil diperbarui!');
    }

    public function show($id){
        // Cari mahasiswa berdasarkan ID
        $mahasiswa = Pendaftaran::findOrFail($id);
        $title = "akun";

        // Kirim data mahasiswa ke view
        return view('Pendaftaran.akun', compact(['mahasiswa' , 'title']));
    }

}
