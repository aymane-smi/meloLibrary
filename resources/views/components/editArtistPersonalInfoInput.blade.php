<div id="step1-edit">
    <div class="flex flex-col">
        <label for="name">name</label>
        <input type="text" name="name" id="name"
            value="{{ print_r($artist === null ? '' : substr($artist->name, 0, -1)) }}"
            class="rounded-md mt-2 bg-transparent border-4 p-2 border-[#15181b] outline-none" />
    </div>
    <div class="flex flex-col mt-3">
        <label for="country">country</label>
        <input type="text" name="country" id="country"
        value="{{ print_r($artist === null ? '' : substr($artist->country, 0, -1)) }}"
            class="rounded-md mt-2 bg-transparent border-4 p-2 border-[#15181b] outline-none" />
    </div>
    <div class="flex flex-col mt-3">
        <label for="birthday">birthday</label>
        <input type="date" target="\d{2}-\d{2}-\d{4}" name="birthday" id="birthday"
            value="{{ print_r($artist === null ? '' : substr($artist->birthday, 0, -1)) }}"
            class="rounded-md mt-2 bg-transparent border-4 p-2 border-[#15181b] outline-none" />
    </div>
    <div class="mt-2">
        <label for="image" class="p-2 rounded-md bg-orange-500 text-white flex flex-col justify-center items-center">
            <i class="fa-solid fa-image"></i>
            <p>edit artist profile</p>
        </label>
        <input type="file" name="artist_image" id="image" class="hidden" />
    </div>
</div>
