const close_edit = document.querySelector("#close-editCategory");
const form_edit = document.querySelector("#editCategory_form");
const name_edit_err = document.querySelector("#name_edit_err");
const open_edit_btns = document.querySelectorAll(".editCategory_btn");
const editCategory_model = document.querySelector("#editCategory-form");
const name_edit = document.querySelector("#name_edit");
const id = document.querySelector(".id_edit");


//fonctionality

const clearAll = ()=>{
    name_edit.value="";
    clearErrors();
}

const clearErrors = ()=>{
    name_edit_err.innerText = "";
}

open_edit_btns.forEach((open_edit)=>{
    open_edit.addEventListener("click", async()=>{
        id.value=open_edit.id;
        const Category = await fetch("http://localhost:8000/api/getCategory/"+open_edit.id, {
            method: "GET",
            headers: {
                'Accept': 'application/json',
            },
        });
        const data = await Member.json();
        name_edit.value=data.Member.name;
        editMember_model.classList.remove("hidden");
        editMember_model.classList.add("flex");
        return false;
    });
})

close_edit.addEventListener("click", ()=>{
    editMember_model.classList.remove("flex");
    editMember_model.classList.add("hidden");
    clearAll();
});


form_edit.addEventListener("submit", async(e)=>{
    e.preventDefault();
    clearErrors();

    let formData = new FormData(e.target);
    let res = await fetch("http://localhost:8000/api/updateMember", {
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
            name_edit_err.innerText = errors.full_name[0];
    }
});