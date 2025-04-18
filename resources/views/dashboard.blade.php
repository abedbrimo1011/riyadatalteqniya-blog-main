<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            لوحة التحكم
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- عدد المقالات -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-700">عدد المقالات</h3>
                <p class="mt-2 text-2xl text-indigo-600">{{ $articlesCount }}</p>
            </div>

            <!-- عدد التصنيفات -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-700">عدد التصنيفات</h3>
                <p class="mt-2 text-2xl text-indigo-600">{{ $categoriesCount }}</p>
            </div>

            <!-- عدد المستخدمين -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-700">عدد المستخدمين</h3>
                <p class="mt-2 text-2xl text-indigo-600">{{ $usersCount }}</p>
            </div>

        </div>
    </div>
</x-app-layout>
