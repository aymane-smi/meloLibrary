const songPlay = document.querySelector("#song-play");
const audio = document.querySelector("#audio");
const timer = document.querySelector(".timer");
const music_range = document.querySelector("#music_range");
const volume = document.querySelector("#volume");
const volume_icon = document.querySelector("#volume-icon");
let state = false;
music_range.max = audio.duration;
music_range.value = 0;
songPlay.addEventListener("click", (e)=>{
    if(!state){
        audio.play();
        state = !state;
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