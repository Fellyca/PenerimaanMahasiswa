<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(){
        return view('Auth.signup'); //create
    }
    public function store(Request $request){
        $validated = $request->validate([
            'email' => 'required|email|unique:user',
            'password' => 'required|min:6'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        // dd($request);
        User::create($validated);
        return redirect('/wait');
    }

    public function show() {
        $title = "pendaftaran";
        $users = User::where('role', 'mhs')->orderBy('created_at', 'asc')->get();
        
        return view('updateakun', compact('title', 'users'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:user,id',
            'status' => 'required|in:Diterima,Ditolak'
        ]);

        $user = User::find($request->input('user_id'));
        $user->is_accepted = $request->input('status') === 'Diterima';
        $user->save();

        return redirect()->back()->with('success', 'Status pengguna berhasil diperbarui!');
    }
}
