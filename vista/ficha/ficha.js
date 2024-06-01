
/* **************** FUNCION PARA VALIDAR CAMPOS DEL FORMULARIO *****************/
    document.getElementById("formulario").addEventListener("submit", function(event) {
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
        var apellidoPaternoInput = document.getElementById("apellido-paterno").value;
        // Expresión regular para apellido paterno válido
        var apellidoPaternoRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/; 
        if (!apellidoPaternoRegex.test(apellidoPaternoInput)) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Por favor ingresa un apellido paterno válido!",
            });
            event.preventDefault();
            return;
        }

        // Validación del campo de apellido materno
        var apellidoMaternoInput = document.getElementById("apellido-materno").value;
        var apellidoMaternoRegex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/; // Expresión regular para apellido materno válido
        if (!apellidoMaternoRegex.test(apellidoMaternoInput)) {
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

    });
/* ******************************************************************************** */


/* ************* FUNCION PARA VALIDAR Y ESTABLECER LA FECHA DE HOY *****************/
    document.addEventListener("DOMContentLoaded", function() {
        // Obtener el input de fecha
        const fechaInput = document.getElementById("fecha-hoy");
        
        // Obtener la fecha actual en formato YYYY-MM-DD
        const fechaActual = new Date().toISOString().split('T')[0];
        
        // Establecer la fecha actual como el valor predeterminado del input
        fechaInput.value = fechaActual;
    });
/* ******************************************************************************** */

/* *********** FUNCION PARA VALIDAR EL RADIO BUTTON DE NUMERO DE HIJOS */
    const noHijosRadio = document.getElementById('no_Hijos');
    const siHijosRadio = document.getElementById('si_Hijos');
    const hijosSelect = document.getElementById('hijosSelect');
    const selectDiv = document.querySelector('.tercera-seccion .col-md-8');
    const radioDivs = document.querySelectorAll('.tercera-seccion .col-md-2.form-check');


    noHijosRadio.addEventListener('change', function() {
        if (this.checked) {
            hijosSelect.disabled = true;
            hijosSelect.value = '0';
            selectDiv.style.display = 'none';
            radioDivs.forEach(div => {
                div.classList.remove('col-md-2');
                // Agrega clases para centrar los radio buttons
                div.classList.add('col-md-2', 'offset-md-3'); 
            });
        }
    });

    siHijosRadio.addEventListener('change', function() {
        if (this.checked) {
            hijosSelect.disabled = false;
            hijosSelect.value = '1';
            // Muestra el div que contiene el select
            selectDiv.style.display = 'block'; 
            radioDivs.forEach(div => {
                div.classList.remove('offset-md-3');
                // Restaura las clases originales
                div.classList.add('col-md-2'); 
            });
        }
    });

    // Ejecuta una vez al inicio para asegurarte de que el estado inicial coincide con el radio button seleccionado
    if (noHijosRadio.checked) {
        hijosSelect.disabled = true;
        hijosSelect.value = '0';
        selectDiv.style.display = 'none';
        radioDivs.forEach(div => {
            div.classList.remove('col-md-2');
            div.classList.add('col-md-2', 'offset-md-3');
        });
    } else {
        hijosSelect.disabled = false;
        hijosSelect.value = '1';
        selectDiv.style.display = 'block';
    }
/* ******************************************************************************** */

/* *********** FUNCION PARA VALIDAR EL RADIO BUTTON DE SI ESTUDIA O NO*/
    const noEstudioRadio = document.getElementById('no_estudio');
    const siEstudioRadio = document.getElementById('si_estudio');
    const estudiosInput = document.getElementById('estudios');

    noEstudioRadio.addEventListener('change', function() {
        if (this.checked) {
            // Si "No estudio" está seleccionado, desactivar el input y establecer su valor en "No"
            estudiosInput.readOnly = true;
            estudiosInput.value = "No";
        }
    });

    siEstudioRadio.addEventListener('change', function() {
        if (this.checked) {
            // Si "Si estudio" está seleccionado, activar el input
            estudiosInput.readOnly = false;
            estudiosInput.value = ""; // Limpiar el valor si es necesario
        }
    });

/* ******************************************************************************** */

/* *********** FUNCION PARA VALIDAR EL IMPUT SOLO SE PUEDE ESCRIBIR NUMEROS ***********/
    function soloNumeros(event) {
        const charCode = (event.which) ? event.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
/* ******************************************************************************** */

/* *********** FUNCION PARA VALIDAR EL IMPUT SOLO SE PUEDE ESCRIBIR TEXTO ***********/
    function soloLetras(event) {
        const charCode = (event.which) ? event.which : event.keyCode;
        if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode !== 32) {
            return false;
        }
        return true;
    }
/* ******************************************************************************** */

/* *********** FUNCION PARA VALIDAR EL RADIO DE TERMINOS Y CONDICIONES ***********/
    const checkbox = document.getElementById('checkImportante');
    const botonEnviar = document.getElementById('enviar');

    checkbox.addEventListener('change', function() {

        if (this.checked) {
            botonEnviar.disabled = false;
        } else {
            botonEnviar.disabled = true;
        }
    });
/* ******************************************************************************** */

