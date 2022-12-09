<?php

require '../../controller/conexion.php';
?>
  <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Editar usuario Abogado</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Abogado</a></li>
                      <li class="breadcrumb-item active">Editar</li>
                  </ol>
              </div>

          </div>
      </div>
  </div> 

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar un usuario
                            <a href="menu-abo.php?controlador=mostrar-user-abog" class="btn btn-danger float-end">Regresar</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $usuario_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM usuario WHERE IdUser='$usuario_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $usuario = mysqli_fetch_array($query_run);
                                ?>
                                <form action="codeuser.php" method="POST">
                                    <input type="hidden" name="usuario_id" value="<?= $usuario['IdUser']; ?>">

                                    <div class="mb-3">
                                        <label>Correo</label>
                                        <input type="text" name="correo" value="<?=$usuario['correo'];?>" class="form-control">
                                    </div>

                                 
                            <div class="mb-3">
                                <label>Estado del Usuario</label>
                                <select name="estado" size="1" id="estado" class="form-control" required="required">
                                <option value="<?=$usuario['estado'];?>"><?=$usuario['estado'];?></option>
                                    <option value="activo">activo</option>
                                    <option value="inactivo">inactivo</option>
                                </select>
                            </div>
                                   
                                    <div class="mb-3">
                                        <button type="submit" name="update_usuario" class="btn btn-primary">
                                            Actualizar usuario
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
  

