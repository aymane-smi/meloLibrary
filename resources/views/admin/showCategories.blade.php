<x-header title="Categories"/>
<x-admin_sidebar />
@auth
    @if(auth()->user()->role === 1)
        <x-add.addCategorie />
        <x-edit.editCategory />
    @endif
@endauth
<div class="flex flex-col mt-8 w-full pl-3">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Available Categories({{ $categories_nbr }}) </h2>
        @auth
            @if(auth()->user()->role === 1)
                <a class="text-white pr-2 cursor-pointer" id="addCategory_btn">add new Category</a>
            @endif
        @endauth
    </div>
    <div class="mt-4 flex justify-start items-center flex-wrap gap-8">
        @foreach ($categories as $category)
            <x-category :category="$category" />
        @endforeach
    </div>
</div>
@vite("resources/js/editCategory.js")
@vite("resources/js/addCategory.js")
@vite("resources/js/categories.js")
<x-footer />