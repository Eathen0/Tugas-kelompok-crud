const inputFoto = document.getElementById("input-foto");
const imgPreview = document.querySelector(".img-preview");

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
            if (ev.type === "load") {
               imgPreview.src = reader.result;
            }
         }
      };
      imgPreview.classList.add("img-exist");
   } else {
      imgPreview.classList.remove("img-exist");
   }
};
