<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $table = 'articles';
    // definisi  kolom di tabel 
    protected $fillable = ['title', 'slug', 'keyword', 'description',
     'cover_image', 'created_by', 'updated_by', 'is_published'];
}
