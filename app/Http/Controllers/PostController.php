<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('dashboard', [
            'posts' => $posts
        ]);
    }

    public function create(): View
    {
        return view('add-new-post');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:250',
            'text' => 'required|string|min:3',
        ]);

        Post::create($data);

        return redirect()->route('dashboard')->with('success', 'Added with success!');
    }

    public function edit(Post $post): View
    {
        return view('edit-post', [
            'post' => $post,
        ]);
    }

    public function update(Post $post, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:250',
            'text' => 'required|string|min:3',
        ]);

        $post->update($data);

        return redirect()->route('dashboard')->with('success', 'Updated with success!');
    }

    public function delete(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Deleted with success!');
    }
}
