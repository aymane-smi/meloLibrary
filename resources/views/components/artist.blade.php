<a class="rounded-[10px] p-2 overflow-hidden w-fit flex flex-col justify-center items-start bg-[#1B1E21]"
    href="/Dashboard/artist/1">
    <img src="{{asset('storage/artists/'.$artist->image)}}" alt="song banner"
        class="w-[180px] h-[180px] rounded-[10px]" />
    <div class="flex justify-between items-center w-full mt-2">
        <p class="font-semibold text-white text-[15px]">{{$artist->name}}</p>
    </div>
</a>
