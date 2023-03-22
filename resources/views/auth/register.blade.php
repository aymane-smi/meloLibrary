<x-header title="Register"/>
<div class="w-screen h-screen flex justify-center items-center">
    <form method="POST" action="/register" class="bg-white shadow-md shadow-gray-400 rounded-md p-4 flex justify-center items-center flex-col">
        <p class="flex justify-center items-center gap-3">
            <i class="fa-solid fa-compact-disc text-black text-[40px]"></i><span
                class="text-black font-bold text-xl">MeloLibrary</span>
        </p>
        <div class="flex flex-col items-start justify-center mt-3">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="border-[3px] border-black p-3 rounded-md"/>
        </div>
        <div class="flex flex-col items-start justify-center mt-3">
            <label for="email">email</label>
            <input type="email" name="email" id="email" class="border-[3px] border-black p-3 rounded-md"/>
        </div>
        <div class="flex flex-col items-start justify-center mt-3">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="border-[3px] border-black p-3 rounded-md"/>
        </div>
        <button class="p-3 rounded-md border-black border-2 mt-4">Register</button>
    </form>
</div>
<x-footer />