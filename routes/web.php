<?php

use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('blog/index',[BlogPostController::class,'index'])->name("blog.index");
