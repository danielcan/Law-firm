  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Agregar expediente</h4>
              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Expediente</a></li>
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
                  <h4>Agrega expediente</h4>
              </div>
              <div class="card-body">
                  <form action="codeexpe.php" method="POST">

                      <div class="mb-3">
                          <label>Nombre</label>
                          <input type="text" name="nombre_exp" class="form-control" required placeholder="coloca un nombre del expediente del cliente (caso o tramite)">
                      </div>
                      <div class="mb-3">
                          <label>Tipo de expediente</label>
                          <select name="tipo_exp" size="1" id="estado" class="form-control" required="required">
                              <option value="">Seleccione el tipo de expediente</option>
                              <option value="caso">caso</option>
                              <option value="tramite">tramite</option>
                          </select>
                      </div>

                      <div class="mb-3">
                      <label>Cliente (citas asignadas)</label>
                          <select name="cliente_n" size="1" id="Esp" class="form-control" required="required">
                              <option value="">Seleccione tu cliente asignado</option>
                              <?php
                             
                                $consultac = "SELECT usuario.IdUser,perfil.primer_nomb,perfil.segundo_nomb,perfil.primer_ape,perfil.segundo_ape FROM asignacion,citas,usuario,perfil,abogado WHERE abogado.IdAbo = '$idabog' AND abogado.IdAbo = asignacion.IdAbo and asignacion.IdCita = citas.IdCita and citas.IdUser = usuario.IdUser AND usuario.IdUser = perfil.IdUser GROUP BY usuario.IdUser";
                                $ejecutarc = mysqli_query($con, $consultac);
                                ?>

                              <?php foreach ($ejecutarc as $opcionesc) : ?>


                                  <option value="<?php echo $opcionesc['IdUser'] ?>"><?php echo $opcionesc['primer_nomb'] ?> <?php echo $opcionesc['segundo_nomb'] ?> <?php echo $opcionesc['primer_ape'] ?> <?php echo $opcionesc['segundo_ape'] ?></option>

                              <?php endforeach ?>
                          </select>
                      </div>

                      <div class="mb-3">
                      <label>Juzgado </label>
                          <select name="juzgado_n" size="1" id="Esp" class="form-control" required="required">
                              <option value="">Seleccione juzgado si es necesario en este expediente</option>
                              <?php
                               // require '../../controller/conexion.php';
                                $consultaj = "SELECT * FROM juzgado";
                                $ejecutarj = mysqli_query($con, $consultaj);
                                ?>

                              <?php foreach ($ejecutarj as $opcionesj) : ?>


                                  <option value="<?php echo $opcionesj['IdJuz'] ?>"><?php echo $opcionesj['nombre'] ?></option>

                              <?php endforeach ?>
                          </select>
                      </div>



                      <div class="mb-3">
                          <button type="submit" name="save_expe" class="btn btn-primary">Agregar</button>
                      </div>

                  </form>
              </div>
          </div>
      </div>
  </div>