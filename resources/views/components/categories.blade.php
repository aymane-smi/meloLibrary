<div class="flex flex-col mt-5">
    <div class="flex justify-between items-center">
        <h2 class="text-[30px] text-white">Most popular categories<span
            class="font-medium text-[20px] ml-2">({{ $categoriesNbr }})</span>
        </h2>
        <a href="/Dashboard/categories" class="text-white pr-2">show all</a>
    </div>
    <div class="mt-4 flex justify-start items-center gap-3 flex-wrap">
        @foreach ($categories as $category)
            <x-category :category="$category"/>
        @endforeach
    </div>
</div>
