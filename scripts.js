document.addEventListener("DOMContentLoaded", function() {
  var openModalBtn = document.querySelectorAll(".openModalBtn");
  var modal = document.querySelector(".modal");
  var closeModalBtn = document.querySelector(".close");
  
 openModalBtn.forEach(function(img) {
    img.addEventListener("click", function() {
      modal.style.display = "block";
      img.style.backgroundColor = 'red'; 
    });
  });
  
  closeModalBtn.addEventListener("click", function() {
    modal.style.display = "none";
  });

  window.addEventListener("click", function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
      
    }
  });
});
