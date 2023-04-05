<x-header title="listening to {{$song->title}}"/>
<x-admin_sidebar />
<x-add.addWriter :id="$song->id"/>
<div class="flex flex-col h-screen overflow-y-scroll width">
    <div class=" bg-amber-700 h-[350px]">
        <div class="h-[250px] bg-transparent/20 p-8 flex items-end gap-5">
            <img src="{{ asset('storage/songs/images/' . $song->image) }}" alt="song banner"
            class="w-[180px] h-[180px]" />
            <div class="flex flex-col justify-start items-center">
                <div class="text-white text-[15px]">
                    <p class="text-[55px] font-bold">{{$song->title}}</p>
                    <div class="flex">
                        @foreach ($artists as $artist)
                            <a href="/Dashboard/artist/{{$artist->id}}">{{$artist->name}} , </a><span> </span>
                        @endforeach
                        @foreach ($bands as $band)
                            <a class="/Dashboard/band/{{$band->id}}">{{$band->name}} , </a><span> </span>
                        @endforeach
                        <p> {{substr($song->duration, 0, -3)}}</p>
                    </div>
                </div>
                <p>
                    @foreach($writers as $writer)
                    <span class="text-blue-500 text-[10px]">
                        {{$writer->full_name}} ,
                    </Span>
                    @endforeach
                </p>
            </div>
        </div>
        <div class="width h-[100px] bg-transparent/50 flex p-10 items-center gap-10">
            <button class="p-5 rounded-[50%] h-[60px] w-[60px] flex justify-center items-center bg-[#12de94]" value="{{$song->song}}" id="song-play">
                <i class="fa-solid fa-play text-[20px]" id="player-icon"></i>
            </button>
            @auth
                @if(auth()->user()->role === 0)
                    <form id="favorite_form">
                        <input type="hidden" name="music_id" value="{{$song->id}}"/>
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}"/>
                        <button>
                            <i class="fa-solid fa-heart text-[20px] @if($favorite === null) text-gray-200 @else text-red-200 @endif" id="favorite"></i>
                        </button>
                    </form>
                @endif
            @endauth
            <a href="/Dashboard/download/{{$song->song}}">
                <i class="fa-regular fa-circle-down text-[20px] text-gray-200"></i>
            </a>
            @auth
                @if(auth()->user()->role === 1)
                    <i class="fa-solid fa-user-plus text-[20px] text-gray-200" id="addWriter_btn"></i>
                @endif
            @endauth
        </div>
    </div>
    @if (!count($comments))
    <div class="width flex justify-center items-center p-5 text-[30px] text-white">
        no available comments
    </div>
    @else
    <div class="mt-2 p-10" id="comments-container">
        @foreach ($comments as $comment)
            <p class="text-gray-500 text-[25px]">
                <span>{{$comment->comment}}</span>
                <span class="text-[10px]">. {{$comment->username}}</span>
                @auth
                    @if(auth()->user()->id === $comment->client_id || auth()->user()->role === 1)
                        <form class="inline" method="GET" action="/Dashboard/deleteComment/{{$comment->id}}">
                            <button class="underline text-red-500 text-[10px]">delete</button>
                        </form>
                    @endif
                @endauth
            </p>
        @endforeach
    </div>
    @endif
    <audio src="{{ asset('storage/songs/audios/' . $song->song) }}" id="audio"></audio>
    @auth
     @if(auth()->user()->role === 0)
        <form class="border-dotted flex flex-col w-fit pl-10 gap-5 mb-[80px]" id="comment_form">
            @csrf
            <input type="text" name="comment" class="w-[300px] p-4 rounded-md comment" placeholder="comment"/>
            <input type="hidden" name="song_id" value="{{$song->id}}"/>
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}"/>
            <button class="bg-green-500 rounded-md p-2 text-white text-[13px]">add new comment</button>
        </form>
     @endif
    @endauth
    <x-musicPlayer :song="$song"/>
</div>
@vite("resources/js/playMusic.js")
@vite("resources/js/addWriter.js")
@vite("resources/js/addComment.js")
@vite("resources/js/toggleFavorite.js")
<x-footer />