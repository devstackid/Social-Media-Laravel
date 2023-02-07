<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
class PostController extends Controller
{
    public function index()
    {
        return view('home', [
            'title' => 'Home',
            // Jangan Lupa N+1 Problems Disini Woy!
            'posts' => Post::with('user')->withCount('comments')->latest()->get(),
            'users' => User::latest()->get(),
            'postingan' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Postingan',
            'post' => $post,
            'comments' => $post->comments()->with('user', 'childs')->latest()->get(),
            'users' => User::latest()->get(),
            'postingan' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function postkomentar(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        $komentar = Comment::create($request->all());
        return redirect()->back()->with('success', 'Berhasil menambahkan komentar!');
    }

    public function showProfileFromPost(Post $post, User $user)
    {
        return view('seeprofile', [
            'title' => 'Lihat Profile',
            'user' => $user,
            'users' => User::latest()->get(),
            'postingan' => Post::where('user_id', $user->id)->get()
        ]);
    }
}
