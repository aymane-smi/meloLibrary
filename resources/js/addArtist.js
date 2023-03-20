const close = document.querySelector("#close-addArtist");
const form = document.querySelector("#addArtist_form");
const name_add_err = document.querySelector("#name_add_err");
const country_add_err = document.querySelector("#country_add_err");
const birthday_add_err = document.querySelector("#birthday_add_err");
const image_add_err = document.querySelector("#image_add_err");
const open = document.querySelector("#addArtist_btn");
const addArtist_model = document.querySelector("#addArtists-form");
const name = document.querySelector("#name");
const country = document.querySelector("#country");
const birthday = document.querySelector("#birthday");
const image = document.querySelector("#image");
const band = document.querySelector("#name");

//fonctionality

const clearAll = ()=>{
    name.value="";
    country.value="";
    birthday.value="";
    band.selectedIndex = -1;
    image.value = "";
    name_add_err.innerText = "";
    country_add_err.innerText = "";
    image_add_err.innerText = "";
    birthday_add_err.innerText = "";
}

const clearErrors = ()=>{
    name_add_err.innerText = "";
    country_add_err.innerText = "";
    image_add_err.innerText = "";
    birthday_add_err.innerText = "";
}

open.addEventListener("click", ()=>{
    addArtist_model.classList.remove("hidden");
    addArtist_model.classList.add("flex");
});

close.addEventListener("click", ()=>{
    addArtist_model.classList.remove("flex");
    addArtist_model.classList.add("hidden");
    clearInputs();
});


form.addEventListener("submit", async(e)=>{
    e.preventDefault();
    clearErrors();
    let formData = new FormData(e.target);
    let res = await fetch("http://localhost:8000/api/addArtist", {
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
        if(errors.hasOwnProperty("name"))
            name_add_err.innerText = errors.name[0];
        if(errors.hasOwnProperty("country"))
            country_add_err.innerText = errors.country[0];
        if(errors.hasOwnProperty("birthday"))
            birthday_add_err.innerText = errors.birthday[0];
        if(errors.hasOwnProperty("image"))
            image_add_err.innerText = errors.artist_image[0];
    }
});