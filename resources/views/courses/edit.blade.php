<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kursus
        </h2>
    </x-slot>

    <div class="py-12 max-w-xl mx-auto">
        <form method="POST" action="{{ route('courses.update', $course->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium text-sm text-gray-700">Judul Kursus</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ $course->title }}" required>
            </div>

            <div>
                <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                <textarea name="description" rows="4" class="w-full border rounded px-3 py-2" required>{{ $course->description }}</textarea>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
