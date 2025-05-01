<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserRole;

class ArticleController extends Controller
{
    // عرض كل المقالات
    public function index()
    {
        $articles = Article::with(['category', 'author'])->latest()->paginate(10); 
        return view('articles.index', compact('articles'));
    }

    // فورم إنشاء مقال
    public function create()
    {
        $categories = Category::all();
        $authors = User::where('role', UserRole::AUTHOR)->get(); // المؤلفين فقط
        return view('articles.create', compact('categories', 'authors'));
    }

    // عرض مقال واحد
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // حفظ المقال الجديد
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'author_bio' => 'nullable|string|max:500',
        ]);
        
        $data = $request->only(['title', 'body', 'category_id', 'image', 'author_bio']);
        $userId = auth()->id();
        $data['author_id'] = $userId; 
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }
        
        Article::create($data);
        
        return redirect()->route('articles.index')
                         ->with('success', 'تمت إضافة المقال بنجاح');
         }

    // فورم تعديل مقال
    public function edit(Article $article)
    {
        $categories = Category::all();
        $authors = User::where('role', UserRole::AUTHOR)->get(); // المؤلفين فقط

        return view('articles.edit', compact('article', 'categories', 'authors'));
    }

    // تعديل مقال
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
            'author_bio' => 'nullable|string|max:500',
        ]);
        
        $data = $request->only(['title', 'body', 'category_id', 'image', 'author_bio']);
       $userId = auth()->id();
        $data['author_id'] = $userId; 
        
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
