<x-header title="favorites"/>
<x-admin_sidebar />
<div class="width">
    <div class="text-[30px] h-[80px] width p-3" style="background-color: {{'#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT)}}">list of your Favorites songs</div>
    @foreach ($songs as $song)
        <div class="flex justify-between items-center p-10 text-white hover:bg-black/30 mt-3">
            <img class="h-[40px] w-[40px] rounded-md" src="{{ asset('storage/songs/images/' . $song->image) }}"/>
            <a href="/Dashboard/song/{{$song->id}}">{{$song->title}}</a>
            <p>{{substr($song->duration, 0, -3)}}</p>
        </div>
    @endforeach
</div>
<x-footer />