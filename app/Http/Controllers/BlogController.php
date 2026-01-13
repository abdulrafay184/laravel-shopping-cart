<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    // ------------------ Public ------------------

    // List all blogs
    public function index()
    {
        $blogs = Blog::latest()->paginate(6); // 6 per page
        return view('Blog.index', compact('blogs'));
    }

    // Show single blog post
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('Blog.show', compact('blog'));
    }

    // ------------------ Admin ------------------

    // Admin list all blogs
    public function adminIndex()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('Admin.blogs.index', compact('blogs'));
    }

    // Show create form
    public function create()
    {
        return view('Admin.blogs.create');
    }

    // Store new blog
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:blogs,slug',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        $data = $request->only('title', 'slug', 'content');

        // Image upload
        if ($request->hasFile('image')) {
            $filename = time().'_'.$request->image->getClientOriginalName();
            $request->image->storeAs('public/blog', $filename);
            $data['image'] = $filename;
        }

        Blog::create($data);

        return redirect()->route('admin.blogs')->with('success', 'Blog post created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('Admin.blogs.edit', compact('blog'));
    }

    // Update blog
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:blogs,slug,'.$blog->id,
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
        ]);

        $data = $request->only('title', 'slug', 'content');

        // Image upload
        if ($request->hasFile('image')) {
            $filename = time().'_'.$request->image->getClientOriginalName();
            $request->image->storeAs('public/blog', $filename);
            $data['image'] = $filename;
        }

        $blog->update($data);

        return redirect()->route('admin.blogs')->with('success', 'Blog post updated successfully!');
    }

    // Delete blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blogs')->with('success', 'Blog post deleted successfully!');
    }
}
