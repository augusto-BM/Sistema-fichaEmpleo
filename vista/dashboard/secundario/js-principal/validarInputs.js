/* *********** FUNCION PARA VALIDAR EL IMPUT TRANSFORMA PRIMERA LETRA MAYUSCULA***********/
function primeraLetraMayuscula(e) {
    e.value = e.value.replace(/^\s+/, '');                        // Elimina los espacios al inicio
    e.value = e.value.replace(/ {1,}/g, ' ');                     // Solo deja un espacio entre palabras
    e.value = e.value.toLowerCase();                              // Convierte todo el texto a minúsculas
    e.value = e.value.charAt(0).toUpperCase() + e.value.slice(1); // Convierte la primera letra a mayúscula
  }
  /* ************************************************************************************* */
  function validarEmpresa(e) {
    e.value = e.value.replace(/^\s+/, '');                        // Elimina los espacios al inicio
    e.value = e.value.replace(/ {1,}/g, ' ');                     // Solo deja un espacio entre palabras
    e.value = e.value.toUpperCase();                              // Convierte todo el texto a mayuscula
  }
  function validarNombre(e) {
    e.value = e.value.replace(/^\s+/, '');                        // Elimina los espacios al inicio
    e.value = e.value.replace(/ {1,}/g, ' ');                     // Solo deja un espacio entre palabras
    e.value = e.value.toLowerCase();                              // Convierte todo el texto a minúsculas
    e.value = e.value.replace(/\b\w/g, function(l){ return l.toUpperCase() });  // Convierte la primera letra de cada palabra a mayúscula
  }
  /* *********** FUNCION PARA VALIDAR EL (APELLIDO) sin espacio Y primera letra mayuscula**********/
  function validarApellido(e) {
    e.value = e.value.replace(/^\s+/, '');                          // Elimina los espacios al inicio
    e.value = e.value.replace(/\s/g, '');                           //No deja poner espacios entre palabras
    e.value = e.value.toLowerCase();                                // Convierte todo el texto a minúsculas
    e.value = e.value.charAt(0).toUpperCase() + e.value.slice(1);   // Convierte la primera letra a mayúscula
  }
  /* ************************************************************************************* */
  /* *********** FUNCION PARA VALIDAR EL (CORREO) sin espacio al incio y final **********/
  function validarCorreo(e) {
    if (e.value.slice(-1) === ' ') {                        // Si el último carácter es un espacio
      e.value = e.value.trim();                             // Elimina los espacios al inicio y al final
      e.value = e.value.replace(/\s/g, '');                 // Elimina los espacios en medio
    }
  }
  /* ************************************************************************************* */
  
  /* *********** FUNCION PARA VALIDAR EL IMPUT SOLO SE PUEDE ESCRIBIR NUMEROS ***********/
  function soloNumeros(input) {
    input.value = input.value.replace(/[^\d]/g, '');
  }
  /* ******************************************************************************** */
  
  /* *********** FUNCION PARA VALIDAR EL IMPUT SOLO SE PUEDE ESCRIBIR TEXTO ***********/
  function soloLetras(input) {
    input.value = input.value.replace(/[^a-zA-ZñÑ\s]/g, '');
  }
  /* ******************************************************************************** */
  