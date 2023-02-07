<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateProfileController extends Controller
{
    public function edit()
    {
        return view('users.edit', [
            'title' => 'Edit Profile',
            'users' => User::latest()->get(),
            'postingan' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function update(Request $request)
    {
        $rules = [
            'nama' => 'nullable|min:4|max:50',
            'bio' => 'nullable|max:50',
            'image' => 'nullable|image|file|max:1024'
        ];

        if($request->username != auth()->user()->username){
            $rules['username'] = 'required|unique|users';
        }
        $validateData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('product-images');
        }
        
        auth()->user()->update($validateData);

        // return back()->with('message', 'Your Profile Berhasil Di update');

        return redirect('/home')->with('success', 'Profile Updated');
    }

    public function destroy(Post $post)
    {
        
    }
}
