<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
 use   HasFactory;
    protected $fillable = [
        'title', 'body', 'category_id', 'author_id', 'image', 'owner_bio'
    ];
    public function category()
{
    return $this->belongsTo(Category::class);
}
// Article.php
public function author()
{
    return $this->belongsTo(Author::class, 'author_id');
}


}
