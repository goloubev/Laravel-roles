<?php

namespace App\Http\Controllers;

use App\Filters\PostFilter;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    public function index(PostFilter $request): View
    {
        $categories = Category::all()->sortBy('title');
        $posts = Post::filter($request)->orderBy('created_at', 'desc')->paginate(4)->withQueryString();

        return view('dashboard', [
            'categories' => $categories,
            'posts' => $posts,
        ]);
    }

    public function create(): View
    {
        $categories = Category::all()->sortBy('title');

        return view('posts.add-post', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|min:1|max:250',
            'text' => 'required|string|min:1',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        Post::create($data);

        return redirect()->route('dashboard')->with('success', 'Added with success!');
    }

    public function edit(Post $post): View
    {
        $categories = Category::all()->sortBy('title');

        return view('posts.edit-post', [
            'categories' => $categories,
            'post' => $post,
        ]);
    }

    public function update(Post $post, Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|string|min:1|max:250',
            'text' => 'required|string|min:1',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        $post->update($data);

        return redirect()->route('dashboard')->with('success', 'Updated with success!');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Deleted with success!');
    }
}
