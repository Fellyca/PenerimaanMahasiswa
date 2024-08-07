<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengumumanController extends Controller
{
    public function create(){
        return view('Pengumuman/pengumuman'); //create
    }
    public function store(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:150',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses upload file
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailPath = $thumbnail->store('thumbnails', 'public'); // Simpan file ke storage/app/public/thumbnails
            $validatedData['thumbnail'] = $thumbnailPath;
        }

        // Simpan data ke database
        Pengumuman::create($validatedData);

        return redirect('/')->with('success', 'Pengumuman berhasil disimpan!');
    }
    public function index(){
        // Ambil semua pengumuman dari database
        $title = "home";
        $pengumumans = Pengumuman::orderBy('created_at', 'desc')->get();
        return view('Pengumuman/home', compact(['pengumumans', 'title']));
    }

    public function index2(){
        
        $pengumumans = Pengumuman::orderBy('created_at', 'desc')->get();
        return view('Pengumuman/rumah', compact('pengumumans'));
    }

    public function edit($id){
        $pengumuman = Pengumuman::find($id); //dpt kondisi where
        return view('Pengumuman/edit', compact('pengumuman'));
    }
    public function update($id, Request $request){
        // Temukan pengumuman berdasarkan ID
        $pengumuman = Pengumuman::findOrFail($id);
    
        // Validasi data input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:150',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk file gambar
        ]);
    
        // Update data lainnya
        $pengumuman->judul = $request->input('judul');
        $pengumuman->deskripsi = $request->input('deskripsi');
    
        // Jika ada file thumbnail yang diunggah
        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama jika ada
            if ($pengumuman->thumbnail) {
                Storage::delete($pengumuman->thumbnail); // Hapus gambar lama dari storage
            }
    
            // Simpan gambar baru
            $file = $request->file('thumbnail');
            $filename = time() . '-' . $file->getClientOriginalName();
            $filePath = $file->storeAs('thumbnails', $filename, 'public'); // Simpan file ke storage/app/public/thumbnails
    
            // Update path gambar di database
            $pengumuman->thumbnail = $filePath;
        }
    
        // Simpan perubahan ke database
        $pengumuman->save();
    
        // Redirect atau return response
        return redirect('/')->with('success', 'Pengumuman berhasil diperbarui!');
    }
    public function destroy($id)
    {
        // Temukan pengumuman berdasarkan ID
        $pengumuman = Pengumuman::findOrFail($id);

        // Hapus file gambar jika ada
        if ($pengumuman->thumbnail) {
            Storage::delete($pengumuman->thumbnail); // Hapus gambar dari storage
        }

        // Hapus pengumuman dari database
        $pengumuman->delete();

        // Redirect atau return response
        return redirect('/')->with('success', 'Pengumuman berhasil dihapus!');
    }
}