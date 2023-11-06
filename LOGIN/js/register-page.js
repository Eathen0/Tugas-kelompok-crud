const inputFoto = document.getElementById("input-foto");
const imgPreview = document.querySelector(".img-preview");

window.addEventListener('DOMContentLoaded', () => inputFoto.value = '');
window.addEventListener('unload', () => inputFoto.value = '');

if (inputFoto) {
   document.getElementById("input-foto-container").onclick = () => {
      inputFoto.click();
   };
      
   inputFoto.onchange = function () {
      if (this.value.length != 0) {
         const imgInput = this.files[0];
         const reader = new FileReader();

         if (imgInput) {
            reader.readAsDataURL(imgInput);
            reader.onload = function (ev) {
               imgPreview.src = reader.result;
            }
         };

         imgPreview.classList.add("img-exist");
      } else {
         imgPreview.classList.remove("img-exist");
      }
   }
}