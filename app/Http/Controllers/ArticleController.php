<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller
{
    // عرض كل المقالات
    public function index()
    {
        $articles = Article::with(['category', 'user'])->latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }
    

    // عرض فورم إنشاء مقال جديد
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    // عرض مقال واحد
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // حفظ المقال في قاعدة البيانات
    public function store(Request $request)
    {
        // dd(Auth::id());

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'owner_bio' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        // $data['user_id'] = auth()->id(); // ربط المقال بالمستخدم المسجل
        $data['user_id'] = Auth::id();
      
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
        return view('articles.edit', compact('article', 'categories'));
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
        ]);

        $data = $request->all();

        // إذا تم رفع صورة جديدة
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

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
