<x-header title="artists" />
<x-admin_sidebar />
@auth
    @if(auth()->user()->role === 1)
        <x-addArtist />
        <x-edit.editArtist />
    @endif
@endauth
<div class="flex flex-col mt-8 w-full pl-3">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Available Artists({{ $artits_nbr }}) </h2>
        @auth
            @if(auth()->user()->role === 1)
                <a class="text-white pr-2 cursor-pointer" id="addArtist_btn">add new Artits</a>
            @endif
        @endauth
    </div>
    <div class="mt-4 flex justify-start items-center flex-wrap gap-8">
        @foreach ($artists as $artist)
            <x-artist :artist="$artist" />
        @endforeach
    </div>
</div>
@vite('resources/js/editArtist.js')
@vite('resources/js/addArtist.js')
<x-footer />
