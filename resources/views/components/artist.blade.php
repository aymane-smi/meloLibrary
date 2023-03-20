<a class="rounded-[10px] p-2 overflow-hidden w-fit flex flex-col justify-center items-start bg-[#1B1E21] relative">
    <div class="absolute top-3 right-3">
        <i class="fa-solid fa-pen edit-artist rounded-md hover:bg-white hover:text-black text-transparent p-2"></i>
    </div>
    <form class="absolute top-3 left-3" action="/Dashboard/delete/{{ $artist->id }}" method="POST">
        @csrf
        @method("DELETE")
        <button>
            <i class="fa-solid fa-trash edit-artist rounded-md hover:bg-red-500 hover:text-white text-transparent p-2"></i>
        </button>
    </form>
    <img src="{{ asset('storage/artists/' . $artist->image) }}" alt="song banner"
        class="w-[180px] h-[180px] rounded-[10px]" />
    <div class="flex justify-between items-center w-full mt-2">
        <p class="font-semibold text-white text-[15px]">{{ $artist->name }}</p>
    </div>
</a>
