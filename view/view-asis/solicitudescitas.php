<?php
require '../../controller/conexion.php';
?>

  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Solicitudes de citas de clientes</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Citas </a></li>
                      <li class="breadcrumb-item active">Mostrar citas</li>
                  </ol>
              </div>

          </div>
      </div>
  </div>
  


  

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Citas de clientes fechas y hora sugerida por el cliente.
                        <!--   <a href="student-create.php" class="btn btn-primary float-end">Add Students</a>-->
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Lugar</th>
                                    <th>Motivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $query = "SELECT * FROM citas where estado='activo' order by IdCita Desc";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $cita)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $cita['fecha']; ?></td>
                                                <td><?= $cita['hora']; ?></td>
                                                <td><?= $cita['lugar']; ?></td>
                                                <td><?= $cita['motivo']; ?></td>
                                                <td>
                                                    <a href="menu-abo.php?controlador=perfilcliente&idclient=<?= $cita['IdUser']; ?>" class="btn btn-info btn-sm">Ver información de cliente.</a>
                                                    <a href="menu-abo.php?controlador=asigna-create&idcita=<?= $cita['IdCita']; ?>" class="btn btn-success btn-sm">Asignar</a>
                                                
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Aun no hay citas solicitadas de clientes. </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    

   

