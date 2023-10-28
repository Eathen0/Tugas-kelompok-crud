const navbar = document.querySelector('nav');
const next = document.querySelector('button');
const imgSlide = document.querySelector('.image-slide-container');

window.addEventListener('scroll', windowEventHanddle);
document.addEventListener('DOMContentLoaded', windowEventHanddle);
document.addEventListener('unload', windowEventHanddle);

function windowEventHanddle() {
   if (window.scrollY == 0) {
      navbar.className = 'navOn'
   } else {
      navbar.className = ''
   }
}

next.addEventListener('click', () => {
   
})