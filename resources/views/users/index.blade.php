@extends('layouts.app')

@section('title', 'إدارة المستخدمين')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-xl font-bold mb-4">إدارة المستخدمين</h2>

    <div class="bg-white shadow rounded-lg p-6">
        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase border-b">الاسم</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase border-b">البريد الإلكتروني</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase border-b">تاريخ الإنشاء</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- روابط الباجيناشن -->
        <div class="mt-4">
            <div class="pagination">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <style>
        /* تصغير حجم الأسهم في الباجيناشن */
        .pagination .page-link {
            font-size: 0.8rem; /* تصغير الخط */
            padding: 0.5rem 1rem; /* تصغير الحجم */
        }

        .pagination .page-item .page-link {
            font-size: 0.8rem;
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            font-size: 0.8rem;
            padding: 0.5rem 0.8rem;
        }
    </style>
@endpush
