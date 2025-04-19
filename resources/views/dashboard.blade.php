@extends('layouts.app')

@section('title', 'لوحة التحكم')

@section('content')
<div class="container py-4">
    <div class="row g-4">

        <!-- عدد المقالات -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-muted">عدد المقالات</h5>
                    <p class="card-text fs-2 text-primary">{{ $articlesCount }}</p>
                </div>
            </div>
        </div>

        <!-- عدد التصنيفات -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-muted">عدد التصنيفات</h5>
                    <p class="card-text fs-2 text-success">{{ $categoriesCount }}</p>
                </div>
            </div>
        </div>

        <!-- عدد المستخدمين -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-muted">عدد المستخدمين</h5>
                    <p class="card-text fs-2 text-warning">{{ $usersCount }}</p>
                </div>
            </div>
        </div>

        <!-- عدد المؤلفين -->
        <div class="col-md-3">
            <div class="card text-center shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-muted">عدد المؤلفين</h5>
                    <p class="card-text fs-2 text-info">{{ $authorsCount }}</p> <!-- عرض عدد المؤلفين هنا -->
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
