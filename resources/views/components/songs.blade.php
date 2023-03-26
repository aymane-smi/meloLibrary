<div class="flex flex-col">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Most popular songs<span
            class="font-medium text-[20px] ml-2">({{ $songsNbr }})</span>
        </h2>
        <a href="/Dashboard/songs" class="text-white pr-2">show all</a>
    </div>
    <div class="mt-4">
        @foreach ($songs as $song)
        <p class="text-white">test</p>
            <x-song :song="$song"/>
        @endforeach
    </div>
</div>
