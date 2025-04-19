@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4" dir="rtl">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">إضافة تصنيف جديد</h2>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">الاسم</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mt-4 flex justify-start gap-4">
                <button class="btn btn-success px-6 py-2 rounded-md shadow-md transition ease-in-out hover:bg-green-600">
                    حفظ
                </button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary px-6 py-2 rounded-md shadow-md transition ease-in-out hover:bg-gray-600">
                    رجوع
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
