<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Kursus Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg border border-gray-200">
                <div class="p-6">
                    <form method="POST" action="{{ route('courses.store') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Judul Kursus</label>
                            <input type="text" name="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                            <textarea name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required></textarea>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-700 border border-green-900 rounded-md font-semibold text-black shadow-md hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500">
                                <svg class="w-5 h-5 mr-2 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Simpan Kursus
                            </button>
                                                                                

                            <a href="{{ route('courses.index') }}" class="inline-flex items-center px-4 py-2 bg-red-500 border border-red-600 rounded-md font-semibold text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
