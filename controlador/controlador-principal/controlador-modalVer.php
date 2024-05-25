<?php
  @include '../../modelo/conexion.php';

  if (isset($_POST['click_btn_ver'])) {
    $id = $_POST['user_id'];
    $sql = "SELECT * FROM fichaEmpleo WHERE id = '$id'";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
      
      while ($fila = mysqli_fetch_array($resultado)) {
        $id_entrevistador = $fila['id_entrevistador'] ?? 'No ha sido asignado un entrevistador';
        echo '
        <div class="card">
        <div class="card-header">
        Ficha de Empleo #' .$fila['id'].'
        </div>
        <ul class="list-group list-group-flush">
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>Estado del proceso de seleccion:</strong>
                <span>' . $fila['proceso'] . '</span></li>
            </div>
          </div>
          <hr class="separador" />
          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>ID Postulante:</strong>
                <span>' . $fila['id'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>ID Entrevistador:</strong>
                <span>' . $id_entrevistador . '</span></li>
            </div>
          </div>
          <hr class="separador" />
          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>Sede:</strong>
              <span>' . $fila['sede'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Cargo:</strong>
              <span>' . $fila['cargoPostulante'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Fecha que postulo: </strong>
              <span>' . $fila['fecha'] . '</span></li>
            </div>
          </div>
          <hr class="separador" />
          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>Nombre:</strong>
              <span>' . $fila['nombrePostulante'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Ap. Paterno:</strong>
              <span>' . $fila['ApPaternoPostulante'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Ap. Materno:</strong>
              <span>' . $fila['ApMaternoPostulante'] . '</span></li>
            </div>
          </div>
          <hr class="separador" />
          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>Dni:</strong>
              <span>' . $fila['nroDni_Cedula'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Nacionalidad:</strong>
              <span>' . $fila['Nacionalidad'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Fecha nacimiento:</strong>
              <span>' . $fila['fechaNacimiento'] . '</span></li>
            </div>
          </div>
          <hr class="separador" />
          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>Estado Civil:</strong>
              <span>' . $fila['EstadoCivil'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Edad:</strong>
              <span>' . $fila['Edad'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Numero de hijos:</strong>
              <span>' . $fila['nroHijos'] . '</span></li>
            </div>
          </div>
          <hr class="separador" />
          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>Direccion:</strong>
              <span>' . $fila['direccion'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Distrito:</strong>
              <span>' . $fila['distrito'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Ciudad:</strong>
              <span>' . $fila['ciudad'] . '</span></li>
            </div>
          </div>
          <hr class="separador" />
          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>Celular:</strong>
              <span>' . $fila['celular'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Correo:</strong>
              <span>' . $fila['correo'] . '</span></li>
            </div>
          </div>
          <hr class="separador" />
          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>Estudios:</strong>
              <span>' . $fila['estudios'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Fuente del trabajo:</strong>
              <span>' . $fila['fuente_trabajo'] . '</span></li>
            </div>
          </div>
          <hr class="separador" />
          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>Cualidad positiva A:</strong>
              <span>' . $fila['cualidadPositiva_a'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Cualidad positiva B:</strong>
              <span>' . $fila['cualidadPositiva_b'] . '</span></li>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-12">
            <li class="list-group-item"><strong>Cualidad negativa A:</strong>
              <span>' . $fila['cualidadNegativa_a'] . '</span></li>
            </div>
            <div class="col-12">
            <li class="list-group-item"><strong>Cualidad negativa B:</strong>
              <span>' . $fila['cualidadNegativa_b'] . '</span></li>
            </div>
          </div> 
          </div>  
          </ul>                               
          ';
      }
    }
  }
?>