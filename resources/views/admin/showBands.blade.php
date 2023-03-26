<x-header title="Bands"/>
<x-admin_sidebar />
<x-add.addBand />
<x-add.addMember />
<x-edit.editBand />
<div class="flex flex-col mt-8 w-full pl-3">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Available Bands({{ $bands_nbr }}) </h2>
        <a class="text-white pr-2 cursor-pointer" id="addBand_btn">add new Band</a>
    </div>
    <div class="mt-4 flex justify-start items-center flex-wrap gap-8">
        @foreach ($bands as $band)
            <x-band :band="$band" />
        @endforeach
    </div>
</div>
@vite('resources/js/editBand.js')
@vite('resources/js/addBand.js')
@vite("resources/js/addMember.js")
<x-footer />