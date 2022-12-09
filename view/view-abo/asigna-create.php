  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Asignación de cita</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Asignación </a></li>
                      <li class="breadcrumb-item active">Citas con abogado</li>
                  </ol>
              </div>

          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h4>Agrega una nueva asignación de esta cita a un abogado
                      <a href="menu-abo.php?controlador=solicitudescitas" class="btn btn-danger float-end">Regresar</a>
                  </h4>
              </div>
              <div class="card-body">
                  <form action="codeasigna.php" method="POST">

                      <?php
                        if (isset($_GET['idcita'])) {
                            $cita_id = mysqli_real_escape_string($con, $_GET['idcita']);
                        }

                        ?>

                      <input type="text" name="cita_id" value="<?= $cita_id; ?>" hidden>

                      <div class="mb-3">
                          <div>
                              <select name="abog_id" size="1" id="Esp" class="form-control" required="required">
                                  <option value="">Seleccione un abogado para la asignación de esta cita</option>
                                  <?php
                                    require '../../controller/conexion.php';
                                    //include_once('conexion.php');
                                    //$consulta = "select * from especializacion";
                                    $consulta = "SELECT abogado.IdAbo ,perfil.primer_nomb, perfil.primer_ape FROM `abogado`,`perfil`,`usuario` WHERE usuario.rol = '3' and  usuario.IdUser  = perfil.Iduser and  perfil.IdPer = abogado.IdPer" ;
                                    $ejecutar = mysqli_query($con, $consulta);
                                    ?>

                                  <?php foreach ($ejecutar as $opciones) : ?>


                                      <option value="<?php echo $opciones['IdAbo'] ?>">Abogado(a): <?php echo $opciones['primer_nomb'] ?> <?php echo $opciones['primer_ape'] ?></option>

                                  <?php endforeach ?>
                              </select>
                          </div>
                      </div>

                      <div class="mb-3">
                          <div>
                              <div class="mb-3">
                                  <button type="submit" name="save_asigna" class="btn btn-primary">Agregar la asignación al abogado</button>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>