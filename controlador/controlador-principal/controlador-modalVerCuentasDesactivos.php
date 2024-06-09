<div class="table-responsive col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <!-- Necesario Clase busqueda: tabla -->
                <table class="table student_list table-borderless tabla table-striped tabla w-100" id="myTable2">
                    <thead class="table-dark ">
                        <style>
                            .centrado {
                                text-align: center !important;
                                vertical-align: middle !important;
                            }
                        </style>

                        <tr class="align-middle centrado"><!--  -->
                            <th style="display: none;">ID</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th>Sede</th>
                            <th style="display: none;"> </th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../../modelo/conexion.php';
                        $sql = "SELECT * FROM login WHERE estado = 'inactivo'/* ORDER BY id_entrevistador DESC */";

                        $sql_cedes = "SELECT id_sede, nombre_sede FROM sede WHERE estado = 'activo' AND id_Sede > 2";
                        $cedes = array();


                        $sql_roles = "SELECT id_rol, rol FROM rol";
                        $roles = array(); 

                        /* $result_roles = $conn->query($sql_roles); */

                        $resultado = mysqli_query($conn, $sql);

                        // Obtener los nombres de los cedes
                        $resultado_cedes = mysqli_query($conn, $sql_cedes);
                        if ($resultado_cedes && mysqli_num_rows($resultado_cedes) > 0) {
                            while ($fila_cede = mysqli_fetch_assoc($resultado_cedes)) {
                                $cedes[$fila_cede['id_sede']] = $fila_cede['nombre_sede'];
                            }
                        }

                        // Obtener los nombres de los roles
                        $resultado_roles = mysqli_query($conn, $sql_roles);
                        if ($resultado_roles && mysqli_num_rows($resultado_roles) > 0) {
                            while ($fila_rol = mysqli_fetch_assoc($resultado_roles)) {
                                $roles[$fila_rol['id_rol']] = $fila_rol['rol'];
                            }
                        }



                        if ($resultado && mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {

                                if (!is_null($fila['id_sede'])) {
                                    $idSede = $fila['id_sede'];
                                    if ($idSede == 2) {
                                        $nombreCede = "Administrador";
                                    } elseif ($idSede == 1) {
                                        $nombreCede = "Postulante";
                                    } else {
                                        if (isset($cedes[$idSede])) {
                                            $nombreCede = $cedes[$idSede];
                                        } else {
                                            $nombreCede = ""; // Si el ID de la sede no está definido en $cedes, asignamos una cadena vacía.
                                        }
                                    }
                                } else {
                                    $nombreCede = ""; // Si el ID de la sede es nulo, asignamos una cadena vacía.
                                }

                                if (!is_null($fila['id_rol']) && isset($roles[$fila['id_rol']])) {
                                    $nombreRol = $roles[$fila['id_rol']];
                                } else {
                                    $nombreRol = "No asignado";
                                }
                        ?>

                                <tr class="bg-white align-middle">
                                    <td class="user_id" style="display: none;"><?php echo $fila['id']; ?></td>
                                    <td class=""><?php echo $fila['usuario']; ?></td>
                                    <td class=""><?php echo $fila['contraseña']; ?></td>
                                    <td class=""><?php echo $nombreRol;?></td>
                                    <td class=""><?php echo $nombreCede; ?></td>
                                    <td class="" style="display: none;">
                                        <a href="" class=" btn-ver me-0"><i class="far fa-eye" style="color: #2E59EA;"></i></a>
                                        <a href="" class="btn-editar ms-0"><i class="far fa-pen" style="color: #EAD42E;"></i></a>
                                    </td>
                                    <td>
                                        <button style="width: 100px;" class="btn <?php echo ($fila['estado'] == 'activo') ? 'btn-success' : 'btn-danger'; ?> estadoBtn" onclick="cambiarEstado(this)" data-id="<?php echo $fila['id']; ?>">
                                            <?php echo ($fila['estado'] == 'activo') ? 'Activo' : 'Inactivo'; ?>
                                        </button>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        mysqli_free_result($resultado);
                        mysqli_close($conn);

                        ?>

                    </tbody>
                </table>
            </div>