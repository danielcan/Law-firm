  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Editar país</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">País</a></li>
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
                        <h4>Editar un país
                            <a href="menu-abo.php?controlador=mostrar-pais" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['idpais']))
                        {
                            $pais_id = mysqli_real_escape_string($con, $_GET['idpais']);
                            $query = "SELECT * FROM pais WHERE IdPais='$pais_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $pais = mysqli_fetch_array($query_run);
                                ?>
                                <form action="codepais.php" method="POST">
                                    <input type="hidden" name="pais_id" value="<?= $pais['IdPais']; ?>">

                                    <div class="mb-3">
                                        <label>Nombre</label>
                                        <input type="text" name="nombre" value="<?=$pais['nombre'];?>" class="form-control" required="required">
                                    </div>
                                    
                                
                                    <div class="mb-3">
                                        <button type="submit" name="update_pais" class="btn btn-primary">
                                            Actualizar país
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
  

