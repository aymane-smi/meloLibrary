<div class="w-screen h-full absolute z-50 hidden justify-center items-center bg-black/70" id="addSong-form">
    <div class="bg-[#0F1314] p-2 rounded-md text-white shadow-2xl border-1 border-white w-[300px] h-[60vh] overflow-y-scroll">
        <div class="w-full flex justify-end items-center">
            <i class="fa-solid fa-xmark p-3 hover:bg-white hover:text-[#0F1314] rounded-lg" id="close-addSong"></i>
        </div>
        <form class="p-4" enctype="multipart/form-data" id="addSong_form">
            @csrf
            <x-songPersonalInfoInput />
            <p>artists</p>
            <select multiple class="h-[50px] overflow-y-scoll p-3 w-full bg-white border-3 rounded-md text-black text-center border-[#15181b] outline-none mt-3" name="artists[]">
                @foreach($artists as $artist)
                    <option value="{{$artist->id}}" class="bg-white">
                        {{$artist->name}}
                    </option>
                @endforeach
            </select>
            <p>bands</p>
            <select multiple class="h-[50px] overflow-y-scoll p-3 w-full bg-white border-3 rounded-md text-black text-center border-[#15181b] outline-none mt-3" name="bands[]">
                @foreach($bands as $band)
                    <option value="{{$band->id}}" class="bg-white">
                        {{$band->name}}
                    </option>
                @endforeach
            </select>
            <select multiple class="h-[50px] overflow-y-scoll p-3 w-full bg-white border-3 rounded-md text-black text-center border-[#15181b] outline-none mt-3" name="categories[]">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" class="bg-white">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
            <button class="w-full p-2 mt-3 rounded-md bg-green-500 text-white">add new song</button>
        </form>
    </div>
</div>