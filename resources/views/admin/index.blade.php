<x-header title="Dashboard" />
<x-admin_sidebar />
<div class="width pl-3 pt-5 max-h-screen overflow-y-scroll">
    <x-songs :songsNbr="$results['created_songs']" :songs="$results['top_songs']" />
    <x-categories :categoriesNbr="$results['created_categories']" :categories="$results['top_categories']" />
    <x-artists :artistsNbr="$results['created_artists']" :artists="$results['top_artists']" :page="false"/>
</div>
@vite('resources/js/categories.js');
<x-footer />
