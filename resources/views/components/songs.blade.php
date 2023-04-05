<div class="flex flex-col">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Most popular songs<span
            class="font-medium text-[20px] ml-2">({{ $songsNbr }})</span>
        </h2>
        <a href="/Dashboard/songs" class="text-white pr-2">show all</a>
    </div>
    <div class="mt-4 flex justify-start items-center gap-3 flex-wrap">
        @foreach ($songs as $song)
            <x-song :song="$song"/>
        @endforeach
    </div>
</div>
