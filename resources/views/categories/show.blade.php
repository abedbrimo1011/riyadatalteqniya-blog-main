@extends('layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-xl font-bold mb-4">تفاصيل التصنيف</h2>

    <!-- عرض اسم التصنيف -->
    <div class="mb-3">
        <strong class="text-lg">الاسم:</strong>
        <span>{{ $category->name }}</span>
    </div>

    <!-- عرض وصف التصنيف -->
    <div class="mb-3">
        <strong class="text-lg">الوصف:</strong>
        <p>{{ $category->description }}</p>
    </div>

    <!-- زر الرجوع -->
    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">رجوع</a>
</div>
@endsection
