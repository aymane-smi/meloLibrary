<div class="relative rounded-[10px] p-2 overflow-hidden w-fit flex flex-col justify-center items-start bg-[#1B1E21]">
    @auth
        @if(auth()->user()->role === 1)
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
        @endif
    @endauth
    <div
        class="w-[180px] h-[180px] rounded-[10px] category-bg" style="background-color: {{'#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT)}}">
    </div>
    <div class="flex justify-between items-center w-full mt-2">
        @auth
            @if(auth()->user()->role === 1)
                <a href="/Dashboard/category/{{$category->id}}" class="font-semibold text-white text-[15px]">{{$category->name}}</a>
            @else
                <a href="/Dashboard/categoryUp/{{$category->id}}" class="font-semibold text-white text-[15px]">{{$category->name}}</a>
            @endif
        @endauth
    </div>
</div>
