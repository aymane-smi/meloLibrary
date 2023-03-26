window.onload = ()=>{
    const categories = document.querySelectorAll(".category-bg");

    for(let category of categories){
        fetch("http://localhost:8000/api/randomColor").then((res)=>res.json()).then((data)=>{
            console.log(data);
            category.classList.add(`bg-[${data.code}]`);
        });
    }
}