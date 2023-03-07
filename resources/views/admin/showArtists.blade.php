<x-header title="artists" />
<x-admin_sidebar />
<x-addArtist />
<pre class="text-white">
{{var_dump($artists)}}
</pre>
<div class="flex flex-col mt-8 w-full pl-3">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Available Artists({{ $artits_nbr }}) </h2>
        <a class="text-white pr-2 cursor-pointer" id="addArtist_btn">add new Artits</a>
    </div>
    <div class="mt-4 flex justify-start items-center flex-wrap">
        <x-artist />
    </div>
</div>
@vite('resources/js/addArtist.js')
<x-footer />