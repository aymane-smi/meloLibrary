const songPlay = document.querySelector("#song-play");
const audio = document.querySelector("#audio");
const timer = document.querySelector(".timer");
const music_range = document.querySelector("#music_range");
const volume = document.querySelector("#volume");
const volume_icon = document.querySelector("#volume-icon");
const player = document.querySelector("#player");
const player_state = document.querySelector(".player-state");
const player_icon = document.querySelector("#player-icon");
let state = false;
music_range.max = audio.duration;
music_range.value = 0;

player_state.addEventListener("click", ()=>{
    if(!state){
        audio.play();
        player_icon.classList.remove(...player_icon.classList);
        player_state.classList.remove(...player_state.classList);
        player_state.classList.add(...["fa-regular","fa-circle-pause","text-white","text-[20px]","player-state"])
        player_icon.classList.add(...["fa-solid","fa-pause","text-[20px]"]);
        state = !state;
    }else{
        state = !state;
        audio.pause();
        player_icon.classList.remove(...player_icon.classList);
        player_state.classList.remove(...player_state.classList);
        player_state.classList.add(...["fa-regular","fa-circle-play","text-white","text-[20px]","player-state"])
        player_icon.classList.add(...["fa-solid","fa-play","text-[20px]"]);

    }
});
songPlay.addEventListener("click", (e)=>{
    if(!state){
        audio.play();
        player_state.classList.remove(...player_state.classList);
        player_state.classList.add(...["fa-regular","fa-circle-pause","text-white","text-[20px]","player-state"])
        state = !state;
        player.classList.remove("hidden");
        player.classList.add("flex");
    }
    else{
        audio.pause();
        state = !state;
    }
});

audio.addEventListener("timeupdate", (e)=>{
    let tmp = (parseInt(e.target.currentTime/60) < 10 ? "0" : "")+ parseInt(e.target.currentTime/60)+ ":" + (parseInt(e.target.currentTime%60) < 10 ? "0" : "") +parseInt(e.target.currentTime%60)
    timer.innerText = tmp;
    music_range.value = e.target.currentTime;
});

music_range.addEventListener("input", (e)=>{
    audio.currentTime = e.target.value;
    if(state)
        audio.play();
});

volume.addEventListener("input", (e)=>{
    console.log(e.target.value);
    if(e.target.value > 60){
        volume_icon.classList.remove(...volume_icon.classList);
        volume_icon.classList.add(...["fa-solid","fa-volume-high","text-[15px]","text-white"]);
    }else if(e.target.value >= 40 || e.target.value <= 60){
        volume_icon.classList.remove(...volume_icon.classList);
        volume_icon.classList.add(...["fa-solid","fa-volume-low","text-[15px]","text-white"]);
    }else if(e.target.value < 40){
        volume_icon.classList.remove(...volume_icon.classList);
        volume_icon.classList.add(...["fa-solid","fa-volume-off","text-[15px]","text-white"]);
    }else if(e.target.value === 0){
        volume_icon.classList.remove(...volume_icon.classList);
        volume_icon.classList.add(...["fa-solid","fa-volume-xmark","text-[15px]","text-white"]);
    }
    audio.volume = parseInt(e.target.value)/ 100;
});