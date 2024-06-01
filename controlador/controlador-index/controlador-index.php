<?php
@include './modelo/conexion.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = $_POST['password']; // No hashear la contraseña proporcionada
  
   //TIPOS DE ROLES:
   $rol_administrador = "admin";   
   $rol_intermediario = "intermediario";     
   $rol_usuario = "user";    
  

   //SENTENCIA PARA BUSCAR EL USUARIO Y CONTRASEÑA DE LA BASE DE DATOS
   $select = " SELECT 
                     login.usuario AS usuario, 
                     login.contraseña AS contraseña, 
                     rol.rol AS rol, 
                     sede.nombre_sede AS sede, 
                     sede.lugar_sede AS lugar_sede
                     
               FROM login
                        INNER JOIN rol ON login.id_rol = rol.id_rol
                        INNER JOIN sede ON login.id_sede = sede.id_sede

               WHERE usuario = '$email' AND contraseña = '$password'";

   $correo_colaborador = " SELECT * FROM login WHERE usuario = '$email'";
   $contra_colaboradoor = " SELECT * FROM login WHERE contraseña = '$password' ";

   //GUARDAMOS COMO RESULTADO LA SENTENCIA DE LA "BUSQUEDA" Y  LA "CONEXION" 
   $result = mysqli_query($conn, $select);

   $result_correo_colaborador = mysqli_query($conn, $correo_colaborador);
   $result_contra_colaborador = mysqli_query($conn, $contra_colaboradoor);
   

   //HACEMOS VALIDACIONES SI EXISTE MAS DE CERO  RESULTADOS SIGNIFICA QUE SI HAY USUARIOS EN LA BBDD
   if(mysqli_num_rows($result) > 0){

      //INGRESAMOS A LOS CAMPOS DEL RESULTADO EN ESTE CASO PERTENECE A LA TABLA LOGIN
      $row = mysqli_fetch_array($result);

      if($row['rol'] == $rol_administrador){
         $_SESSION['nombre_sesion'] = $row['sede'];
         $_SESSION['nombre_sede'] = $row['lugar_sede'];
        header('location:./vista/dashboard/principal/principal.php');

      } else if($row['rol'] == $rol_intermediario){
        $_SESSION['nombre_sesion'] = $row['sede'];
        $_SESSION['nombre_sede'] = $row['lugar_sede'];
        header('location:./vista/dashboard/secundario/secundario.php');
        
      } else if ($row['rol'] == $rol_usuario) {
         $_SESSION['nombre_sesion'] = $row['sede'];
         //$_SESSION['id_login_postulante'] = $row['id'];
         header('location:./vista/ficha/fichaEmpleos.php');
      }

   } else{
      if((trim($_POST['email']) === '') and (trim($_POST['password']) === '')){
         $error[] = 'No puede haber campos vacios!';
      }else if(trim($_POST['email']) === ''){
         $error[] = 'email no puede estar vacio!';
      }else if (!preg_match("/^[a-zA-Z0-9]{3,10}$/", $_POST['email'])){
         $error[] = 'Ha introducido un email no valido!';
      }else if ((!mysqli_num_rows($result_correo_colaborador) > 0)){
         $error[] = 'email no existente!';
      }else if(trim($_POST['password']) === ''){
         $error[] = 'Contraseña no puede estar vacio!';
      }else if (!preg_match("/^.{3,15}$/", $_POST['password'])){
         $error[] = 'Contraseña no valido!';
      }else if((!mysqli_num_rows($result_contra_colaborador) > 0)){
         $error[] = 'contraseña equivocada!';
      }
 }
}
?>
