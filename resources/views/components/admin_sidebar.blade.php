<div class="w-fit h-screen flex flex-col justify-between items-center px-3 py-3 bg-[#0F1314]">
    <p class="flex justify-center items-center gap-3">
        <i class="fa-solid fa-compact-disc text-[#12DE94] text-[40px]"></i><span
            class="text-white font-bold text-xl">MeloLibrary</span>
    </p>
    <div class="flex flex-col justify-center items-start  gap-10 text-lg text-[#3E4143] pl-3">
        <a href="/Dashboard"
            class="flex justify-center items-center gap-5 hover:text-blue-300 transition duration-150 ease-out hover:ease-in">
            <i class="fa-solid fa-house"></i>Home
        </a>
        <a href="/Dashboard/songs"
            class="flex justify-center items-center gap-5 hover:text-blue-300 transition duration-150 ease-out hover:ease-in">
            <i class="fa-solid fa-music"></i> songs
        </a>
        <a href="/Dashboard/categories"
            class="flex justify-center items-center gap-5 hover:text-blue-300 transition duration-150 ease-out hover:ease-in">
            <i class="fa-regular fa-rectangle-list"></i> categories
        </a>
        <a href="/Dashboard/bands"
            class="flex justify-center items-center gap-5 hover:text-blue-300 transition duration-150 ease-out hover:ease-in">
            <i class="fa-solid fa-people-group"></i> bands
        </a>
        <a href="/Dashboard/artists"
            class="flex justify-center items-center gap-5 hover:text-blue-300 transition duration-150 ease-out hover:ease-in">
            <i class="fa-solid fa-person"></i> artists
        </a>
        <a href="/Dashboard/favorites"
            class="flex justify-center items-center gap-5 hover:text-blue-300 transition duration-150 ease-out hover:ease-in">
            <i class="fa-solid fa-bookmark"></i> favorites
        </a>
    </div>
    <div class="text-[#3E4143] flex flex-col justify-center items-start gap-10 text-lg w-full pl-3">
        <a href="/Dashboard/logout"
            class="flex justify-center items-center gap-5 hover:text-blue-300 transition duration-150 ease-out hover:ease-in">
            <i class="fa-solid fa-right-from-bracket"></i> logout
        </a>
        {{-- <a
            href="/Dashboard/settings"class="flex justify-center items-center gap-5 hover:text-blue-300 transition duration-150 ease-out hover:ease-in"><i
                class="fa-solid fa-gear"></i> settings</a> --}}
    </div>
</div>
