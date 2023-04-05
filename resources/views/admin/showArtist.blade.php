<x-header title="{{$artist->name}}"/>
<x-admin_sidebar />
<div class="flex flex-col h-screen overflow-y-scroll">
    <div class="width bg-amber-700 h-[350px]">
        <div class="width h-[250px] bg-transparent/20 p-8 flex items-end gap-5">
            <img src="{{ asset('storage/artists/' . $artist->image) }}" alt="song banner"
            class="w-[180px] h-[180px]" />
            <div class="text-white text-[15px]">
                <p class="text-[55px] font-bold">{{$artist->name}}</p>
                <div class="flex">
                    <a>Artist</a>
                </div>
            </div>
        </div>
        <div class="width h-[100px] bg-transparent/50 flex p-10 items-center gap-10">
            <p class="text-[30px] text-white">all related songs for {{$artist->name}}</p>
        </div>
    </div>
    <div class="flex justify-between items-center p-10 text-white hover:bg-black/30 mt-3">
        <p>image</p>
        <a href="/Dashboard/song/1">title</a>
        <p>duration</p>
    </div>
    @foreach ($songs as $song)
        <div class="flex justify-between items-center p-10 text-white hover:bg-black/30 mt-3">
            <img class="h-[40px] w-[40px] rounded-md" src="{{ asset('storage/songs/images/' . $song->image) }}"/>
            <a href="/Dashboard/song/{{$song->id}}">{{$song->title}}</a>
            <p>{{substr($song->duration, 0, -3)}}</p>
        </div>
    @endforeach
</div>
<x-footer />