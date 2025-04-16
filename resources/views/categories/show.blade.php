@extends('layouts.app')

@section('content')
<div class="container">
    <h2>تفاصيل التصنيف</h2>

    <div class="mb-3">
        <strong>الاسم:</strong> {{ $category->name }}
    </div>
    <div class="mb-3">
        <strong>الوصف:</strong> {{ $category->description }}
    </div>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary">رجوع</a>
</div>
@endsection
