<a class="relative rounded-[10px] p-2 overflow-hidden w-fit flex flex-col justify-center items-start bg-[#1B1E21]"
    href="/Dashboard/@auth{{auth()->user()->role === 1 ? "song" : "songUp"}}@endauth/{{ $song->id }}">
    <form class="absolute top-3 left-3" action="/Dashboard/deleteSong/{{ $song->id }}" method="POST">
        @csrf
        @method("DELETE")
        <button>
            <i class="fa-solid fa-trash edit-artist rounded-md hover:bg-red-500 hover:text-white text-transparent p-2"></i>
        </button>
    </form>
    <img src="{{ asset('storage/songs/images/' . $song->image) }}" alt="song banner"
        class="w-[180px] h-[180px] rounded-[10px]" />
    <div class="flex justify-between items-center w-full mt-2">
        <p class="font-semibold text-white text-[15px]">{{$song->title}}</p>
        {{-- <div class="text-[13px]">
            <i class="fa-regular fa-star text-yellow-600"></i>
            <span class="text-white font-thin">3.4(432)</span>
        </div> --}}
    </div>
    {{-- <p class="text-[#A9ABAD] font-normal text-[10px]">category</p> --}}
</a>
