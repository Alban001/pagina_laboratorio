document.addEventListener("DOMContentLoaded", function () {
  var openModalBtn = document.querySelectorAll(".openModalBtn");
  var modal = document.querySelector(".modal");
  var closeModalBtn = document.querySelector(".close");


  openModalBtn.forEach(function (img) {
    img.addEventListener("click", function () {
      modal.style.display = "block";
      openModalBtn.style.backgroundColor = "gree";
    });

  });

  closeModalBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
    if (event.target == modal) {
      modal.style.display = "none";

    }
  });


  // FUNCIÓN PARA EXTRACCION DE DATOS
  var enviar = document.getElementById('enviar')
  var code = document.getElementById('code').textContent;
  var cantidad = document.getElementById('numero')
  var precio = document.getElementById('precio')
  var des = document.getElementById('des').textContent;
  var cantidadIngresado = document.getElementById('cantidadIngresado')

  enviar.onclick = function () {
      cantidadIngresado.appendChild(cantidad)
  };
});
