  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Agregar Juzgado</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Juzgados</a></li>
                      <li class="breadcrumb-item active">Agregar</li>
                  </ol>
              </div>

          </div>
      </div>
  </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Agrega un nuevo juzgado
                            <a href="menu-abo.php?controlador=mostrar-juzgado" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="codejuzgado.php" method="POST">

                            <div class="mb-3">
                                <label>Nombre</label>
                                <input type="text" name="nombre_j" class="form-control" required="required">
                            </div>
                            <div class="mb-3">
                                <label>Descripción</label>
                                <input type="text" name="descrip_j" class="form-control" required="required">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_agrega" class="btn btn-primary">Agregar Juzgado</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>