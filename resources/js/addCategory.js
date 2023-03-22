const close = document.querySelector("#close-addCategory");
const form = document.querySelector("#addCategory_form");
const name_add_err = document.querySelector("#name_add_err");
const open = document.querySelector("#addCategory_btn");
const addCategory_model = document.querySelector("#addCategory-form");
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
    addCategory_model.classList.remove("hidden");
    addCategory_model.classList.add("flex");
});

close.addEventListener("click", ()=>{
    addCategory_model.classList.remove("flex");
    addCategory_model.classList.add("hidden");
    clearInputs();
});


form.addEventListener("submit", async(e)=>{
    e.preventDefault();
    clearErrors();
    let formData = new FormData(e.target);
    let res = await fetch("http://localhost:8000/api/addCategory", {
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
    }
});