<x-header title="{{$category->name}}"/>
<x-admin_sidebar />
<div class="flex flex-col h-screen overflow-y-scroll">
        <div class="width h-[100px] bg-transparent/50 flex p-10 items-center gap-10" style="background-color: {{'#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT)}}">
            <p class="text-[30px] text-white">all related songs to category {{$category->name}}</p>
        </div>
    <p class="text-white pl-10">songs:</p>
    @foreach($songs as $song)
        <div class="flex justify-between items-center p-10 text-white hover:bg-black/30 mt-3" >
            <img src="{{asset('storage/songs/images/' . $song->image)}}" class="rounded-[50%] h-[30px] w-[30px]"/>
            <a href="/Dashboard/song/{{$song->id}}">{{
                $song->title
            }}</a>
            <p>
                {{substr($song->duration, 0, -3)}}
            </p>
            <hr />
        </div>
    @endforeach
</div>
<x-footer />