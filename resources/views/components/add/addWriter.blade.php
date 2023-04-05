<div class="w-screen h-full absolute z-50 hidden justify-center items-center bg-black/70" id="addWriter-form">
    <div class="bg-[#0F1314] p-2 rounded-md text-white shadow-2xl border-1 border-white w-[300px]">
        <div class="w-full flex justify-end items-center">
            <i class="fa-solid fa-xmark p-3 hover:bg-white hover:text-[#0F1314] rounded-lg" id="close-addWriter"></i>
        </div>
        <form class="p-4" enctype="multipart/form-data" id="addWriter_form">
            @csrf
            <div class="flex flex-col">
                <label for="name">name</label>
                <input type="text" name="name" id="name" class="rounded-md mt-2 bg-transparent border-4 p-2 border-[#15181b] outline-none"/>
                <p class="text-[10px] text-red-500" id="name_add_err"></p>
            </div>
            <input type="hidden" name="music_id" value="{{$id}}"/>
            <button class="w-full p-2 mt-3 rounded-md bg-green-500 text-white">add new writer</button>
        </form>
    </div>
</div>