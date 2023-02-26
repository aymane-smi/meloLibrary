<x-header title="Dashboard" />
<x-admin_sidebar />
<div class="border width pl-3 pt-5">
    <x-songs :songs_nbr="$results['created_songs']" :songs="$results['top_songs']" />
</div>
<x-footer />
