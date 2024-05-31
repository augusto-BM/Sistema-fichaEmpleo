<?php
@include "../../modelo/conexion.php";
session_start();
if (!isset($_SESSION['nombre_sesion'])) {
  header('location:../../index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Hoja de trabajo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./fichaEmpleos.css"> <!-- Archivo CSS externo -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://kit.fontawesome.com/c174601175.js" crossorigin="anonymous"></script>


</head>

<body>
  <!-- NAVBAR -->
  <header>
    <nav class="navbar bg-light">
      <div class="container-fluid">
        <p class="navbar-brand">Bienvenido - <?php echo $_SESSION['nombre_sesion']  ?></p>
        <div class="d-flex contenedor-logout dropdown show">
          <!-- <i class="nav-link text-nowrap fa-regular fa-user fa-2xl dropdown-toggle mt-2 ms-3" data-toggle="dropdown" aria-haspopup="true" type="button" aria-expanded="false"></i></a>
          <ul class="icono-logout dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="../login/cerrar-sesion.php">Cerrar Sesión</a></li>
          </ul> -->
          <a class="dropdown-item" href="../login/cerrar-sesion.php">Cerrar Sesión</a>
        </div>
      </div>
    </nav>
  </header>
  <div class="cargo">
    <div class="cargo-header">
      <P>Ficha de empleo</P>
    </div>
  </div>
  <hr />
  <form class="container py-2 contenedor-formulario formulario" action="" method="post" id="formulario">

    <?php
    $sql_cedes = "SELECT nombre_sede FROM sede WHERE estado = 'activo' AND id_Sede > 2";
    $result = $conn->query($sql_cedes);
    ?>
    
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr class="table-info">
            <th>Sede:</th>
            <th>Cargo cual postula:</th>
            <th>Fecha:</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <select name="sede" class="sede">
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
              <select name="cargo">
                <option value="Asesor">Asesor</option>
                <option value="Backoffice">Backoffice</option>
                <option value="Mantenimiento">Mantenimiento</option>
                <option value="Recursos">Recursos</option>
                <option value="Soporte">Soporte</option>
              </select>
            </td>
            <td>
              <input type="date" id="fecha-hoy" name="fecha_hoy">
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
              <select name="nacionalidad">
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
              <select name="estado_civil">
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
              <select name="distrito">
                <option value="Lima">Lima</option>
                <option value="Ancón">Ancón</option>
                <option value="Ate">Ate</option>
                <option value="Barranco">Barranco</option>
                <option value="Breña">Breña</option>
                <option value="Carabayllo">Carabayllo</option>
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

    <h4 class="titulo-tercera-seccion">¿Tienes hijos? ¿Cuántos?:</h4>
    <div class="row tercera-seccion">
      <div class="col-md-2 form-check text-center opciones"> <!-- Agregado text-center -->
        <input class="form-check-input" type="radio" id="no_Hijos" name="hijos" checked>
        <label class="form-check-label" for="no_hijos">No tengo</label>
      </div>

      <div class="col-md-2 form-check text-center opciones"> <!-- Agregado text-center -->
        <input class="form-check-input" type="radio" id="si_Hijos" name="hijos">
        <label class="form-check-label" for="si_hijos">Si tengo</label>
      </div>

      <div class="col-md-8 form-check">
        <label for="nombres">Número de hijos:</label>
        <select name="hijos" id="hijosSelect" disabled>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5_a_mas">5 a mas</option>
        </select>
      </div>
    </div>
    <hr class="separador" />


    <h4 class="titulo-sexta-seccion">¿Estás estudiando? ¿Qué estudias?:</h4>
    <div class="row sexta-seccion">
      <div class="col-md-3 form-check opciones">
        <input class="form-check-input" type="radio" id="no_estudio" name="estudios" checked>
        <label class="form-check-label" for="no_estudio">No estudio</label>
      </div>
      <div class="col-md-3 form-check opciones">
        <input class="form-check-input" type="radio" id="si_estudio" name="estudios">
        <label class="form-check-label" for="si_estudio">Si estudio&nbsp; </label>

      </div>
      <div class="col-md-6 form-check opciones">
        <input type="text" id="estudios" name="estudios" placeholder="Detalla que estas estudiando" readonly value="No">
      </div>
    </div>
    <hr class="separador" />

    <h4 class="titulo-sexta-seccion">¿Dónde viste la oferta de trabajo?</h4>
    <div class="row sexta-seccion">
      <div class="col-md-2 form-check opciones">
        <input class="form-check-input" type="radio" id="bumeran" name="fuente_trabajo" value="bumeran">
        <label class="form-check-label" for="bumeran">Bumeran&nbsp; </label>
      </div>
      <div class="col-md-2 form-check opciones">
        <input class="form-check-input" type="radio" id="facebook" name="fuente_trabajo" value="facebook">
        <label class="form-check-label" for="facebook">Facebook&nbsp; </label>
      </div>
      <div class="col-md-2 form-check opciones">
        <input class="form-check-input" type="radio" id="tiktok" name="fuente_trabajo" value="tiktok">
        <label class="form-check-label" for="tiktok">Tik Tok&nbsp; &nbsp; &nbsp; </label>
      </div>
      <div class="col-md-2 form-check opciones">
        <input class="form-check-input" type="radio" id="instagram" name="fuente_trabajo" value="instagram">
        <label class="form-check-label" for="instagram">Instagram</label>
      </div>
      <div class="col-md-4 form-check opciones">
        <input class="form-check-input" type="radio" id="otros" name="fuente_trabajo" value="otros" checked>
        <label class="form-check-label" for="otros">Otros&nbsp; &nbsp; &nbsp; &nbsp; </label>
      </div>
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
              <input class="cualidades" type="text" name="positivos_1" placeholder="1. ">
            </td>
            <td>
              <input class="cualidades" type="text" name="negativos_1" placeholder="1. ">

            </td>
          </tr>
          <tr>
            <td>
              <input class="cualidades" type="text" name="positivos_2" placeholder="2. ">
            </td>
            <td>
              <input class="cualidades" type="text" name="negativos_2" placeholder="2. ">

            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- DIV DE AVISO MENSAJE IMPORTANTE DE INFORMACION -->
    <div class="importante">
      <p><u>IMPORTANTE:</u></p>
      <p>En caso de ser contratado, esta solicitud formará parte de su archivo individual permanente. Llénala con cuidado y con los datos correctos. Todas las preguntas deben ser contestadas. Si no le corresponde alguna de ellas, debe señalarlo expresamente.</p>
    </div>

    <div class="container-button">
      <button type="submit" class="formulario__btn btn btn-primary" name="submit" id="enviar">Enviar</button>
    </div>
  </form>
  <script src="ficha.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

</body>

</html>

<?php
@include '../../controlador/controlador-fichaEmpleo/controladorFichaEmpleo.php'
?>