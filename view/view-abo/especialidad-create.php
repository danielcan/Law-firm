  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Agregar especialidad</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Especialidad</a></li>
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
                        <h4>Agrega una nueva especialidad
                            <a href="menu-abo.php?controlador=mostrar-especialidad" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="codeesp.php" method="POST">

                            <div class="mb-3">
                                <label>Nombre</label>
                                <input type="text" name="nombre_e" class="form-control" required="required">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_agrega" class="btn btn-primary">Agregar Especialidad</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>