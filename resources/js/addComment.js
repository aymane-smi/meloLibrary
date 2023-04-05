const comment_form = document.querySelector("#comment_form");
const comments_container = document.querySelector("#comments-container");
const comment = document.querySelector(".comment");

comment_form.addEventListener("submit" , (e)=>{
    e.preventDefault();
    let formData = new FormData(e.target);
    fetch("http://localhost:8000/api/addComment", {
        method: "post",
        body: formData,
    }).then((res)=>res.json()).then((data)=>{
        comment.value="";
        let div = document.createElement("div");
        div.innerHTML = `
        <p class="text-gray-500 text-[25px]">
            <span>${data.comment}</span>
            <span class="text-[10px]">. ${data.username}</span>
        </p>
        `;
        comments_container.appendChild(div);
    }).catch((e)=>{
        console.log(e);
    });
});