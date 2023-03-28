<x-header title="{{$band->name}}"/>
<x-admin_sidebar />
<x-edit.editMember />
<div class="flex flex-col h-screen overflow-y-scroll">
    <div class="width bg-amber-700 h-[350px]">
        <div class="width h-[250px] bg-transparent/20 p-8 flex items-end gap-5">
            <img src="{{ asset('storage/bands/' . $band->image) }}" alt="song banner"
            class="w-[180px] h-[180px]" />
            <div class="text-white text-[15px]">
                <p class="text-[55px] font-bold">{{$band->name}}</p>
                <div class="flex">
                    <a>band</a>
                </div>
            </div>
        </div>
        <div class="width h-[100px] bg-transparent/50 flex p-10 items-center gap-10">
            <p class="text-[30px] text-white">all related songs and members for {{$band->name}}</p>
        </div>
    </div>
    <p class="text-white pl-10">songs:</p>
    @foreach($songs as $song)
        <div class="flex justify-between items-center p-10 text-white hover:bg-black/30 mt-3">
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
    <p class="text-white pl-10">members:</p>
    @foreach($members as $member)
        <div class="flex justify-between items-center p-10 text-white hover:bg-black/30 mt-3">
            <p>{{$member->full_name}}</p>
            <div class="flex justify-center items-center gap-5">
                <i class="fa-solid fa-pen text-orange-500 editMember_btn" id="{{$member->id}}"></i>
                <form action="/Dashboard/deleteMember/{{$member->id}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button>
                        <i class="fa-solid fa-trash text-red-500"></i>
                    </button>
                </form>
            </div>
            <hr />
        </div>
    @endforeach
</div>
@vite("resources/js/editMember.js");
<x-footer />