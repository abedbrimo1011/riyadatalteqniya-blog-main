<?php

namespace Database\Seeders;
use App\Models\Article;
use App\Models\User;
use App\Models\Category;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // التأكد من وجود بيانات في الـ DB، إذا كانت فارغة يتم إضافتها.
        $user = User::first() ?? User::create([
            'name' => 'مستخدم تجريبي',
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ]);
        $category = Category::first() ?? Category::create([
            'name' => 'التقنية'
        ]);
    
        Article::create([
            'title' => 'مقال تجريبي',
            'body' => 'هذا محتوى المقال',
            'category_id' => $category->id,
            'user_id' => $user->id,
            'image' => 'default.jpg',
            'owner_bio' => 'نبذة عن الكاتب: مطور ومهتم بالتقنية',
        ]);
    }
}
