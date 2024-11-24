<?php

use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get("/blog/index",[BlogPostController::class,'index'])
->name('blog.index');

Route::post("/blog/store",[BlogPostController::class,'store'])
->name('blog.store');

Route::get("/blog/search/{title}",[BlogPostController::class,'search'])
->name('blog.search');

Route::get('/', function () {
    return redirect(route('blog.index'));
});
Route::resource("products",ProductController::class);


require __DIR__.'/auth.php';
