<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // عرض كل المقالات
    public function index()
    {
        $articles = Article::with('category')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    // عرض فورم إنشاء مقال جديد
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('articles.create', compact('categories', 'authors'));
    }
    public function show(Article $article)
{
    return view('articles.show', compact('article'));
}


    // حفظ المقال في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
        ]);
        

        Article::create($request->all());

        return redirect()->route('articles.index')
                         ->with('success', 'تمت إضافة المقال بنجاح');
    }

    // عرض فورم تعديل المقال
    public function edit(Article $article)
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('articles.edit', compact('article', 'categories', 'authors'));
    }

    // تحديث بيانات المقال
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
        ]);
        
        $article->update($request->all());

        return redirect()->route('articles.index')
                         ->with('success', 'تم تعديل المقال بنجاح');
    }

    // حذف مقال
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index')
                         ->with('success', 'تم حذف المقال');
    }
}
