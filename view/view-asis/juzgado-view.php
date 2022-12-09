<?php

require '../../controller/conexion.php';
?>
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Vista Juzgado</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Juzgados</a></li>
                      <li class="breadcrumb-item active">Vista</li>
                  </ol>
              </div>

          </div>
      </div>
  </div>


  

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalle de juzgado
                            <a href="menu-abo.php?controlador=mostrar-juzgado" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $juzgado_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM juzgado WHERE IdJuz='$juzgado_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $juzgado = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Nombre</label>
                                        <p class="form-control">
                                            <?=$juzgado['nombre'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Descripción</label>
                                        <p class="form-control">
                                            <?=$juzgado['descripcion'];?>
                                        </p>
                                    </div>
                                

                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
   