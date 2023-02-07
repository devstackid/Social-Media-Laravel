<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:50|min:3',
            'image' => 'string|max:500|nullable',
            'username' => 'required|min:3|max:18|unique:users',
            'password' => 'required|min:5|max:255'
        ]);


        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Registrasi Berhasil!');

        return redirect('/login');
    }
}