  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Editar especialidad</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Especialidad</a></li>
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
                        <h4>Editar una especialidad
                            <a href="menu-abo.php?controlador=mostrar-especialidad" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['idesp']))
                        {
                            $espe_id = mysqli_real_escape_string($con, $_GET['idesp']);
                            $query = "SELECT * FROM especialidad WHERE IdEsp='$espe_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $espe = mysqli_fetch_array($query_run);
                                ?>
                                <form action="codeesp.php" method="POST">
                                    <input type="hidden" name="espe_id" value="<?= $espe['IdEsp']; ?>">

                                    <div class="mb-3">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre_e" value="<?=$espe['nombre'];?>" class="form-control" required="required">
                                    </div>
                                    
                                
                                    <div class="mb-3">
                                        <button type="submit" name="update_espe" class="btn btn-primary">
                                            Actualizar Especialidad
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
  

