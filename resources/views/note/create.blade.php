<x-app-layout>
    <div class="max-w-2xl xl:w-full mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
        <h1 class="font-bold text-center mb-8">Note Creation Form</h1>
        <form action="{{ route('note.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="name" id="name" class="p-4 mt-1 block w-full rounded-md border-gray-300 border-2 shadow-md focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                <textarea name="note" id="note" rows="4" class="mt-1 p-4 block w-full rounded-md border-gray-300 border-2 shadow-md focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            </div>
            <div class="flex justify-end gap-4">
                <a href="{{route('note.index')}}" class="px-4 py-2 bg-red-500 text-white rounded-md shadow-sm hover:bg-red-600">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600">Create Note</button>
            </div>
        </form>
    </div>
</x-app-layout>