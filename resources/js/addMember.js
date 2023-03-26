const close = document.querySelector("#close-addMember");
const form = document.querySelector("#addMember_form");
const name_add_err = document.querySelector("#name_add_err");
const open_members = document.querySelectorAll(".addMember_btn");
const addMember_model = document.querySelector("#addMember-form");
const name = document.querySelector("#name");
const band_id = document.querySelector("#band_id");

//fonctionality

const clearAll = ()=>{
    name.value="";
    name_add_err.innerText = "";
}

const clearErrors = ()=>{
    name_add_err.innerText = "";
}
for(let open of open_members){
    open.addEventListener("click", ()=>{
        addMember_model.classList.remove("hidden");
        addMember_model.classList.add("flex");
        band_id.value = open.id;
    });
}

close.addEventListener("click", ()=>{
    addMember_model.classList.remove("flex");
    addMember_model.classList.add("hidden");
    clearInputs();
});


form.addEventListener("submit", async(e)=>{
    e.preventDefault();
    clearErrors();
    let formData = new FormData(e.target);
    let res = await fetch("http://localhost:8000/api/addMember", {
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
            name_add_err.innerText = errors.full_name[0];
    }
});