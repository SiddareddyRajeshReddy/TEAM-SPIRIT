const btn = document.querySelector(".btn");
const btn2 = document.querySelector(".btn2");
const div = document.querySelector(".custom-confirm");
const gri = document.querySelectorAll('.gr');
btn.addEventListener("click", (e)=>{
    div.classList.toggle("vis");
    gri.forEach(element => {
        element.classList.toggle("vis");
    });
    btn.classList.toggle('vis');
})
btn2.addEventListener("click", (e)=>{
    div.classList.toggle("vis");
    gri.forEach(element => {
        element.classList.toggle("vis");
    });
    btn.classList.toggle('vis');
})
