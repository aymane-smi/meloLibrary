<div class="flex flex-col mt-8 w-full">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Most popular artists<span
                class="font-medium text-[20px] ml-2">({{ $artistsNbr }})</span>
        </h2>
        <a href="/Dashboard/artists" class="text-white pr-2">show all</a>
    </div>
    <div class="mt-4">
        <x-artist />
    </div>
</div>