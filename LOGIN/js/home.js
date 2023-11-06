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
   if (window.innerWidth * (imgSlide.childElementCount - 1) - imgSlide.childElementCount > imgSlide.scrollLeft) {
      imgSlide.scrollTo({
         left: imgSlide.scrollLeft + window.innerWidth, 
         top: 0, 
         behavior: 'smooth'
      });
   } else {
      imgSlide.scrollTo({
         left: 0, 
         top: 0, 
         behavior: 'smooth'
      });
   }
   console.log(window.innerWidth * (imgSlide.childElementCount - 1), imgSlide.scrollLeft);
})