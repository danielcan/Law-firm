  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Detalle del expediente</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Expediente</a></li>
                      <li class="breadcrumb-item active">Agregar</li>
                  </ol>
              </div>

          </div>
      </div>
  </div>

  <?php
    if (isset($_GET['iddeta'])) {
        $deta_id = mysqli_real_escape_string($con, $_GET['iddeta']);
        $query = "SELECT * FROM detalleexp WHERE IdDetal='$deta_id' ";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $deta = mysqli_fetch_array($query_run);

    ?>

          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <h4>Editar detalle
                              <a href="menu-abo.php?controlador=mostrar-detaexp&idexp=<?= $deta['IdExp']; ?>" class="btn btn-danger float-end">Regresar</a>
                          </h4>
                      </div>

                      <div class="card-body">
                          <form action="codedetalle.php" method="POST">

                             <input type="text" name="iddetal" value="<?= $deta['IdDetal']; ?>" class="form-control" hidden>

                              <div class="mb-3">
                                  <label>Descripción</label>
                                  <textarea class="form-control" name="deta_descri" id="exampleFormControlTextarea5" rows="3" required><?= $deta['descripcion']; ?></textarea>
                                </div>

                                <input type="text" name="idexp" value="<?= $deta['IdExp']; ?>" class="form-control" hidden>

                              <div class="mb-3">
                                  <button type="submit" name="update_deta" class="btn btn-primary">Agregar detalle</button>
                              </div>

                          </form>
                      </div>

                  </div>
              </div>
          </div>

  <?php
        } else {
            echo "<h4>No Such Id Found</h4>";
        }
    }
    ?>