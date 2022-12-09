<?php
require '../../controller/conexion.php';
?>
  <!-- start page title -->
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Mostrar Usuarios </h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Mostrar Usuarios</a></li>
                      <li class="breadcrumb-item active">Usuarios </li>
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
                        <h4>Usuarios 
                        <!--   <a href="student-create.php" class="btn btn-primary float-end">Add Students</a>-->
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre del usuario</th>
                                    <th>Correo</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT p.primer_nomb,p.segundo_nomb,p.primer_ape,p.segundo_ape,u.correo,u.fechaingreso,u.estado FROM usuario as u, perfil as p where u.rol='3' AND u.IdUser = p.IdUser OR u.rol = '4'AND u.IdUser = p.IdUser ";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $student['primer_nomb']; ?> <?= $student['segundo_nomb']; ?> <?= $student['primer_ape']; ?> <?= $student['segundo_ape']; ?></td>
                                                <td><?= $student['correo']; ?></td>
                                                <td><?= $student['fechaingreso']; ?></td>
                                                <td><?= $student['estado']; ?></td>
                                                <td>
                                                   
                                                    <a href="menu-abo.php?controlador=usuario-edit-abo&id=<?= $student['IdUser']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_student" value="<?=$student['idPer'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Aun no hay Usuario abogados </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

  