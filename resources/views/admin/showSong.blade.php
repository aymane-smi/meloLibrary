<x-header title="listening to {{$song->title}}"/>
<x-admin_sidebar />
<div class="flex flex-col h-screen overflow-y-scroll">
    <div class="width bg-amber-700 h-[350px]">
        <div class="width h-[250px] bg-transparent/20 p-8 flex items-end gap-5">
            <img src="{{ asset('storage/songs/images/' . $song->image) }}" alt="song banner"
            class="w-[180px] h-[180px]" />
            <div class="text-white text-[15px]">
                <p class="text-[55px] font-bold">{{$song->title}}</p>
                <div class="flex">
                    <a>Artist</a>
                    <p> ,{{substr($song->duration, 0, -3)}}</p>
                </div>
            </div>
        </div>
        <div class="width h-[100px] bg-transparent/50 flex p-10 items-center gap-10">
            <button class="p-5 rounded-[50%] h-[60px] w-[60px] flex justify-center items-center bg-[#12de94]" value="{{$song->song}}" id="song-play">
                <i class="fa-solid fa-play text-[20px]"></i>
            </button>
            <i class="fa-solid fa-heart text-[30px] "></i>
            <i class="fa-regular fa-circle-down text-[30px]"></i>
        </div>
    </div>
    {{-- <div class="width flex justify-center items-center p-5 text-[30px] text-white">
        no available comments
    </div> --}}
    <div class="mt-2 p-10">
        <p class="text-gray-500 text-[25px]">
            <span>comment</span>
            <audio src="{{ asset('storage/songs/audios/' . $song->song) }}" id="audio"></audio>
            <span class="text-[10px]">. username</span>
        </p>
    </div>
    <form class="border-dotted flex flex-col w-fit pl-10 gap-5 mb-[80px]">
        <input type="text" name="comment" class="w-[300px] p-4 rounded-md" placeholder="comment"/>
        <button class="bg-green-500 rounded-md p-2 text-white text-[13px]">add new comment</button>
    </form>
    <x-musicPlayer :song="$song"/>
</div>
@vite("resources/js/playMusic.js");
<x-footer />