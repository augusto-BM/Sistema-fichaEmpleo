function cambiarEstado(btn) {
    var nuevoEstado;
    if (btn.classList.contains("btn-success")) {
        btn.classList.remove("btn-success");
        btn.classList.add("btn-danger");
        btn.textContent = "Inactivo";
        nuevoEstado = "inactivo";
    } else {
        btn.classList.remove("btn-danger");
        btn.classList.add("btn-success");
        btn.textContent = "Activo";
        nuevoEstado = "activo";
    }

    // Envía una solicitud AJAX al servidor para actualizar el estado en la base de datos
    var id = btn.getAttribute("data-id"); // supongamos que el botón tiene un atributo data-id que almacena el ID correspondiente en la base de datos
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../../../controlador/controlador-principal/controlador-estadoCuenta.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText); // puedes mostrar alguna respuesta del servidor en la consola para depurar
            // Si el nuevo estado es 'inactivo', elimina la fila de la tabla
            if (nuevoEstado === 'inactivo') {
                var table = $('#myTable').DataTable();
                var row = $(btn).closest('tr');
                table.row(row).remove().draw();
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Cuenta ha sido desactivado",
                    showConfirmButton: false,
                    timer: 1500,
                });
            } else if (nuevoEstado === 'activo') {
                var table1 = $('#myTable2').DataTable();
                var row = $(btn).closest('tr');
                table1.row(row).remove().draw();
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Cuenta ha sido activado",
                    showConfirmButton: false,
                    timer: 1500,
                });
            }
        }
    };
    xhr.send("id=" + id + "&estado=" + nuevoEstado);
}