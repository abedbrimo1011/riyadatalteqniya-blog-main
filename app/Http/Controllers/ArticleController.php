<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Author; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    // to display all articles through a certain form
    public function index()
    {
        
        $articles = Article::with(['category', 'author'])->latest()->paginate(10); 
        return view('articles.index', compact('articles'));
    }

    // عرض فورم إنشاء مقال جديد
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('articles.create', compact('categories','authors'));
    }

    // عرض مقال واحد
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
            'image' => 'nullable|image|max:2048',
            'owner_bio' => 'nullable|string|max:500',
            'author_id' => 'required|exists:authors,id',
        ]);

        $data = $request->all();
        $data['author_id'] = Auth::id(); // ربط المقال بالمؤلف المسجل

        // إذا تم رفع صورة
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route('articles.index')
                         ->with('success', 'تمت إضافة المقال بنجاح');
    }

    // عرض فورم تعديل المقال
    public function edit(Article $article)
    {
        $categories = Category::all();
        $authors = Author::all();

        return view('articles.edit', compact('article', 'categories','authors'));
    }

    // تحديث بيانات المقال
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'owner_bio' => 'nullable|string|max:500',
            'author_id' => 'required|exists:authors,id', 
        ]);

        $data = $request->all();

        // إذا تم رفع صورة جديدة
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        // تحديث المقال باستخدام author_id
        $article->update($data);

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
