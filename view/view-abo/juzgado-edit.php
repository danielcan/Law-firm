<?php

require '../../controller/conexion.php';
?>
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Editar Juzgado</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Juzgados</a></li>
                      <li class="breadcrumb-item active">Editar</li>
                  </ol>
              </div>

          </div>
      </div>
  </div> 

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar un juzgado
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
                                <form action="codejuzgado.php" method="POST">
                                    <input type="hidden" name="juzgado_id" value="<?= $juzgado['IdJuz']; ?>">

                                    <div class="mb-3">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre_edj" value="<?=$juzgado['nombre'];?>" class="form-control" required="required">
                                    </div>
                                    <div class="mb-3">
                                        <label>Descripción</label>
                                        <input type="text" name="descri_edj" value="<?=$juzgado['descripcion'];?>" class="form-control" required="required">
                                    </div>
                                   
                                    <div class="mb-3">
                                        <button type="submit" name="update_juzgado" class="btn btn-primary">
                                            Actualizar juzgado
                                        </button>
                                    </div>

                                </form>
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
  

