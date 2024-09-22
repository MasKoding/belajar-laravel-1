<?php

use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;


// anonymous function  =function yang tidak memiliki nama
// closure return nilai

Route::get('/', function () {
    return redirect('/blog/index');
});


Route::get('blog/index',[BlogPostController::class,'index'])->name('blog.index');
Route::post('/blog/store', [BlogPostController::class, 'store'])->name('blog.store');
