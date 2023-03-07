const close = document.querySelector("#close-addArtist");
const form = document.querySelector("#addArtists-form");
const add = document.querySelector("#addArtist_btn");

const step1 = document.querySelector("#step1");
const step2 = document.querySelector("#step2");
const next = document.querySelector("#next");
let step = 1;

close.addEventListener("click", ()=>{
    form.classList.remove("flex");
    form.classList.add("hidden");
    next = 1;
});

add.addEventListener("click", ()=>{
    form.classList.remove("hidden");
    form.classList.add("flex");
});

next.addEventListener("click", ()=>{
    step1.classList.add("hidden");
    step2.classList.remove("hidden");
});