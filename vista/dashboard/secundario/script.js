document.addEventListener("DOMContentLoaded", function() {
    let menutoggle = document.querySelector(".menutoggle");
    let barhamburger = document.querySelector(".fa-bars");
    let closemenu = document.querySelector(".close");
    let sidebar = document.querySelector(".bg-sidebar");

    // Función para mostrar/ocultar la barra lateral
    function toggleSidebar() {
        sidebar.classList.toggle("hidden-sidebar");
        menutoggle.classList.toggle("fa-rotate-270");
        sidebar.classList.remove("hidden-sidebar-mobile");
    }

    // Event listener para el botón de menú
    menutoggle.addEventListener("click", toggleSidebar);

    // Event listener para el botón de hamburguesa
    barhamburger.addEventListener("click", function() {
        sidebar.classList.remove("hidden-sidebar-mobile");
    });

    // Event listener para el botón de cerrar menú
    closemenu.addEventListener("click", function() {
        sidebar.classList.add("hidden-sidebar-mobile");
    });
});

//QUE LA FECHA DE HOY SE ESTABLEZCA POR DEFECTO AL INPUT DE FECHA FIN
document.addEventListener("DOMContentLoaded", function() {
    // Obtener el input de fecha
    const fechaInput = document.getElementById("fechaFin");

    // Obtener la fecha actual en formato YYYY-MM-DD
    const fechaActual = new Date().toISOString().split('T')[0];

    // Establecer la fecha actual como el valor predeterminado del input
    fechaInput.value = fechaActual;
});