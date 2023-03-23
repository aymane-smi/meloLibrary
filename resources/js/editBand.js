const close_edit = document.querySelector("#close-editBand");
const form_edit = document.querySelector("#editBand_form");
const name_edit_err = document.querySelector("#name_edit_err");
const country_edit_err = document.querySelector("#country_edit_err");
const creationDate_edit_err = document.querySelector("#creationDate_edit_err");
const image_edit_err = document.querySelector("#image_edit_err");
const open_edit_btns = document.querySelectorAll(".editBand_btn");
const editBand_model = document.querySelector("#editBand-form");
const name = document.querySelector("#name");
const country = document.querySelector("#country");
const creationDate = document.querySelector("#creationDate");
const image = document.querySelector("#image");
const id = document.querySelector(".id_edit");


//fonctionality

const clearAll = ()=>{
    name.value="";
    country.value="";
    creationDate.value="";
    image.value = "";
    clearErrors();
}

const clearErrors = ()=>{
    name_edit_err.innerText = "";
    country_edit_err.innerText = "";
    image_edit_err.innerText = "";
    creationDate_edit_err.innerText = "";
}

open_edit_btns.forEach((open_edit)=>{
    open_edit.addEventListener("click", async()=>{
        id.value=open_edit.id;
        const band = await fetch("http://localhost:8000/api/getBand/"+open_edit.id, {
            method: "GET",
            headers: {
                'Accept': 'application/json',
            },
        });
        const data = await band.json();
        name_edit.value=data.band.name;
        country_edit.value=data.band.country;
        creationDate_edit.value=data.band.creation_date;
        editBand_model.classList.remove("hidden");
        editBand_model.classList.add("flex");
    });
})

close_edit.addEventListener("click", ()=>{
    editBand_model.classList.remove("flex");
    editBand_model.classList.add("hidden");
    clearAll();
});


form_edit.addEventListener("submit", async(e)=>{
    e.preventDefault();
    clearErrors();

    let formData = new FormData(e.target);
    let res = await fetch("http://localhost:8000/api/updateBand", {
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
        if(errors.hasOwnProperty("creationDate"))
            creationDate_edit_err.innerText = errors.creationDate[0];
        if(errors.hasOwnProperty("image"))
            image_edit_err.innerText = errors.band_image[0];
    }
});