<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // ================== PUBLIC ==================

    // All blogs
    public function index()
    {
        $blogs = Blog::latest()->paginate(6);
        return view('Blog.index', compact('blogs'));
    }

    // Single blog
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('Blog.show', compact('blog'));
    }

    // ================== ADMIN ==================

    // Admin blog list
    public function adminIndex()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('Admin.blogs.index', compact('blogs'));
    }

    // Create form
    public function create()
    {
        return view('Admin.blogs.create');
    }


public function stores(Request $req){
        $data = $req->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required',
            
            'image' => 'required|image|mimes:jpg,jpeg,png,gif',
        ]);

        // Upload image
        $file = $req->file('image')->store("blogs", "public");
        $path = basename($file);

        $blog = new Blog();
        
        $blog->title = $data['title'];
        $blog->slug=$data['slug'];
        $blog->content = $data['content'];
    
        $blog->image = $path;
        $blog->save();

        return redirect()->route('admin.blogs')->with('success', 'Blog inserted success');
    }



//     // Store blog
//     public function store(Request $request)
//     {
//         $request->validate([
//             'title'   => 'required|string|max:255',
//             'slug'    => 'required|string|unique:blogs,slug',
//             'content' => 'required|string',
//             'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
//         ]);

//         $data = $request->only('title', 'slug', 'content');

//         if ($request->hasFile('image')) {
//             $filename = time().'_'.$request->image->getClientOriginalName();
//             $request->image->storeAs('blog', $filename, 'public');
//             $data['image'] = $filename;
//         }

//         Blog::create($data);

//         return redirect()
//             ->route('admin.blogs')
//             ->with('success', 'Blog created successfully');
//     }

//     // Edit form
//     public function edit($id)
//     {
//         $blog = Blog::findOrFail($id);
//         return view('Admin.blogs.edit', compact('blog'));
//     }

//     // Update blog
//     public function update(Request $request, $id)
//     {
//         $blog = Blog::findOrFail($id);

//         $request->validate([
//             'title'   => 'required|string|max:255',
//             'slug'    => 'required|string|unique:blogs,slug,' . $blog->id,
//             'content' => 'required|string',
//             'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:2048',
//         ]);

//         $data = $request->only('title', 'slug', 'content');

//         if ($request->hasFile('image')) {

//             // delete old image
//             if ($blog->image && Storage::disk('public')->exists('blog/'.$blog->image)) {
//                 Storage::disk('public')->delete('blog/'.$blog->image);
//             }

//             $filename = time().'_'.$request->image->getClientOriginalName();
//             $request->image->storeAs('blog', $filename, 'public');
//             $data['image'] = $filename;
//         }

//         $blog->update($data);

//         return redirect()
//             ->route('admin.blogs')
//             ->with('success', 'Blog updated successfully');
//     }

//     // Delete blog
//     public function destroy($id)
//     {
//         $blog = Blog::findOrFail($id);

//         if ($blog->image && Storage::disk('public')->exists('blog/'.$blog->image)) {
//             Storage::disk('public')->delete('blog/'.$blog->image);
//         }

//         $blog->delete();

//         return redirect()
//             ->route('admin.blogs')
//             ->with('success', 'Blog deleted successfully');
//     }
 }
