const close = document.querySelector("#close-addBand");
const form = document.querySelector("#addBand_form");
const name_add_err = document.querySelector("#name_add_err");
const country_add_err = document.querySelector("#country_add_err");
const creationDate_add_err = document.querySelector("#creationDate_add_err");
const image_add_err = document.querySelector("#image_add_err");
const open = document.querySelector("#addBand_btn");
const addBand_model = document.querySelector("#addBand-form");
const name = document.querySelector("#name");
const country = document.querySelector("#country");
const creationDate = document.querySelector("#creationDate");
const image = document.querySelector("#image");

//fonctionality

const clearAll = ()=>{
    name.value="";
    country.value="";
    creationDate.value="";
    image.value = "";
    clearErrors();
}

const clearErrors = ()=>{
    name_add_err.innerText = "";
    country_add_err.innerText = "";
    image_add_err.innerText = "";
    creationDate_add_err.innerText = "";
}

open.addEventListener("click", ()=>{
    addBand_model.classList.remove("hidden");
    addBand_model.classList.add("flex");
});

close.addEventListener("click", ()=>{
    addBand_model.classList.remove("flex");
    addBand_model.classList.add("hidden");
    clearAll();
});


form.addEventListener("submit", async(e)=>{
    e.preventDefault();
    clearErrors();
    let formData = new FormData(e.target);
    let res = await fetch("http://localhost:8000/api/addBand", {
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
        if(errors.hasOwnProperty("creationDate"))
            creationDate_add_err.innerText = errors.creationDate[0];
        if(errors.hasOwnProperty("image"))
            image_add_err.innerText = errors.artist_image[0];
    }
});