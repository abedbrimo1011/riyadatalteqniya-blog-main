@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4" dir="rtl">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">تعديل التصنيف</h2>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">الاسم</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ $category->description }}</textarea>
            </div>

            <div class="mt-4 flex justify-start gap-4">
                <button class="btn btn-primary px-6 py-2 rounded-md shadow-md transition ease-in-out hover:bg-blue-600">
                    تحديث
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary px-6 py-2 rounded-md shadow-md transition ease-in-out hover:bg-gray-600">
                    رجوع
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
