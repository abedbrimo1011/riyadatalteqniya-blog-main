<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'body',
        'category_id',
    ];
    public function category()
{
    return $this->belongsTo(Category::class);
}
public function author()
{
    return $this->belongsTo(Author::class);
}


}
