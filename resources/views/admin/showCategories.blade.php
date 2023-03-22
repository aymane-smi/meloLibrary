<x-header title="Categories"/>
<x-admin_sidebar />
<x-add.addCategorie />
<x-edit.editCategory />
<div class="flex flex-col mt-8 w-full pl-3">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Available Categories({{ $categories_nbr }}) </h2>
        <a class="text-white pr-2 cursor-pointer" id="addCategory_btn">add new Category</a>
    </div>
    <div class="mt-4 flex justify-start items-center flex-wrap gap-8">
        @foreach ($categories as $category)
            <x-category :category="$category" />
        @endforeach
    </div>
</div>
@Vite("resources/js/addCategory.js")
@Vite("resources/js/editCategory.js")
<x-footer />