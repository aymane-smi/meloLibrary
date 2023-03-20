<div class="w-screen h-full absolute z-50 hidden justify-center items-center bg-black/70" id="addArtists-form">
    <div class="bg-[#0F1314] p-2 rounded-md text-white shadow-2xl border-1 border-white w-[300px]">
        <div class="w-full flex justify-end items-center">
            <i class="fa-solid fa-xmark p-3 hover:bg-white hover:text-[#0F1314] rounded-lg" id="close-addArtist"></i>
        </div>
        <form method="POST" action="/Dashboard/addArtist" class="p-4" enctype="multipart/form-data" id="addArtist_form">
            @csrf
            <x-artistPersonalInfoInput />
            <select class="p-3 w-full bg-white border-3 rounded-md text-black text-center border-[#15181b] outline-none mt-3" name="band">
            </select>
            <button class="w-full p-2 mt-3 rounded-md bg-green-500 text-white">add new artist</button>
        </form>
    </div>
</div>