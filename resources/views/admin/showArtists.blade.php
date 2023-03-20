<x-header title="artists" />
<x-admin_sidebar />
<x-addArtist />
<div class="flex flex-col mt-8 w-full pl-3">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Available Artists({{ $artits_nbr }}) </h2>
        <a class="text-white pr-2 cursor-pointer" id="addArtist_btn">add new Artits</a>
    </div>
    <div class="mt-4 flex justify-start items-center flex-wrap gap-8">
        @foreach ($artists as $artist)
            <x-artist :artist="$artist" />
        @endforeach
    </div>
</div>
@vite('resources/js/addArtist.js')
@vite('resources/js/editArtist.js')
<x-footer />
