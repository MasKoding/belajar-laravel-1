<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesRequest;
use App\Models\Articles;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{

    //
    public function index(){
        $title = 'Blog Post';
        // $title = ["title"=>"Blog Post"]
        $articles =  Articles::latest()->paginate(5);
        return view('blog.index',compact('title','articles'));
    }

    public function store(ArticlesRequest $request)
    {
        // Handle upload gambar jika ada
        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('image', 'public');
        }

        // Simpan data artikel ke database
        Articles::create([
            'title' => $request->input('title'),
            'slug'=>$request->input('title'),
            'cover_image' => $coverImagePath,
            'description' => $request->input('description'),
            'keyword' => $request->input('keyword'),
            'created_by' => 'admin',
            'updated_by'=>'',
            'is_published'=>1
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Artikel berhasil dibuat!');
    }
}
