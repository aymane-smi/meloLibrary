<a class="rounded-[10px] p-2 overflow-hidden w-fit flex flex-col justify-center items-start bg-[#1B1E21] relative"
    href="/Dashboard/artist/1">
    <div class="absolute top-2 right-3">
        <i class="fa-solid fa-pen edit-artist rounded-md hover:bg-white hover:text-black text-transparent p-2"></i>
    </div>
    <img src="{{asset('storage/artists/'.$artist->image)}}" alt="song banner"
        class="w-[180px] h-[180px] rounded-[10px]" />
    <div class="flex justify-between items-center w-full mt-2">
        <p class="font-semibold text-white text-[15px]">{{$artist->name}}</p>
    </div>
</a>
