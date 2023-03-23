<a class="relative rounded-[10px] p-2 overflow-hidden w-fit flex flex-col justify-center items-start bg-[#1B1E21]">
    <div class="absolute top-3 right-3 editCategory_btn" id="{{$category->id}}">
        <i class="fa-solid fa-pen edit-category rounded-md hover:bg-white hover:text-black text-transparent p-2"></i>
    </div>
    <form class="absolute top-3 left-3" action="/Dashboard/deleteCategory/{{ $category->id }}" method="POST">
        @csrf
        @method("DELETE")
        <button>
            <i class="fa-solid fa-trash edit-artist rounded-md hover:bg-red-500 hover:text-white text-transparent p-2"></i>
        </button>
    </form>
    <div
        class="w-[180px] h-[180px] rounded-[10px] category-bg">
    </div>
    <div class="flex justify-between items-center w-full mt-2">
        <p class="font-semibold text-white text-[15px]">{{$category->name}}</p>
    </div>
</a>
