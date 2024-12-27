<x-app-layout>
<div class="max-w-2xl xl:w-full mx-auto p-6 bg-white rounded-lg shadow-md mb-8">
    
    <div class="mt-6">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold mb-4">Notes</h1>
            <a href="{{route('note.create')}}" class="text-blue-500 hover:underline">
        Add New Note</a>
        </div>
        <ul class="space-y-4">
            @foreach ($notes as $note)
                <li class="flex flex-col p-4 bg-gray-100 rounded-lg cursor-pointer shadow-sm" onclick="window.location='{{ route('note.show', $note) }}'">
                    <div class="flex justify-between items-center">
                        <h1 class="text-lg font-semibold">{{$note->name}}</h1>
                        <small class="text-gray-500">{{$note->created_at}}</small>
                    </div>
                    <p class="mt-2 text-gray-700">{{ Str::words($note->note, 50) }}</p>
                </li>
                <div class="flex justify-end space-x-4 mt-4">
                    <a href="{{ route('note.show', $note) }}" class="text-blue-500 hover:underline">View</a>
                    <a href="{{ route('note.edit', $note) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('note.destroy', $note) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </div>
            @endforeach
        </ul>
    </div>
</div>
<div class="mt-6">
    {{ $notes->links() }}
</div>
</x-app-layout>
