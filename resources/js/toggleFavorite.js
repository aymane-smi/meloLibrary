const favorite = document.querySelector("#favorite");
const favorite_form = document.querySelector("#favorite_form");
favorite_form.addEventListener("submit", (e)=>{
    e.preventDefault();
    if(favorite.classList.contains("text-gray-200")){
        favorite.classList.remove("text-gray-200");
        favorite.classList.add("text-red-200");
        let formData = new FormData(e.target);
        fetch("http://localhost:8000/api/addFavorite", {
            method: "POST",
            body: formData
        });
    }else{
        favorite.classList.remove("text-red-200");
        favorite.classList.add("text-gray-200");
        let formData = new FormData(e.target);
        fetch("http://localhost:8000/api/deleteFavorite", {
            method: "POST",
            body: formData
        });
    }
});