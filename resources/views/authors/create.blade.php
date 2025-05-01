@extends('layouts.app')

@section('content')
<div class="container">
    <h1>إضافة مؤلف جديد</h1>

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">نبذة</label>
            <textarea name="bio" class="form-control">{{ old('bio') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">حفظ</button>
        <a href="{{ route('authors.index') }}" class="btn btn-secondary">إلغاء</a>
    </form>
</div>
@endsection
