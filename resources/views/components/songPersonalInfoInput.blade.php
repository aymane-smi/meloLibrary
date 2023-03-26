<div>
    <div class="flex flex-col">
        <label for="name">title</label>
        <input type="text" name="title" id="title" class="rounded-md mt-2 bg-transparent border-4 p-2 border-[#15181b] outline-none"/>
        <p class="text-[10px] text-red-500" id="title_add_err"></p>
    </div>
    <div class="mt-2">
        <p>song image</p>
        <label for="image" class="p-2 rounded-md bg-blue-500 text-white flex flex-col justify-center items-center">
            <i class="fa-solid fa-image"></i>
            <p>song cover</p>
        </label>
        <input type="file" name="song_image" id="image" class="hidden"/>
        <p class="text-[10px] text-red-500" id="image_add_err"></p>
    </div>
    <div class="mt-2">
        <p>song</p>
        <label for="song" class="p-2 rounded-md bg-blue-500 text-white flex flex-col justify-center items-center">
            <i class="fa-solid fa-music"></i>
            <p>song</p>
        </label>
        <input type="file" name="song" id="song" class="hidden"/>
        <p class="text-[10px] text-red-500" id="song_add_err"></p>
    </div>
</div>