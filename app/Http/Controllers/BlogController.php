<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // ================== PUBLIC ==================

    // All blogs
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('blog.index', compact('blogs'));
    }

    // Single blog details
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog.details', compact('blog'));
    }

    // ================== ADMIN ==================

    public function adminIndex()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function stores(Request $req)
    {
        $data = $req->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $file = $req->file('image')->store('blogs', 'public');

        Blog::create([
            'title' => $data['title'],
            'slug' => $data['slug'],
            'content' => $data['content'],
            'image' => basename($file),
        ]);

        return redirect()->route('admin.blogs')->with('success', 'Blog added');
    }
}
