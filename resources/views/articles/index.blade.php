@extends('layouts.app')

@section('content')
<div class="container">
    <h2>جميع المقالات</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">مقال جديد</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>العنوان</th>
                <th>المؤلف</th>
                <th>التصنيف</th>
                <th>الصورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->author->name ?? 'غير معروف' }}</td>
                    <td>{{ $article->category->name ?? 'غير مصنف' }}</td>
                    <td>
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" width="60">
                        @else
                            لا يوجد
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('articles.show', $article) }}" class="btn btn-info btn-sm">عرض</a>
                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-sm">تعديل</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $articles->links() }}
</div>
@endsection
