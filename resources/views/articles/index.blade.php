@extends('layouts.app')

@section('title', 'كل المقالات')

@section('content')
<div class="container mx-auto px-4" dir="rtl">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-700">المقالات</h2>
        <a href="{{ route('articles.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            إضافة مقال
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow rounded">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-3 text-right">الصورة</th>
                    <th class="p-3 text-right">العنوان</th>
                    <th class="p-3 text-right">التصنيف</th>
                    <th class="p-3 text-right">النبذة</th>
                    <th class="p-3 text-right">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">
                            @if($article->image)
                                <img src="{{ asset('storage/' . $article->image) }}" alt="صورة" class="w-20 h-20 object-cover rounded">
                            @else
                                <span class="text-gray-400">لا توجد صورة</span>
                            @endif
                        </td>
                        <td class="p-3">
                            <strong>{{ $article->title }}</strong><br>
                            <small class="text-gray-500">بواسطة: {{ $article->user->name ?? 'غير معروف' }}</small>
                        </td>
                        <td class="p-3">
                            {{ $article->category->name ?? '-' }}
                        </td>
                        <td class="p-3">
                            @if($article->owner_bio)
                                <small class="text-gray-700">{{ Str::limit($article->owner_bio, 100) }}</small>
                            @else
                                <span class="text-gray-400">لا توجد نبذة</span>
                            @endif
                        </td>
                        <td class="p-3 space-y-2">
                            <a href="{{ route('articles.edit', $article) }}" class="block text-sm text-yellow-600 hover:underline">تعديل</a>
                            <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                @csrf
                                @method('DELETE')
                                <button class="block text-sm text-red-600 hover:underline w-full text-right">حذف</button>
                            </form>
                            <a href="{{ route('articles.show', $article) }}" class="block text-sm text-blue-600 hover:underline">عرض</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">لا توجد مقالات</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- روابط الباجيناشن --}}
    @if ($articles->hasPages())
        <div class="flex flex-col items-center mt-6 space-y-2">
            @foreach ($articles->getUrlRange(1, $articles->lastPage()) as $page => $url)
                @if ($page == $articles->currentPage())
                    <span class="px-4 py-2 bg-blue-600 text-white rounded shadow">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 shadow">
                        {{ $page }}
                    </a>
                @endif
            @endforeach
        </div>
    @endif
</div>
@endsection
