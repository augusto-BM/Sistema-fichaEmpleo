document.addEventListener("DOMContentLoaded", function () {
  const cloud = document.getElementById("cloud");
  const barraLateral = document.querySelector(".barra-lateral");
  const spans = document.querySelectorAll("span");
  const palanca = document.querySelector(".switch");
  const circulo = document.querySelector(".circulo");
  const menu = document.querySelector(".menu");
  const main = document.querySelector("main");

  menu.addEventListener("click", () => {
    barraLateral.classList.toggle("max-barra-lateral");
    if (barraLateral.classList.contains("max-barra-lateral")) {
      menu.children[0].style.display = "none";
      menu.children[1].style.display = "block";
    } else {
      menu.children[0].style.display = "block";
      menu.children[1].style.display = "none";
    }
    if (window.innerWidth <= 320) {
      barraLateral.classList.add("mini-barra-lateral");
      main.classList.add("min-main");
      spans.forEach((span) => {
        span.classList.add("oculto");
      });
    }
  });

  palanca.addEventListener("click", () => {
    let body = document.body;
    body.classList.toggle("dark-mode");
    body.classList.toggle("");
    circulo.classList.toggle("prendido");
  });

  cloud.addEventListener("click", () => {
    barraLateral.classList.toggle("mini-barra-lateral");
    main.classList.toggle("min-main");
    spans.forEach((span) => {
      span.classList.toggle("oculto");
    });
  });
});

//QUE LA FECHA DE HOY SE ESTABLEZCA POR DEFECTO AL INPUT DE FECHA FIN
document.addEventListener("DOMContentLoaded", function () {
    // Obtener el input de fecha
    const fechaInput = document.getElementById("fechaFin");
  
    // Obtener la fecha actual en formato YYYY-MM-DD en el huso horario UTC
    const fechaActual = new Date(
      Date.UTC(
        new Date().getFullYear(),
        new Date().getMonth(),
        new Date().getDate()
      )
    );
  
    // Convertir la fecha actual en formato YYYY-MM-DD
    const fechaActualString = fechaActual.toISOString().split("T")[0];
  
    // Establecer el valor predeterminado del input como la fecha actual
    fechaInput.value = fechaActualString;
  });