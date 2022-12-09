  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Desetimación de cita</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Desestimación</a></li>
                      <li class="breadcrumb-item active">Agregar desestimación de cita</li>
                  </ol>
              </div>

          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4>Desestimación de cita

                  </h4>
              </div>
              <div class="card-body">
                  <form action="codedese.php" method="POST">
                  <?php
                    if(isset($_GET['idcita']))
                     {
                      $idcita = mysqli_real_escape_string($con, $_GET['idcita']);
                     }
                    ?>

                      <input type="hidden" name="des_id" value="<?= $idcita; ?>">

                      <div class="mb-3">
                          <label>Escribe el motivo por la desestimación de la cita</label>
                          <textarea class="form-control" name="motivo_des" rows="4" cols="50"> </textarea>
                      </div>
                      

                      <div class="mb-3">
                          <button type="submit" name="save_deses" class="btn btn-primary">Agregar desestimación</button>
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>