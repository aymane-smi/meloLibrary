<div class="p-4 fixed bottom-0 width h-[60px] bg-black hidden justify-between items-center" id="player">
    <p class="text-white">{{$song->title}}</p>
    <div class="flex justify-center items-center gap-3">
        <i class="fa-regular fa-circle-pause text-white text-[20px] player-state"></i>
        <span class="timer text-white text-[13px] w-[30px]">00:00</span>
        <div class="h-[4px] w-[450px] bg-white/5 relative flex justify-start items-center">
          {{-- <div class="h-[4px] hover:h-[6px] absolute top-0 w-[100px] bg-[#12de94]" id="duration"></div> --}}
          <input step="1" type="range" class="absolute  h-[4px] w-[450px] accent-[#12de94]" min="0" value="0" id="music_range"/>
        </div>
    </div>
    <div class="flex gap-5 justify-center items-center">
        <span class="w-[30px]">
            <i class="fa-solid fa-volume-high text-[15px] text-white" id="volume-icon"></i>
        </span>
        <input type="range" class="w-[80px] h-[4px] accent-[#12de94]" min="0" max="100" value="100" id="volume"/>
        {{-- <div class="h-[4px] w-[80px] bg-white" id="volume"></div> --}}
    </div>
</div>