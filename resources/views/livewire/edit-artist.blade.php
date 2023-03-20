<div x-data x-show="$store.edit.open" class="w-screen h-full absolute z-50 flex justify-center items-center bg-black/70"
    x-effect="if(!$store.edit.sent){
        $store.edit.sent = true;
        $wire.change($store.edit.id);
    }">
    <div class="bg-[#0F1314] p-2 rounded-md text-white shadow-2xl border-1 border-white w-[300px]">
        <div x-data class="w-full flex justify-end items-center" @click="$store.edit.toggle();$store.edit.initSent()">
            <i class="fa-solid fa-xmark p-3 hover:bg-white hover:text-[#0F1314] rounded-lg"></i>
        </div>
        <form method="POST" class="p-4" enctype="multipart/form-data">
            @csrf
            <x-editArtistPersonalInfoInput :artist="$artist" />
            <x-editArtistBand :bands="$bands" :id="$artist"/>
            <div class="cursor-pointer bg-blue-500 text-white rounded-md p-2 float-right mt-3" id="next-edit">next</div>
        </form>
    </div>
</div>
