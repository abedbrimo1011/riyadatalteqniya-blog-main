@extends('layouts.app')

@section('content')
<div class="container">
    <h2>إضافة تصنيف جديد</h2>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>الوصف</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">حفظ</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>
@endsection
