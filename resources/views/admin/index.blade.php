<x-header title="Dashboard" />
<x-admin_sidebar />
<div class="width pl-3 pt-5">
    <x-songs :songs_nbr="$results['created_songs']" :songs="$results['top_songs']" />
    <x-categories :categories_nbr="$results['created_categories']" :categoris="$results["top-categories"]" />
</div>
<x-footer />
