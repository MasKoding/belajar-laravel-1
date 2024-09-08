<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    //
    public function index(){
        $title = 'Blog Post';
        return view('blog.index',compact('title'));
    }
}
