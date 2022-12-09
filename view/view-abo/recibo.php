  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Recibo por honorarios</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Recibo</a></li>
                      <li class="breadcrumb-item active">Agregar Recibo por honorarios</li>
                  </ol>
              </div>

          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4>Recibo por honorarios</h4>
              </div>
              <div class="card-body">
                  <form action="coderecibo.php" method="POST">
                      <?php
                        if (isset($_GET['idclient'])) {
                            $idclient = mysqli_real_escape_string($con, $_GET['idclient']);
                        }
                        ?>


                      <div class="mb-3">
                          <label>La suma neta en (En número):</label>
                          <input type="text" name="sumaneta_n" class="form-control" id="codigo">
                      </div>

                      <div class="mb-3">
                          <label>Por concepto de:</label>
                          <input type="text" name="concepto" class="form-control">
                      </div>

                      <input type="hidden" name="idclient" value="<?= $idclient; ?>">
                      
                      <div class="mb-3">
                          <button type="submit" name="save_recibi" class="btn btn-primary">Agregar recibo por honorarios</button>
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>