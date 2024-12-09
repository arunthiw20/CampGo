
let menu =document.querySelector('#menu-bar');
let header_h =document.querySelector('.header_h');

window.onscroll=()=>{
    searchBtn.classList.remove('fa-times');
    searchBar.classList.remove('active');
    menu.classList.remove('fa-times');
    header_h.classList.remove('active');
}

menu.addEventListener('click',()=>{
    menu.classList.toggle('fa-times');
    header_h.classList.toggle('active');
})
 
