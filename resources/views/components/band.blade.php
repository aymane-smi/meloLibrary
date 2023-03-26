<a class="rounded-[10px] p-2 overflow-hidden w-fit flex flex-col justify-center items-start bg-[#1B1E21] relative">
    <div class="absolute top-3 right-3 editBand_btn" id="{{$band->id}}">
        <i class="fa-solid fa-pen edit-band rounded-md hover:bg-white hover:text-black text-transparent p-2"></i>
    </div>
    <form class="absolute top-3 left-3" action="/Dashboard/deleteBand/{{ $band->id }}" method="POST">
        @csrf
        @method("DELETE")
        <button>
            <i class="fa-solid fa-trash rounded-md hover:bg-red-500 hover:text-white text-transparent p-2"></i>
        </button>
    </form>
    <img src="{{ asset('storage/bands/' . $band->image) }}" alt="band banner"
        class="w-[180px] h-[180px] rounded-[10px]" />
    <div class="flex justify-between items-center w-full mt-2">
        <p class="font-semibold text-white text-[15px]">{{ $band->name }}</p>
        <p class="addMember_btn cursor-pointer font-semibold text-white text-[12px] underline text-blue-500" id="{{$band->id}}">add member</p>
    </div>
</a>
