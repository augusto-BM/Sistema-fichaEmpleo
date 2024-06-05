<?php
    //RECUPERAMOS EL ID PARA OBTENER EL NOMBRE DE LA EMPRESA SELECCIONADA PARA VALIDAR LOS ENTREVISTADORES QUE SOLO PERTENECEN A ESA EMPRESA
    if (isset($_GET['id_empresa'])) {

      //GUARDAMOS EL VALOR DEL ID EN UNA VARIABLE
      $idEmpresa = $_GET['id_empresa'];

      //BUSCAMOS EL NOMBRE DE LA EMPRESA SEGUN SU ID
      $sql_nombreEmpresas = "SELECT nombre_sede FROM sede WHERE id_sede = $idEmpresa";

      $result_nombreEmpresas = mysqli_query($conn, $sql_nombreEmpresas);

      if ($result_nombreEmpresas) {
        $row_nombreEmpresas = mysqli_fetch_assoc($result_nombreEmpresas);

        //OBTIENE EL VALOR DEL NOMBRE DE LA EMPRESA
        $nombreEmpresas = $row_nombreEmpresas['nombre_sede'];
      } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($conn);
      }
    } else {
      echo "No se ha proporcionado el ID de la empresa.";
    }
  ?>
<div class="modal fade" id="editar_info_postulante" tabindex="-1" aria-labelledby="editar_info_postulanteLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> <!-- modal-xl para un modal más grande -->
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-center">
        <h5 class=" modal-title " id=" editar_info_postulanteLabel">Editar Información del Postulante - <?php echo $nombreEmpresas ?></h5>
        <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <?php
      $sql_cedes = "SELECT nombre_sede FROM sede WHERE estado = 'activo' AND id_Sede > 2";
      $result = $conn->query($sql_cedes);
      ?>

      <form class="container p-5 contenedor-formulario" action="../../../controlador/controlador-principal/controlador-modalEditarEmpresaSeleccionada.php" method="POST" class="formulario" id="editarForm">
        <input type="hidden" id="user_id" name="id_postulante">

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr class="table-info">
                <th>Entrevistador:</th>
                <th>Sede:</th>
                <th>Cargo cual postula:</th>
                <th>Fecha:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <select name="entrevistador" id="entrevistador">
                    <?php
                    if ($conn->connect_error) {
                      die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Consulta para obtener los datos de los entrevistadores solo de la empresa seleccioanda
                    $sql_entrevistadores = "SELECT id_entrevistador, nombre_entrevistador FROM entrevistador WHERE estado = 'activo' AND sede = '$nombreEmpresas'";

                    $resultado_entrevistadores = mysqli_query($conn, $sql_entrevistadores);
                    if ($resultado_entrevistadores && mysqli_num_rows($resultado_entrevistadores) > 0) {
                      while ($fila_entrevistador = mysqli_fetch_assoc($resultado_entrevistadores)) {
                    ?>
                        <option value="<?php echo $fila_entrevistador['id_entrevistador']; ?>"><?php echo $fila_entrevistador['nombre_entrevistador']; ?></option>
                    <?php
                      }
                    }
                    ?>
                  </select>
                </td>
                <td>
                  <select name="sede" id="sede" class="">
                    <?php
                    // Verificar si se encontraron resultados
                    if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['nombre_sede'] . "'>" . $row['nombre_sede'] . "</option>";
                      }
                    } else {
                      echo "<option value=''>No hay sedes activas</option>";
                    }
                    ?>
                  </select>
                </td>
                <td>
                  <select name="cargo" id="cargo" class="">
                    <option value="Asesor">Asesor</option>
                    <option value="Backoffice">Backoffice</option>
                    <option value="Mantenimiento">Mantenimiento</option>
                    <option value="Recursos">Recursos</option>
                    <option value="Soporte">Soporte</option>
                  </select>
                </td>
                <td>
                  <input type="date" id="fecha-hoy" name="fecha_hoy" class="form-control" value="">
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="table-responsive">
          <table class="table  table-bordered">
            <thead>
              <tr class="table-info">
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="text" id="nombres" name="nombres" placeholder="Ingresa tu nombre" onkeypress="return soloLetras(event)">
                </td>
                <td>
                  <input type="text" id="apellido-paterno" name="apellido_paterno" placeholder="Ingresa tu apellido paterno" onkeypress="return soloLetras(event)">

                </td>
                <td>
                  <input type="text" id="apellido-materno" name="apellido_materno" placeholder="Ingresa tu apellido materno" onkeypress="return soloLetras(event)">

                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr class="table-info">
                <th>N°<br>DNI/CEDULA:</th>
                <th>Nacionalidad:</th>
                <th>Fecha de <br>Nacimiento:</th>
                <th>Estado civil /<br>compromiso:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="text" name="dni" id="dni" placeholder="Ingresa tu DNI/Cédula" onkeypress="return soloNumeros(event)">
                </td>
                <td>
                  <select name="nacionalidad" id="nacionalidad">
                    <option value="CHL">Chile</option>
                    <option value="COL">Colombia</option>
                    <option value="ECU">Ecuador</option>
                    <option value="ECU">España</option>
                    <option value="MEX">México</option>
                    <option value="PRY">Paraguay</option>
                    <option value="PER" selected>Perú</option>
                    <option value="URY">Uruguay</option>
                    <option value="VEN">Venezuela</option>
                    <option value="ARG">Argentina</option>
                    <option value="BOL">Bolivia</option>
                  </select>
                </td>
                <td>
                  <input type="date" id="fecha-nacimiento" name="fecha_nacimiento">
                </td>
                <td>
                  <select name="estado_civil" id="estado_civil">
                    <option value="Soltero(a)" selected>Soltero(a)</option>
                    <option value="Casado(a)">Casado(a)</option>
                    <option value="Viudo(a)">Viudo(a)</option>
                    <option value="Divorciado(a)">Divorciado(a)</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="table-responsive">
          <table class="table  table-bordered">
            <thead>
              <tr class="table-info">
                <th>Celular:</th>
                <th>Correo:</th>
                <th>Edad:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="text" id="celular" name="celular" placeholder="Ingresa tu numero de celular" onkeypress="return soloNumeros(event)">
                </td>
                <td>
                  <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo electronico">
                </td>
                <td>
                  <select name="edad">
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    <option value="32">32</option>
                    <option value="33">33</option>
                    <option value="34">34</option>
                    <option value="35">35</option>
                    <option value="36">36</option>
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                    <option value="46">46</option>
                    <option value="47">47</option>
                    <option value="48">48</option>
                    <option value="49">49</option>
                    <option value="50">50</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr class="table-info">
                <th>Dirección exacta:</th>
                <th>Distrito:</th>
                <th>Ciudad:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="text" id="direccion" name="direccion" placeholder="Ingresa tu dirección">
                </td>
                <td>
                  <select name="distrito" id="distrito">
                    <option value="Ancón">Ancón</option>
                    <option value="Ate">Ate</option>
                    <option value="Barranco">Barranco</option>
                    <option value="Breña">Breña</option>
                    <option value="Carabayllo">Carabayllo</option>
                    <option value="Centro de lima">Centro de lima</option>
                    <option value="Chaclacayo">Chaclacayo</option>
                    <option value="Chorrillos">Chorrillos</option>
                    <option value="Cieneguilla">Cieneguilla</option>
                    <option value="Comas">Comas</option>
                    <option value="El Agustino">El Agustino</option>
                    <option value="Independencia">Independencia</option>
                    <option value="Jesús María">Jesús María</option>
                    <option value="La Molina">La Molina</option>
                    <option value="La Victoria">La Victoria</option>
                    <option value="Lince">Lince</option>
                    <option value="Los Olivos">Los Olivos</option>
                    <option value="Lurigancho">Lurigancho</option>
                    <option value="Lurín">Lurín</option>
                    <option value="Magdalena del Mar">Magdalena del Mar</option>
                    <option value="Miraflores">Miraflores</option>
                    <option value="Pachacámac">Pachacámac</option>
                    <option value="Pucusana">Pucusana</option>
                    <option value="Pueblo Libre">Pueblo Libre</option>
                    <option value="Puente Piedra">Puente Piedra</option>
                    <option value="Punta Hermosa">Punta Hermosa</option>
                    <option value="Punta Negra">Punta Negra</option>
                    <option value="Rímac">Rímac</option>
                    <option value="San Bartolo">San Bartolo</option>
                    <option value="San Borja">San Borja</option>
                    <option value="San Isidro">San Isidro</option>
                    <option value="San Juan de Lurigancho">San Juan de Lurigancho</option>
                    <option value="San Juan de Miraflores">San Juan de Miraflores</option>
                    <option value="San Luis">San Luis</option>
                    <option value="San Martín de Porres">San Martín de Porres</option>
                    <option value="San Miguel">San Miguel</option>
                    <option value="Santa Anita">Santa Anita</option>
                    <option value="Santa María del Mar">Santa María del Mar</option>
                    <option value="Santa Rosa">Santa Rosa</option>
                    <option value="Santiago de Surco">Santiago de Surco</option>
                    <option value="Surquillo">Surquillo</option>
                    <option value="Villa El Salvador">Villa El Salvador</option>
                    <option value="Villa María del Triunfo">Villa María del Triunfo</option>
                  </select>
                </td>
                <td>
                  <input type="text" id="ciudad" name="ciudad" placeholder="Ingresa tu ciudad">
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr class="table-info">
                <th>¿Tienes hijos?:</th>
                <th>¿Estas estudiando?:</th>
                <th>Donde viste el trabajo?:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <select name="hijos" id="hijosSelect">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5 a mas</option>
                  </select>
                </td>
                <td>
                  <input type="text" id="estudios" name="estudios" placeholder="Detalla que estas estudiando">

                </td>
                <td>
                  <select class="form-select" name="fuente_trabajo" id="fuente_trabajo">
                    <option value="bumeran">Bumeran</option>
                    <option value="facebook">Facebook</option>
                    <option value="tiktok">Tik Tok</option>
                    <option value="instagram">Instagram</option>
                    <option value="otros">Otros</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th colspan="4" class="table-info">Indique ultima experiencia relevante a cargo</th>
              </tr>
              <tr>
                <th>Nombre de la empresa:</th>
                <th>Cargo:</th>
                <th>Desde:</th>
                <th>Hasta:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="text" id="empresa_experiencia" name="empresa_experiencia" placeholder="Ingresa nombre de la empresa">

                </td>
                <td>
                  <input type="text" id="cargo_experiencia" name="cargo_experiencia" placeholder="Ingresa el cargo">

                </td>
                <td>
                  <input class="fecha_cargo_desde" type="month" id="fecha_cargo_desde" name="fecha_cargo_desde">
                </td>
                <td>
                  <input class="fecha_cargo_hasta" type="month" id="fecha_cargo_hasta" name="fecha_cargo_hasta">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <hr class="separador" />


        <div class="table-responsive">
          <table class="table table-bordered caption-top">
            <thead>
              <caption>Describre 2 cualidades positivas y negativas que tienes</caption>
              <tr class="table-info cualidades-title">
                <th>POSITIVAS:</th>
                <th>NEGATIVAS:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input class="cualidades" type="text" name="positivos_1" id="positivos_1" placeholder="1. ">
                </td>
                <td>
                  <input class="cualidades" type="text" name="negativos_1" id="negativos_1" placeholder="1. ">

                </td>
              </tr>
              <tr>
                <td>
                  <input class="cualidades" type="text" name="positivos_2" id="positivos_2" placeholder="2. ">
                </td>
                <td>
                  <input class="cualidades" type="text" name="negativos_2" id="negativos_2" placeholder="2. ">

                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary" name="click_btn_editar_cambios">Guardar Cambios</button>
        </div>

      </form>

    </div>
  </div>
</div>