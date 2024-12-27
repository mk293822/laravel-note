<x-app-layout>
      <div class="max-w-2xl xl:w-full mx-auto p-6 bg-white rounded-lg shadow-md">
         <div class="mt-6">
            <div class="flex items-center justify-between mb-4">
               <h1 class="text-2xl font-bold mb-4">Note</h1>
               <a href="{{ route('note.index') }}" class="text-red-500 hover:underline">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
               </a>
            </div>
               <div class="flex flex-col p-4 bg-gray-100 rounded-lg shadow-sm">
                  <div class="flex justify-between items-center">
                     <h1 class="text-lg font-semibold">{{$note->name}}</h1>
                     <small class="text-gray-500">{{$note->created_at}}</small>
                  </div>
                  <p class="mt-2 text-gray-700">{{$note->note}}</p>
               </div>
               <div class="flex justify-end space-x-2 mt-4">
                  <a href="{{ route('note.edit', $note) }}" class="text-blue-500 hover:underline">Edit</a>
                  <form action="{{ route('note.destroy', $note) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="text-red-500 hover:underline">Delete</button>
                  </form>
               </div>
         </div>
      </div>
</x-app-layout>
