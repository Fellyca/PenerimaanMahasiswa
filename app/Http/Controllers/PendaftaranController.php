<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PendaftaranController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'nama' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:L,P',
                'tanggal_lahir' => 'required|date',
                'agama' => 'required|string',
                'alamat' => 'required|string|max:150',
                'no_hp' => 'required|string',
                'program_studi' => 'required|in:SI,M,IF',
                'jalur_masuk' => 'required|in:SNBT,UTBK,Mandiri',
                'foto' => 'required|image|max:2048', // Ubah required menjadi nullable jika tidak selalu ada
            ]);

            // Proses upload file foto
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoPath = $foto->store('foto', 'public'); // Simpan file ke storage/app/public/foto
                $validatedData['foto'] = $fotoPath;
            }

            // Log data yang akan disimpan
            Log::info('Data yang akan disimpan:', $validatedData);

            // Simpan data ke database
            Pendaftaran::create([
                'nama' => $validatedData['nama'],
                'jenis_kelamin' => $validatedData['jenis_kelamin'],
                'tanggal_lahir' => $validatedData['tanggal_lahir'],
                'agama' => $validatedData['agama'],
                'alamat' => $validatedData['alamat'],
                'no_hp' => $validatedData['no_hp'],
                'program_studi' => $validatedData['program_studi'],
                'jalur_masuk' => $validatedData['jalur_masuk'],
                'foto' => $validatedData['foto'], // Gunakan path jika ada, atau null jika tidak ada file
                'status' => 'diproses', // Atur sesuai kebutuhan
                'id_user' => auth()->id(), // Jika autentikasi diaktifkan
            ]);

            // Log sukses
            Log::info('Data berhasil disimpan ke database.');

            // Redirect dengan pesan sukses
            return redirect('/akun')->with('success', 'Pendaftaran berhasil!');
        } catch (\Exception $e) {
            // Log error
            // Log::error('Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
            // dd($e->getMessage());
            // Redirect dengan pesan error
            // return redirect('/Pendaftaran/akun')->with('error', 'Pendaftaran gagal: ' . $e->getMessage());
        }
    }
    public function show()
    {
        // Ambil data mahasiswa dari database
        $mahasiswa = Pendaftaran::where('id_user', auth()->id())->first(); // Misalnya ambil data mahasiswa berdasarkan id_user yang login

        // Kirim data ke view
        $title = "akun";
        return view('Pendaftaran/akun', compact(['mahasiswa', 'title']));
    }
    public function create(){
        
        return view('Pengumuman/pengumuman'); //create
    }
}

