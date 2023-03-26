const close = document.querySelector("#close-addSong");
const form = document.querySelector("#addSong_form");
const title_add_err = document.querySelector("#title_add_err");
const image_add_err = document.querySelector("#image_add_err");
const song_add_err = document.querySelector("#song_add_err");
const open = document.querySelector("#addSong_btn");
const addSong_model = document.querySelector("#addSong-form");
const title = document.querySelector("#title");
const image = document.querySelector("#image");
const song = document.querySelector("#song");
const audio = new Audio();

//fonctionality

const clearAll = ()=>{
    title.value="";
    //band.selectedIndex = -1;
    image.value = "";
    song.value= "";
    clearErrors();
}

const clearErrors = ()=>{
    title_add_err.innerText = "";
    image_add_err.innerText = "";
    song_add_err.innerText = "";
}

open.addEventListener("click", ()=>{
    addSong_model.classList.remove("hidden");
    addSong_model.classList.add("flex");
});

close.addEventListener("click", ()=>{
    addSong_model.classList.remove("flex");
    addSong_model.classList.add("hidden");
    clearAll();
});

form.addEventListener("submit", (e)=>{
    e.preventDefault();
    clearErrors();
    let formData = new FormData(e.target);
    try{
        audio.src = window.URL.createObjectURL(song.files[0]);
        audio.addEventListener("loadedmetadata", async ()=>{
            formData.append("duration", parseInt(audio.duration/60)+ ":" + (parseInt(audio.duration%60) < 10 ? "0" : "") +parseInt(audio.duration%60));
            let res = await fetch("http://localhost:8000/api/addSong", {
            method: "POST",
            headers: {
                'Accept': 'application/json',
            },
            body: formData,
        });
        if(res.status == 200)
            window.location.reload();
        else{
            let {errors} = await res.json();
            if(errors.hasOwnProperty("title"))
                title_add_err.innerText = errors.title[0];
            if(errors.hasOwnProperty("song_image"))
                image_add_err.innerText = errors.song_image[0];
            if(errors.hasOwnProperty("song"))
                song_add_err.innerText = errors.song[0];
        }
        });
    }catch(e){
        song_add_err.innerText="song is required";
    }
});