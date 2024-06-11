<?php
// Iniciar sesión para trabajar con variables de sesión
session_start();

// Incluir archivo de conexión a la base de datos
@include './modelo/conexion.php';

// Verificar si se ha enviado el formulario
if(isset($_POST['submit'])){
   // Obtener el valor del campo de correo electrónico
   $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
   // Obtener el valor del campo de contraseña
   $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

   // Validar los campos de entrada
   if(empty($email) && empty($password)){
      // Si ambos campos están vacíos, mostrar mensaje de error
      $error[] = 'No puede haber campos vacíos!';
   } elseif(empty($email)){
      // Si el campo de correo electrónico está vacío, mostrar mensaje de error
      $error[] = 'Email no puede estar vacío!';
   } elseif(!preg_match("/^[a-zA-Z0-9]{3,10}$/", $email)){
      // Si el correo electrónico no coincide con el formato especificado, mostrar mensaje de error
      $error[] = 'Ha introducido un email no válido!';
   } elseif(empty($password)){
      // Si el campo de contraseña está vacío, mostrar mensaje de error
      $error[] = 'Contraseña no puede estar vacía!';
   } elseif(!preg_match("/^.{3,15}$/", $password)){
      // Si la contraseña no tiene la longitud requerida, mostrar mensaje de error
      $error[] = 'Contraseña no válida!';
   } else {
      // Escapar el correo electrónico para evitar inyección SQL
      $email = mysqli_real_escape_string($conn, $email);

      // Consulta para buscar el usuario en la base de datos
      $select = "SELECT 
                     login.usuario AS usuario, 
                     login.contraseña AS contraseña, 
                     rol.rol AS rol, 
                     sede.nombre_sede AS sede, 
                     sede.lugar_sede AS lugar_sede
                FROM login
                     INNER JOIN rol ON login.id_rol = rol.id_rol
                     INNER JOIN sede ON login.id_sede = sede.id_sede
                WHERE login.usuario = ? 
                AND login.estado = 'activo'";

      // Preparar la consulta
      $stmt = mysqli_prepare($conn, $select);
      // Asociar el parámetro del correo electrónico a la consulta
      mysqli_stmt_bind_param($stmt, "s", $email);
      // Ejecutar la consulta
      mysqli_stmt_execute($stmt);
      // Obtener el resultado de la consulta
      $result = mysqli_stmt_get_result($stmt);

      // Verificar si se encontró un usuario con el correo electrónico proporcionado
      if(mysqli_num_rows($result) > 0){
         // Obtener los datos del usuario
         $row = mysqli_fetch_array($result);
         // Obtener la contraseña almacenada
         $stored_password = $row['contraseña'];

         // Verificar si la contraseña ingresada coincide con la almacenada
         if($password === $stored_password) {
            // Establecer variables de sesión para la sesión actual
            $_SESSION['nombre_sesion'] = htmlspecialchars($row['sede'], ENT_QUOTES, 'UTF-8'); // Escapar la salida HTML
            $_SESSION['nombre_sede'] = htmlspecialchars($row['lugar_sede'], ENT_QUOTES, 'UTF-8'); // Escapar la salida HTML
            $rol = htmlspecialchars($row['rol'], ENT_QUOTES, 'UTF-8'); // Escapar la salida HTML
            // Redirigir a la página correspondiente según el rol del usuario
            switch ($rol) {
               case "admin":
                  header('location:./vista/dashboard/principal/principal.php');
                  break;
               case "intermediario":
                  header('location:./vista/dashboard/secundario/secundario.php');
                  break;
               case "user":
                  header('location:./vista/ficha/fichaEmpleos.php');
                  break;
               default:
                  break;
            }
         } else {
            // Si la contraseña no coincide, mostrar mensaje de error
            $error[] = 'Contraseña incorrecta!';
         }
      } else {
         // Si no se encontró ningún usuario con el correo electrónico proporcionado, mostrar mensaje de error
         $error[] = 'Correo incorrecto o no registrado';
      }
   }
}
?>
