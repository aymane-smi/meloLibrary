<div class="w-screen h-full absolute z-50 hidden justify-center items-center bg-black/70" id="addArtists-form">
    <div class="bg-[#0F1314] p-2 rounded-md text-white shadow-2xl border-1 border-white w-[300px]">
        <div class="w-full flex justify-end items-center">
            <i class="fa-solid fa-xmark p-3 hover:bg-white hover:text-[#0F1314] rounded-lg" id="close-addArtist"></i>
        </div>
        <form method="POST" action="/Dashboard/editArtist" class="p-4" enctype="multipart/form-data">
            @csrf
            <x-artistPersonalInfoInput />
            <x-artistBand />
            <div class="cursor-pointer bg-blue-500 text-white rounded-md p-2 float-right mt-3" id="next">next</div>
        </form>
    </div>
</div>