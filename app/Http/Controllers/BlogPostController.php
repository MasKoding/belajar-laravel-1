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
        $articles = Articles::where('is_published',true)->latest()->paginate(5);
        return view('blog.index',compact('title','articles'));
    }

    public function store(Request $request)
    {

        //  dd($request);
        // Handle upload gambar jika ada
        $coverImagePath = null;
        if ($request->hasFile('cover_image')) {
            //  store (directory_image,directory_public)
            $coverImagePath = $request->file('cover_image')
            ->store('image', 'public');
        }

        // Simpan data artikel ke database
       $article =  Articles::create([
            'title' => $request->input('title'),
            'slug'=>$request->input('slug'),
            'cover_image' => $coverImagePath,
            'description' => $request->input('description'),
            'keyword' => $request->input('keyword'),
            'created_by' => 'admin',
            'updated_by'=>'',
            'is_published'=>1
        ]);
        if($article){
            return redirect()->back()->with('success', 'Artikel berhasil dibuat!');
        }else{
            return redirect()->back()->with('error', 'Artikel gagal dibuat!');
        }
        // Redirect dengan pesan sukses

    }

    public function search($search)
    {
        $title = 'Blog Post';
        // select * from blogpost where title  like '%Digniss%'
       // where => pencarian single field hanya satu kriteria
       // whereAny => pencarian lebih dari satu difield multivalue field kriteria
       // pakai array, query like , value
        $articles = Articles::
        where('is_published', true)
        ->whereAny([
            'title',
            'description'
        ], 'like', "%$search%")->latest()->paginate(10);
        $searchValue = $search;
        return view('blog.index', compact('title', 'articles','searchValue'));
    }
}
