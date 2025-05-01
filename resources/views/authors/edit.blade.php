@extends('layouts.app')

@section('content')
<div class="container">
    <h1>تعديل بيانات المؤلف</h1>

    <form action="{{ route('authors.update', $author) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $author->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $author->email) }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">نبذة</label>
            <textarea name="bio" class="form-control">{{ old('bio', $author->bio) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">تحديث</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
