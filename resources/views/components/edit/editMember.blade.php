<div class="w-screen h-full absolute z-50 hidden justify-center items-center bg-black/70" id="editMember-form">
    <div class="bg-[#0F1314] p-2 rounded-md text-white shadow-2xl border-1 border-white w-[300px]">
        <div class="w-full flex justify-end items-center" id="close-editMember">
            <i class="fa-solid fa-xmark p-3 hover:bg-white hover:text-[#0F1314] rounded-lg"></i>
        </div>
        <form class="p-4" enctype="multipart/form-data" id="editMember_form">
            @csrf
            <div class="flex flex-col">
                <label for="name_edit">full name</label>
                <input type="text" name="name" id="name_edit" class="rounded-md mt-2 bg-transparent border-4 p-2 border-[#15181b] outline-none"/>
                <input type="hidden" name="id_edit" class="id_edit"/>
                <p class="text-[10px] text-red-500" id="name_edit_err"></p>
            </div>
            <button class="w-full p-2 mt-3 rounded-md bg-orange-500 text-white">edit Member</button>
        </form>
    </div>
</div>