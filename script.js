let navbar =document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    
    SearchFrom.classList.remove('active');
    CartItem.classList.remove('active');
}

let SearchFrom =document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    SearchFrom.classList.toggle('active');
    navbar.classList.remove('active');
    CartItem.classList.remove('active');
}

let CartItem =document.querySelector('.cart-items-container');

document.querySelector('#cart-btn').onclick = () =>{
    CartItem.classList.toggle('active');
    navbar.classList.remove('active');
    SearchFrom.classList.remove('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    SearchFrom.classList.remove('active');
    CartItem.classList.remove('active');
}