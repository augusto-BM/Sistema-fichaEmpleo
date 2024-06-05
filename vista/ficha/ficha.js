/* **************** FUNCION PARA VALIDAR CAMPOS DEL FORMULARIO *****************/
document
  .getElementById("formulario")
  .addEventListener("submit", function (event) {
    // Validación todos los inputs no pueden estar vacios
    var formulario = event.target;
    var inputs = formulario.querySelectorAll("input");
    var errores = {};

    inputs.forEach(function (input) {
      if (input.value.trim() === "") {
        errores[input.name] = input.placeholder;
      }
    });

    if (Object.keys(errores).length > 0) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "El campo " + Object.keys(errores)[0] + " no puede estar vacio.",
      });
      event.preventDefault();
      return;
    }

    // Validación del campo de nombres
    var nombresInput = document.getElementById("nombres").value;
    // Expresión regular para nombres válidos
    var nombresRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/;
    if (!nombresRegex.test(nombresInput)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa un nombre válido!",
      });
      event.preventDefault();
      return;
    }

    // Validación del campo de apellido paterno
    var apellidoPaternoInput =
      document.getElementById("apellido-paterno").value;
    // Expresión regular para apellido paterno válido
    var apellidoPaternoRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/; // Expresión regular para apellido paterno válido
    if (
      apellidoPaternoInput.length < 2 ||
      !apellidoPaternoRegex.test(apellidoPaternoInput)
    ) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa un apellido paterno válido!",
      });
      event.preventDefault();
      return;
    }

    // Validación del campo de apellido materno
    var apellidoMaternoInput =
      document.getElementById("apellido-materno").value;
    var apellidoMaternoRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/; // Expresión regular para apellido materno válido
    if (
      apellidoMaternoInput.length < 2 ||
      !apellidoMaternoRegex.test(apellidoMaternoInput)
    ) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa un apellido materno válido!",
      });
      event.preventDefault();
      return;
    }

    // Validación del campo de DNI/Cédula
    var dniInput = document.getElementById("dni").value;
    var dniRegex = /^[0-9]{8}$/; // Expresión regular para un DNI de 8 dígitos
    if (!dniRegex.test(dniInput)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa un DNI válido de 8 dígitos numéricos!",
      });
      event.preventDefault();
      return;
    }

    //VALIDACIÓN DEL CAMPO DE FECHA DE NACIMIENTO
    /* ******************************************************************************** */
    var fechaNacimientoInput =
      document.getElementById("fecha-nacimiento").value;

    // Verificar si el campo de fecha de nacimiento está vacío
    if (!fechaNacimientoInput) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor, ingresa tu fecha de nacimiento.",
      });
      event.preventDefault();
      return;
    }

    // Convertir la fecha de nacimiento a un objeto Date
    var fechaNacimiento = new Date(fechaNacimientoInput);

    // Calcular la fecha actual
    var fechaActual = new Date();

    //Verificar si la fecha de nacimiento es mayor que la fecha actual
    if (fechaNacimiento > fechaActual) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "La fecha de nacimiento no puede ser mayor que la fecha actual.",
      });
      event.preventDefault();
      return;
    }

    // Calcular la edad del usuario
    var edad = fechaActual.getFullYear() - fechaNacimiento.getFullYear();
    var mesActual = fechaActual.getMonth();
    var mesNacimiento = fechaNacimiento.getMonth();

    // Si el mes actual es menor que el mes de nacimiento o si es el mismo mes pero el día actual es menor que el día de nacimiento, resta un año
    if (
      mesActual < mesNacimiento ||
      (mesActual === mesNacimiento &&
        fechaActual.getDate() < fechaNacimiento.getDate())
    ) {
      edad--;
    }

    // Verificar si la edad es menor que 18 años
    if (edad < 18) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Debes tener al menos 18 años para registrarte.",
      });
      event.preventDefault();
      return;
    }
    /* ******************************************************************************** */
    // Validación del campo de celular
    var celularInput = document.getElementById("celular").value;
    var celularRegex = /^[0-9]{9}$/; // Expresión regular para un número de celular de 9 dígitos
    if (!celularRegex.test(celularInput)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa un número de celular válido de 9 dígitos numéricos!",
      });
      event.preventDefault();
      return;
    }

    // Validación del campo de correo electrónico
    var correoInput = document.getElementById("correo").value;
    var correoRegex = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/; // Expresión regular para un correo electrónico válido
    if (!correoRegex.test(correoInput)) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa un correo electrónico válido!",
      });
      event.preventDefault();
      return;
    }

    // Validación del campo de dirección
    var direccionInput = document.getElementById("direccion").value;
    // Validar la longitud mínima de caracteres de dirección
    if (direccionInput.length < 2) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa una dirección válida!",
      });
      event.preventDefault();
      return;
    }

    var ciudadInput = document.getElementById("ciudad").value;
    var ciudadRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/; //Expresión regular para ciudad válida
    if (ciudadInput.length < 2 || !ciudadRegex.test(ciudadInput)) {
      // Validar la longitud mínima de caracteres de ciudad y las expresiones regulares
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa una ciudad válida!",
      });
      event.preventDefault();
      return;
    }

    var empresa_experienciaInput = document.getElementById(
      "empresa_experiencia"
    ).value;
    // Validar la longitud mínima de caracteres de empresa previa
    if (empresa_experienciaInput.length < 1) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa una empresa válida!",
      });
      event.preventDefault();
      return;
    }

    var cargo_experienciaInput =
      document.getElementById("cargo_experiencia").value;
    // Validar la longitud mínima de caracteres de cargo previo
    if (cargo_experienciaInput.length < 1) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor ingresa un cargo válido!",
      });
      event.preventDefault();
      return;
    }

    //Validación de la fecha de inicio del cargo
    var fechaCargoDesdeInput =
      document.getElementById("fecha_cargo_desde").value;

    // Verificar si el campo de fecha está vacío
    if (!fechaCargoDesdeInput) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor, ingresa la fecha de inicio del cargo.",
      });
      event.preventDefault();
      return;
    }

    //Validación de la fecha de fin de cargo
    var fechaCargoHastaInput =
      document.getElementById("fecha_cargo_hasta").value;

    // Verificar si el campo de fecha está vacío
    if (!fechaCargoHastaInput) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Por favor, ingresa la fecha de fin del cargo.",
      });
      event.preventDefault();
      return;
    }

    // Convertir la fecha de fin del cargo a un objeto Date
    var fechaCargoHasta = new Date(fechaCargoHastaInput + "-01"); // Se añade "-01" para tener el primer día del mes

    // Calcular la fecha actual
    var fechaActual = new Date();

    // Verificar si la fecha de fin del cargo es mayor que la fecha de hoy
    if (fechaCargoHasta > fechaActual) {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "La fecha de fin del cargo no puede ser mayor que la fecha actual.",
      });
      event.preventDefault();
      return;
    }
    function validarEstudios() {
      var estudiosInput = document.getElementById("estudios").value;
      // Validar si el campo de estudios está vacío cuando se selecciona "Si estudio"
      if (si_estudioRadio.checked && !estudiosInput.trim()) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Por favor, detalla qué estás estudiando.",
        });
        estudiosInput.focus();
        return false; // Para prevenir más acciones si hay errores
      }
      return true; // Si no hay errores, devolver verdadero
    }

    // Agregar un evento de escucha al cambio en el radio button "Si estudio"
    si_estudioRadio.addEventListener("change", function () {
      validarEstudios();
    });

    //Validación de campo de cualidades
    var cualidadesInputs = document.querySelectorAll(".cualidades");

    // Iterar sobre cada campo de texto
    for (var i = 0; i < cualidadesInputs.length; i++) {
      var input = cualidadesInputs[i];
      var valor = input.value.trim(); // Obtener el valor del campo y eliminar espacios en blanco al principio y al final

      // Verificar si el campo de texto está vacío
      if (valor === "") {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Por favor, completa todos los campos de texto de cualidades.",
        });
        event.preventDefault();
        return;
      }
    }
  });
/* ******************************************************************************** */

/* *********** FUNCION PARA VALIDAR EL IMPUT SOLO SE PUEDE ESCRIBIR NUMEROS ***********/
function soloNumeros(event) {
  const charCode = event.which ? event.which : event.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}
/* ******************************************************************************** */

/* *********** FUNCION PARA VALIDAR EL IMPUT SOLO SE PUEDE ESCRIBIR TEXTO ***********/
function soloLetras(event) {
  const charCode = event.which ? event.which : event.keyCode;
  const charCodeLatin1 = event.charCode;
  if (
    (charCode < 65 || charCode > 90) &&
    (charCode < 97 || charCode > 122) &&
    (charCode < 160 || charCode > 159) &&
    charCode !== 32 &&
    (charCodeLatin1 < 161 || charCodeLatin1 > 172) &&
    charCodeLatin1 !== 241 &&
    charCode !== 193 &&
    charCode !== 205 &&
    charCode !== 225 &&
    charCode !== 233 &&
    charCode !== 237 &&
    charCode !== 243
  ) {
    return false;
  }
  return true;
}
/* ******************************************************************************** */

/* ************* FUNCION PARA VALIDAR Y ESTABLECER LA FECHA DE HOY *****************/
document.addEventListener("DOMContentLoaded", function () {
  // Obtener el input de fecha
  const fechaInput = document.getElementById("fecha-hoy");

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

/* ******************************************************************************** */

/* *********** FUNCION PARA VALIDAR EL RADIO BUTTON DE NUMERO DE HIJOS */
const noHijosRadio = document.getElementById("no_Hijos");
const siHijosRadio = document.getElementById("si_Hijos");
const hijosSelect = document.getElementById("hijosSelect");
const selectDiv = document.querySelector(".tercera-seccion .col-md-8");
const radioDivs = document.querySelectorAll(
  ".tercera-seccion .col-md-2.form-check"
);

noHijosRadio.addEventListener("change", function () {
  if (this.checked) {
    hijosSelect.disabled = true;
    hijosSelect.value = "0";
    selectDiv.style.display = "none";
    radioDivs.forEach((div) => {
      div.classList.remove("col-md-2");
      // Agrega clases para centrar los radio buttons
      div.classList.add("col-md-2", "offset-md-3");
    });
  }
});

siHijosRadio.addEventListener("change", function () {
  if (this.checked) {
    hijosSelect.disabled = false;
    hijosSelect.value = "1";
    // Muestra el div que contiene el select
    selectDiv.style.display = "block";
    radioDivs.forEach((div) => {
      div.classList.remove("offset-md-3");
      // Restaura las clases originales
      div.classList.add("col-md-2");
    });
  }
});

// Ejecuta una vez al inicio para asegurarte de que el estado inicial coincide con el radio button seleccionado
if (noHijosRadio.checked) {
  hijosSelect.disabled = true;
  hijosSelect.value = "0";
  selectDiv.style.display = "none";
  radioDivs.forEach((div) => {
    div.classList.remove("col-md-2");
    div.classList.add("col-md-2", "offset-md-3");
  });
} else {
  hijosSelect.disabled = false;
  hijosSelect.value = "1";
  selectDiv.style.display = "block";
}
/* ******************************************************************************** */

/* *********** FUNCION PARA VALIDAR EL RADIO BUTTON DE SI ESTUDIA O NO*/
const noEstudioRadio = document.getElementById("no_estudio");
const siEstudioRadio = document.getElementById("si_estudio");
const estudiosInput = document.getElementById("estudios");

noEstudioRadio.addEventListener("change", function () {
  if (this.checked) {
    // Si "No estudio" está seleccionado, desactivar el input y establecer su valor en "No"
    estudiosInput.readOnly = true;
    estudiosInput.value = "No";
  }
});

siEstudioRadio.addEventListener("change", function () {
  if (this.checked) {
    // Si "Si estudio" está seleccionado, activar el input
    estudiosInput.readOnly = false;
    estudiosInput.value = ""; // Limpiar el valor si es necesario
  }
});
/* ******************************************************************************** */

/* *********** FUNCION PARA VALIDAR EL RADIO DE TERMINOS Y CONDICIONES ***********/
const checkbox = document.getElementById("checkImportante");
const botonEnviar = document.getElementById("enviar");

checkbox.addEventListener("change", function () {
  if (this.checked) {
    botonEnviar.disabled = false;
  } else {
    botonEnviar.disabled = true;
  }
});
/* ******************************************************************************** */

/* **** FUNCION PARA ESTABLECER LA EDAD SEGUN LA FECHA DE NACIMIENTO SELECCIONAD ****/
const fechaNacimientoInput = document.querySelector(
  'input[name="fecha_nacimiento"]'
);
const edadSelect = document.querySelector('select[name="edad"]');

let years = 0;
fechaNacimientoInput.addEventListener("input", (e) => {
  const fechaNacimiento = new Date(fechaNacimientoInput.value);
  const today = new Date();
  years = today.getFullYear() - fechaNacimiento.getFullYear();
  const meses = today.getMonth() - fechaNacimiento.getMonth();
  const dias = today.getDate() - fechaNacimiento.getDate();

  if (meses < 0 || (meses === 0 && dias < 0)) {
    years--;
  }

  let edad = years + "";
  //console.log("edad:", edad);

  edadSelect.innerHTML = "";

  // Agregar opciones al select de edades
  for (let i = 18; i <= parseInt(edad); i++) {
    const option = document.createElement("option");
    option.value = i + "";
    option.text = i + "";
    edadSelect.appendChild(option);
  }

  // Seleccionar la edad correcta
  edadSelect.value = edad;
});
/* ******************************************************************************** */
