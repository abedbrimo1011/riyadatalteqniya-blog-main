<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // عرض كل التصنيفات
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // عرض فورم الإضافة
    public function create()
    {
        return view('categories.create');
    }

    // تخزين تصنيف جديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'تم إضافة التصنيف بنجاح');
    }

    // عرض تصنيف محدد
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // عرض فورم التعديل
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // تحديث التصنيف
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'تم تحديث التصنيف');
    }

    // حذف تصنيف
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'تم حذف التصنيف');
    }
}
