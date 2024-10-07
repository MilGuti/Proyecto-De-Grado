const wrapper = document.querySelector('.InicioSesion');
const loginLink = document.querySelector('.login-link');
const loginALink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('.icon-close');

loginALink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});


loginLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});

btnPopup.addEventListener('click', ()=> {
    wrapper.classList.add('active-popup');
});

iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
});

var splide = new Splide( '.splide', {
    type    : 'loop',
    perPage : 3,
    autoplay: true,
  } );
  
  splide.mount();