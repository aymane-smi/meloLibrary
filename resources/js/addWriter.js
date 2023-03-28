const close = document.querySelector("#close-addWriter");
const form = document.querySelector("#addWriter_form");
const name_add_err = document.querySelector("#name_add_err");
const open = document.querySelector("#addWriter_btn");
const addWriter_model = document.querySelector("#addWriter-form");
const name = document.querySelector("#name");

//fonctionality

const clearAll = ()=>{
    name.value="";
    name_add_err.innerText = "";
}

const clearErrors = ()=>{
    name_add_err.innerText = "";
}

open.addEventListener("click", ()=>{
    addWriter_model.classList.remove("hidden");
    addWriter_model.classList.add("flex");
});

close.addEventListener("click", ()=>{
    addWriter_model.classList.remove("flex");
    addWriter_model.classList.add("hidden");
    clearInputs();
});


form.addEventListener("submit", async(e)=>{
    e.preventDefault();
    clearErrors();
    let formData = new FormData(e.target);
    let res = await fetch("http://localhost:8000/api/addWriter", {
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
        if(errors.hasOwnProperty("full_name"))
            name_add_err.innerText = errors.full_name[0];
    }
});