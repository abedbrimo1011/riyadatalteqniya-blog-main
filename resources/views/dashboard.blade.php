@extends('layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="container py-5" dir="rtl">
    <h1 class="mb-4 text-center">لوحة التحكم</h1>

    <div class="row g-4">

        <!-- عدد المقالات -->
        <div class="col-md-3">
            <div class="card shadow-lg border-0 rounded-4 text-end">
                <div class="card-body">
                    <div class="mb-2 text-primary">
                        <i class="bi bi-file-earmark-text fs-1"></i>
                    </div>
                    <h5 class="card-title text-muted">عدد المقالات</h5>
                    <p class="card-text fs-2 fw-bold text-primary">{{ $articlesCount }}</p>
                    <a href="{{ route('articles.index') }}" class="btn btn-sm btn-outline-primary mt-2">عرض المقالات</a>
                </div>
            </div>
        </div>

        <!-- عدد التصنيفات -->
        <div class="col-md-3">
            <div class="card shadow-lg border-0 rounded-4 text-end">
                <div class="card-body">
                    <div class="mb-2 text-success">
                        <i class="bi bi-tags fs-1"></i>
                    </div>
                    <h5 class="card-title text-muted">عدد التصنيفات</h5>
                    <p class="card-text fs-2 fw-bold text-success">{{ $categoriesCount }}</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-outline-success mt-2">عرض التصنيفات</a>
                </div>
            </div>
        </div>

        <!-- عدد المستخدمين -->
        <div class="col-md-3">
            <div class="card shadow-lg border-0 rounded-4 text-end">
                <div class="card-body">
                    <div class="mb-2 text-warning">
                        <i class="bi bi-people fs-1"></i>
                    </div>
                    <h5 class="card-title text-muted">عدد المستخدمين</h5>
                    <p class="card-text fs-2 fw-bold text-warning">{{ $usersCount }}</p>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-outline-warning mt-2">عرض المستخدمين</a>
                </div>
            </div>
        </div>

        <!-- عدد المؤلفين -->
        <div class="col-md-3">
            <div class="card shadow-lg border-0 rounded-4 text-end">
                <div class="card-body">
                    <div class="mb-2 text-info">
                        <i class="bi bi-person-badge fs-1"></i>
                    </div>
                    <h5 class="card-title text-muted">عدد المؤلفين </h5>
                    <p class="card-text fs-2 fw-bold text-info">{{ $authorsCount }}</p>
                    <a href="{{ route('authors.index') }}" class="btn btn-sm btn-outline-info mt-2">عرض المؤلفين</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
