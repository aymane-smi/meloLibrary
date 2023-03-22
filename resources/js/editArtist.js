const close_edit = document.querySelector("#close-editArtist");
const form_edit = document.querySelector("#editArtist_form");
const name_edit_err = document.querySelector("#name_edit_err");
const country_edit_err = document.querySelector("#country_edit_err");
const birthday_edit_err = document.querySelector("#birthday_edit_err");
const image_edit_err = document.querySelector("#image_edit_err");
const open_edit_btns = document.querySelectorAll(".editArtist_btn");
const editArtist_model = document.querySelector("#editArtists-form");
const name_edit = document.querySelector("#name_edit");
const country_edit = document.querySelector("#country_edit");
const birthday_edit = document.querySelector("#birthday_edit");
const image_edit = document.querySelector("#image_edit");
const band_edit = document.querySelector("#band_edit");
const id = document.querySelector(".id_edit");

//fonctionality

const clearAll = ()=>{
    name_edit.value="";
    country_edit.value="";
    birthday_edit.value="";
    band_edit.selectedIndex = -1;
    image_edit.value = "";
    clearErrors();
}

const clearErrors = ()=>{
    name_edit_err.innerText = "";
    country_edit_err.innerText = "";
    image_edit_err.innerText = "";
    birthday_edit_err.innerText = "";
}

open_edit_btns.forEach((open_edit)=>{
    open_edit.addEventListener("click", async()=>{
        id.value=open_edit.id;
        const artist = await fetch("http://localhost:8000/api/getArtist/"+open_edit.id, {
            method: "GET",
            headers: {
                'Accept': 'application/json',
            },
        });
        const data = await artist.json();
        name_edit.value=data.artist.name;
        country_edit.value=data.artist.country;
        birthday_edit.value=data.artist.birthday;
        editArtist_model.classList.remove("hidden");
        editArtist_model.classList.add("flex");
    });
})

close_edit.addEventListener("click", ()=>{
    editArtist_model.classList.remove("flex");
    editArtist_model.classList.add("hidden");
    clearAll();
});


form_edit.addEventListener("submit", async(e)=>{
    e.preventDefault();
    clearErrors();

    let formData = new FormData(e.target);
    let res = await fetch("http://localhost:8000/api/updateArtist", {
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
            name_edit_err.innerText = errors.name[0];
        if(errors.hasOwnProperty("country"))
            country_edit_err.innerText = errors.country[0];
        if(errors.hasOwnProperty("birthday"))
            birthday_edit_err.innerText = errors.birthday[0];
        if(errors.hasOwnProperty("image"))
            image_edit_err.innerText = errors.artist_image[0];
    }
});