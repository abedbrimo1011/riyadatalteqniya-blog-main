@extends('layouts.app')

@section('title', 'إدارة المستخدمين')

@section('content')
<div class="container mt-4" dir="rtl">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">إدارة المستخدمين</h5>
        </div>

        <div class="card-body">
            @if($users->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>الاسم</th>
                                <th>البريد الإلكتروني</th>
                                <th>تاريخ الإنشاء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="alert alert-warning text-center">
                    لا يوجد مستخدمون حالياً.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
