<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            @if(auth()->user()->is_admin)
                <div class="flex space-x-4">
                    <a href="{{ route('courses.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-yellow-200 hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Kursus Baru
                    </a>
                    <a href="{{ route('courses.index') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-orange-200 hover:bg-emerald-700 focus:bg-emerald-700 active:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        Kelola Kursus
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->is_admin)
                <div class="mb-8">
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg border border-gray-200">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">Menu Admin</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <a href="{{ route('courses.create') }}" class="flex items-center p-4 bg-indigo-50 rounded-lg border-2 border-indigo-200 hover:bg-indigo-100 transition-colors duration-150">
                                    <div class="p-3 bg-indigo-600 rounded-lg">
                                        <svg class="w-6 h-6 text-yellow-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-bold text-indigo-900">Tambah Kursus</h4>
                                        <p class="text-sm text-indigo-700">Buat kursus baru</p>
                                    </div>
                                </a>

                                <a href="{{ route('courses.index') }}" class="flex items-center p-4 bg-emerald-50 rounded-lg border-2 border-emerald-200 hover:bg-emerald-100 transition-colors duration-150">
                                    <div class="p-3 bg-emerald-600 rounded-lg">
                                        <svg class="w-6 h-6 text-orange-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-bold text-emerald-900">Kelola Kursus</h4>
                                        <p class="text-sm text-emerald-700">Edit dan hapus kursus</p>
                                    </div>
                                </a>

                                <a href="{{ route('courses.all-participants') }}" class="flex items-center p-4 bg-rose-50 rounded-lg border-2 border-rose-200 hover:bg-rose-100 transition-colors duration-150">
                                    <div class="p-3 bg-rose-600 rounded-lg">
                                        <svg class="w-6 h-6 text-cyan-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-bold text-rose-900">Kelola Peserta</h4>
                                        <p class="text-sm text-rose-700">Lihat daftar peserta</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-lg rounded-lg border border-gray-200">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Kursus Saya</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse(auth()->user()->courses as $course)
                            <div class="bg-white border-2 border-blue-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-150">
                                <h4 class="font-bold text-lg text-blue-900">{{ $course->title }}</h4>
                                <p class="text-sm text-blue-700 mt-2">{{ Str::limit($course->description, 100) }}</p>
                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('courses.show', $course) }}" class="inline-flex items-center px-3 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-lime-200 hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Detail
                                    </a>
                                    <form action="{{ route('courses.unenroll', $course) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-pink-200 hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Batal
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full">
                                <div class="text-center py-8">
                                    <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p class="mt-4 text-lg font-bold text-gray-700">Anda belum mendaftar ke kursus apapun.</p>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-8 bg-white overflow-hidden shadow-lg rounded-lg border border-gray-200">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Kursus Tersedia</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach(\App\Models\Course::whereNotIn('id', auth()->user()->courses->pluck('id'))->get() as $course)
                            <div class="bg-white border-2 border-green-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-150">
                                <h4 class="font-bold text-lg text-green-900">{{ $course->title }}</h4>
                                <p class="text-sm text-green-700 mt-2">{{ Str::limit($course->description, 100) }}</p>
                                <div class="mt-4">
                                    <form action="{{ route('courses.enroll', $course) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-3 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-purple-200 hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Daftar Kursus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>