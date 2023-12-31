
<form class="flex items-center mx-2" action="{{ route('archive.remove') }}" method="POST" :archive="$archive">
  @csrf
  @method('DELETE')
  <input type="number" name="authorID" value="{{ $archive->authorID }}" class="hidden">
  <input type="number" name="bookID" value="{{ $archive->id }}" class="hidden">
  <button type="submit" class="inline-block p-3" :archive="$archive">
      <div class="overflow-hidden text-left rounded-md shadow-lg w-28 md:w-40 card h-fit" style="background-color: rgba(235, 235, 235, 0.7)">
        <img class="w-full" src="{{ asset($archive->image) }}"/>
        <figure class="py-2 text-center">
          <blockquote class="w-full">
            <p class="w-40 overflow-hidden text-md md:text-lg text-ellipsis whitespace-nowrap">{{ $archive->title }}</p>
          </blockquote>
        </figure>
        <div class="px-2 pb-2 md:px-6">
          <span class="block px-3 py-1 text-xs font-semibold text-center text-gray-700 bg-gray-200 rounded-full md:text-sm align-self-center">{{ $archive->genre->name }}</span>
        </div>
      </div>
  </button>
</form>