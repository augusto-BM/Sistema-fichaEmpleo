function activarDesdeModal(btn) {
    console.log('Botón de activación presionado');
    cambiarEstadoDesactivado(btn, 'Seleccionado');
}

function cambiarEstadoDesactivado(btn, nuevoEstado) {
    console.log('Cambiando estado a:', nuevoEstado);

    var table = $('#mytablaDesacivos').DataTable(); // Obtén la instancia de DataTables
    var row = $(btn).closest('tr'); // Encuentra la fila que contiene el botón

    // Actualiza el texto y el color del botón
    if (nuevoEstado === 'Postulante') {
        btn.classList.remove("btn-danger");
        btn.classList.add("btn-success");
        btn.textContent = "Seleccionado";
    }/*  else {
        btn.classList.remove("btn-success");
        btn.classList.add("btn-danger");
        btn.textContent = "No seleccionado";
    } */

    // Actualiza el atributo personalizado 'data-estado' del botón
    btn.setAttribute("data-estado", nuevoEstado);

    // Envía una solicitud AJAX al servidor para actualizar el estado en la base de datos
    var id = btn.getAttribute("data-id"); // supongamos que el botón tiene un atributo data-id que almacena el ID correspondiente en la base de datos
    console.log('ID obtenido del botón:', id); // Agregado para depuración

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../controlador/controlador-principal/controlador-estadoPostulante.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log('Respuesta del servidor:', xhr.responseText);

            // Si el nuevo estado es 'inactivo', elimina la fila de la tabla
            if (nuevoEstado === 'No seleccionado') {
                console.log('Eliminando fila para estado inactivo');
                table.row(row).remove().draw();
            } else if (nuevoEstado === 'Seleccionado') {
                console.log('Eliminando fila para estado activo');
                table.row(row).remove().draw();
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Postulante a sido cambiado a seleccionado",
                    showConfirmButton: false,
                    timer: 1500,
                });

            }
            // Si el nuevo estado es 'inactivo', elimina la fila de la tabla
            /* if (nuevoEstado === 'inactivo') {
                table.row(row).remove().draw();
            } else if (nuevoEstado === 'activo') {
                table.row(row).remove().draw();
            } */
        }
    };
    console.log('Enviando solicitud al servidor con id y estado:', id, nuevoEstado);
    xhr.send("id=" + id + "&estado=" + nuevoEstado);
}