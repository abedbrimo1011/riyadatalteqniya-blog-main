<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Category;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'body', 
        'category_id', 
        'author_id', 
        'image', 
        'author_bio',
    ];

    /**
     * Get the category that the article belongs to.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author (user) that wrote the article.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
