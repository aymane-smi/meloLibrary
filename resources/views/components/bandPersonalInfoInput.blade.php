<div>
    <div class="flex flex-col">
        <label for="name">name</label>
        <input type="text" name="name" id="name" class="rounded-md mt-2 bg-transparent border-4 p-2 border-[#15181b] outline-none"/>
        <p class="text-[10px] text-red-500" id="name_add_err"></p>
    </div>
    <div class="flex flex-col mt-3">
        <label for="country">country</label>
        <input type="text" name="country" id="country" class="rounded-md mt-2 bg-transparent border-4 p-2 border-[#15181b] outline-none"/>
        <p class="text-[10px] text-red-500" id="country_add_err"></p>
    </div>
    <div class="flex flex-col mt-3">
        <label for="creationDate">date of creation</label>
        <input type="date" target="\d{2}-\d{2}-\d{4}" name="creationDate" id="creationDate" class="rounded-md mt-2 bg-transparent border-4 p-2 border-[#15181b] outline-none"/>
        <p class="text-[10px] text-red-500" id="creationDate_add_err"></p>
    </div>
    <div class="mt-2">
        <label for="image" class="p-2 rounded-md bg-blue-500 text-white flex flex-col justify-center items-center">
            <i class="fa-solid fa-image"></i>
            <p>band profile</p>
        </label>
        <input type="file" name="band_image" id="image" class="hidden"/>
        <p class="text-[10px] text-red-500" id="image_add_err"></p>
    </div>
</div>