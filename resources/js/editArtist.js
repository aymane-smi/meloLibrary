const step1_e = document.querySelector("#step1-edit");
const step2_e = document.querySelector("#step2-edit");
const next_e = document.querySelector("#next-edit");
const edit_form = document.querySelector("#edit-form");
next_e.addEventListener("click", ()=>{
    step1_e.classList.add("hidden");
    step2_e.classList.remove("hidden");
    next_e.classList.add("hidden");
});