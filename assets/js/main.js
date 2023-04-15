let categoria = document.getElementById("dropdown");
let main = document.getElementById("main");
let opacidad = document.getElementById("opacidad");




document.querySelectorAll(".dropdown").forEach(el => {
    el.addEventListener("mouseover", e => {
      const id = e.target.getAttribute("id");
      console.log("Se ha clickeado el id "+id);
      opacidad.classList.add('negro');
    });
  });

document.querySelectorAll(".dropdown").forEach(el => {
    el.addEventListener("mouseout", e => {
      const id = e.target.getAttribute("id");
      opacidad.classList.remove('negro');
    });
  });




