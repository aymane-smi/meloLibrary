<x-header title="Songs"/>
<x-admin_sidebar />
@auth
    @if(auth()->user()->role === 1)
        <x-add.addSong :bands="$bands" :artists="$artists" :categories="$categories"/>
    @endif
@endauth
<div class="flex flex-col mt-8 w-full pl-3">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Available Songs({{ $songs_nbr }}) </h2>
        @auth
            @if(auth()->user()->role === 1)
                <a class="text-white pr-2 cursor-pointer" id="addSong_btn">add new Song</a>
            @endif
        @endauth
    </div>
    <div class="mt-4 flex justify-start items-center flex-wrap gap-8">
        @foreach ($songs as $song)
            <x-song :song="$song" />
        @endforeach
    </div>
</div>
@vite("resources/js/addSong.js");
<x-footer />