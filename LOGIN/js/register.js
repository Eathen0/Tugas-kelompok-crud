const inputFoto = document.getElementById('input-foto');
document.getElementById('input-foto-container').onclick = () => {
   inputFoto.click()
}

inputFoto.onchange = function() {
   console.log("/lklk".slice(0, 11))
   document.getElementById('file-name').innerHTML = this.value.slice(12, this.value.length)
}