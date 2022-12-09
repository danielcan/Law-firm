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
    if (isset($_GET['idexp'])) {
        $deta_id = mysqli_real_escape_string($con, $_GET['idexp']);
    ?>

      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">
                      <h4>Agrega nuevo detalle
                          <a href="menu-abo.php?controlador=mostrar-detaexp&idexp=<?= $deta_id; ?>" class="btn btn-danger float-end">Regresar</a>
                      </h4>
                  </div>

                  <div class="card-body">
                      <form action="codedetalle.php" method="POST">

                          <div class="mb-3">
                              <label>Descripción</label>
                              <textarea class="form-control" name="descripcion_d" id="exampleFormControlTextarea5" rows="3" required></textarea>
                             <!-- <input type="text" name="descripcion_d" class="form-control">-->
                          </div>

                          <input type="text" name="idexpe_d" value="<?= $deta_id; ?>" class="form-control" hidden>

                          <div class="mb-3">
                              <button type="submit" name="save_agrega" class="btn btn-primary">Agregar detalle</button>
                          </div>

                      </form>
                  </div>

              </div>
          </div>
      </div>

  <?php
    }
    ?>