const inputFoto = document.getElementById('input-foto');
document.getElementById('input-foto-container').onclick = () => {
   inputFoto.click();
}

inputFoto.onchange = function() {
   inputFoto.classList.toggle("img-exist", this.value.length != 0)
}