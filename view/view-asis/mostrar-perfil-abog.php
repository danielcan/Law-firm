<?php
require '../../controller/conexion.php';
?>
  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Mostrar Perfiles</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Mostrar perfiles </a></li>
                      <li class="breadcrumb-item active">Perfil </li>
                  </ol>
              </div>

          </div>
      </div>
  </div>
  
    <div class="container mt-4">

  

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Perfiles 
                        <!--   <a href="student-create.php" class="btn btn-primary float-end">Add Students</a>-->
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Primer nombre</th>
                                    <th>primer apellido</th>
                                    <th>teléfono</th>
                                    <th>celular</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT p.IdPer,p.primer_nomb,p.primer_ape,p.telefono,p.celular FROM usuario as u ,perfil as p where u.rol = '3' and u.IdUser = p.IdUser or u.rol = '4' and u.IdUser = p.IdUser ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['primer_nomb']; ?></td>
                                                <td><?= $student['primer_ape']; ?></td>
                                                <td><?= $student['telefono']; ?></td>
                                                <td><?= $student['celular']; ?></td>
                                                <td>
                                                    <a href="menu-abo.php?controlador=perfil-view&idper=<?= $student['IdPer']; ?>" class="btn btn-info btn-sm">Vista</a>
                                                    <a href="menu-abo.php?controlador=perfil-edit-cre&idper=<?= $student['IdPer']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                   
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Aun no hay perfiles </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
