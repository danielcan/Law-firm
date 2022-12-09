  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Mostrar cita con abogado</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    
                  </ol>
              </div>

          </div>
      </div>
  </div>



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Próxima cita  con su asesor legal.  Este atento a cualquier cambio con su cita. 
                           <!-- <a href="index.php" class="btn btn-danger float-end">BACK</a>-->
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        require '../../controller/conexion.php';
                        
                            $iduser = $_SESSION['iduser'];
                            $queryobc = "SELECT * FROM citas WHERE IdUser='$iduser' and estado='activo' or IdUser='$iduser' and estado='En proceso'";
                            $query_runobc = mysqli_query($con, $queryobc);

                            if(mysqli_num_rows($query_runobc) > 0)
                            {
                                $cita = mysqli_fetch_array($query_runobc);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>Fecha de la cita</label>
                                        <p class="form-control">
                                            <?=$cita['fecha'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Hora de la Cita</label>
                                        <p class="form-control">
                                            <?=$cita['hora'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Lugar de la Cita</label>
                                        <p class="form-control">
                                            <?=$cita['lugar'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Motivo de la cita</label>
                                        <p class="form-control">
                                            <?=$cita['motivo'];?>
                                        </p>
                                    </div>

                                <?php
                            }
                            else
                            {
                                echo "<h4>Aun no tiene cita</h4>";
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>

   