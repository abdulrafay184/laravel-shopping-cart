<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

    function destroy($id){

    $result=Blog::destroy($id);
    if($result){
        return redirect()->route('admin.blogs')->with('success','Data is deleted...');
    }
    else{
        return redirect()->route('admin.blogs');
    }
}

public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('Admin.blogs.edit', compact('blog'));
    }

    // ======================
    // UPDATE USER (ADMIN)
    // ======================
    public function update(Request $req, $id)
    {

        $blog=Blog::find($id);
        $blog->title=$req['title'];
        $blog->slug=$req['slug'];
        $blog->content=$req['content'];
        if($req->hasfile('image')){
            $old=Storage_path('app/public/blogs', $blog->image);

            if(File::exists($old)){
                File::delete($old);
            }

            $file = $req->file('image')->store('blogs', 'public');
            $newimg=basename($file);
            $blog->image=$newimg;
            $blog->save();
        }

        return redirect()->route('admin.blogs')
                         ->with('success', 'User Updated Successfully');
    }

    


}
