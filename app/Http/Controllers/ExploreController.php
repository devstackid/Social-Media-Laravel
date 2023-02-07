<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    //
    public function index()
    {
        return view('explore' , [
            'title' => 'Explore',
            'posts' => Post::latest()->get(),
            'users' => User::latest()->get(),
            'accounts' => User::latest()->filter()->get(),
            'postingan' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function chat()
    {
        return view('chat', [
            'title' => 'Chats',
            'users' => User::latest()->get(),
            'postingan' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function notification()
    {
        return view('notification', [
            'title' => 'Notifications',
            'users' => User::latest()->get(),
            'postingan' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }
        
}
