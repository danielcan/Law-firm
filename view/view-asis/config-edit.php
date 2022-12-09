 <!-- start page title -->
 <div class="row">
     <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
             <h4 class="mb-sm-0">Editar configuración de vista </h4>

             <div class="page-title-right">
                 <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Configuraciones </a></li>
                     <li class="breadcrumb-item active">Editarr configuración</li>
                 </ol>
             </div>

         </div>
     </div>
 </div>

 <?php
    if (isset($_GET['idconfig'])) {
        $idconfig = mysqli_real_escape_string($con, $_GET['idconfig']);
        $query = "SELECT * FROM configuracion WHERE IdConfig='$idconfig' ";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $confi = mysqli_fetch_array($query_run);

    ?>



         <div class="row">
             <div class="col-lg-12">
                 <div class="card">
                     <div class="card-header align-items-center d-flex">
                         <h4 class="card-title mb-0 flex-grow-1">Editar nueva configuración de vista </h4>
                         <div class="flex-shrink-0">

                         </div>
                     </div><!-- end card header -->
                     <div class="card-body">
                         <div class="live-preview">
                             <form action="codeconfig.php" method="post">
                                 <div class="row gy-4">

                                     <input type="hidden" name="idconfig" value="<?= $idconfig; ?>">


                                     <div class="col-xxl-3 col-md-7">
                                         <div>
                                             <label for="basiInput" class="form-label">Nombre de la nueva configuración</label>
                                             <input type="text" name="nombreConfig" class="form-control" id="basiInput" value="<?= $confi['nombre']; ?>">
                                         </div>
                                     </div>


                                     <div class="col-xxl-3 col-md-7">
                                         <div>
                                             <select name="iduserab" size="1" id="Esp" class="form-control" for="basiInput">




                                                 <?php
                                                    //  include_once('../../controller/conexion.php');
                                                    $consultap = "SELECT usuario.IdUser, perfil.primer_nomb, perfil.primer_ape FROM `usuario`,`perfil` WHERE  usuario.IdUser=perfil.IdUser AND usuario.rol = '3' or usuario.IdUser=perfil.IdUser AND usuario.rol = '4'";
                                                    $ejecutarp = mysqli_query($con, $consultap);
                                                    ?>

                                                 <?php foreach ($ejecutarp as $opciones) : ?>


                                                     <option value="<?php echo $opciones['IdUser'] ?>"> <?php echo $opciones['primer_nomb'] ?> <?php echo $opciones['primer_ape'] ?> </option>

                                                 <?php endforeach ?>
                                             </select>
                                         </div>
                                     </div>


                                     <div class="col-md-6">
                                         <div>
                                             <!-- Bootstrap Custom Checkboxes color -->
                                             <div>



                                                 <div class="form-check mb-3">
                                                     <?php
                                                        if ($confi['Solicitudes'] == 1) { ?>
                                                         <input class="form-check-input" name="solicitudes" type="checkbox" id="formCheck6" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" name="solicitudes" type="checkbox" id="formCheck6">
                                                     <?php  }

                                                        ?>
                                                     <label class="form-check-label" for="formCheck6">
                                                         Solicitudes citas de clientes
                                                     </label>
                                                 </div>


                                                 <div class="form-check form-check-secondary mb-3">
                                                     <?php
                                                        if ($confi['Asignacion'] == 1) { ?>
                                                         <input class="form-check-input" name="asignacion" type="checkbox" id="formCheck7" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" name="asignacion" type="checkbox" id="formCheck7">
                                                     <?php  }
                                                        ?>
                                                     <label class="form-check-label" for="formCheck7">
                                                         Citas asignadas a otros abogados
                                                     </label>
                                                 </div>


                                                 <div class="form-check form-check-success mb-3">
                                                     <?php
                                                        if ($confi['Miscitas'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="miscitas" id="formCheck8" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="miscitas" id="formCheck8">
                                                     <?php  }
                                                        ?>

                                                     <label class="form-check-label" for="formCheck8">
                                                         Tus citas asignadas con clientes
                                                     </label>
                                                 </div>


                                                 <div class="form-check form-check-warning mb-3">
                                                     <?php
                                                        if ($confi['Usuario'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="usuario" id="formCheck9" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="usuario" id="formCheck9">
                                                     <?php  }
                                                        ?>
                                                     <label class="form-check-label" for="formCheck9">
                                                         Usuario del sistema
                                                     </label>
                                                 </div>

                                                 <div class="form-check form-check-danger mb-3">
                                                     <?php
                                                        if ($confi['Archivado'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="archivado" id="formCheck10" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="archivado" id="formCheck10">
                                                     <?php  }
                                                        ?>

                                                     <label class="form-check-label" for="formCheck10">
                                                         Expediente archivados
                                                     </label>
                                                 </div>

                                                 <div class="form-check form-check-info mb-3">
                                                     <?php
                                                        if ($confi['Confi'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="confi" id="formCheck11" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="confi" id="formCheck11">
                                                     <?php  }
                                                        ?>
                                                     <label class="form-check-label" for="formCheck11">
                                                         Configuración administrativa
                                                     </label>
                                                 </div>

                                                 <div class="form-check form-check-dark mb-3">
                                                     <?php
                                                        if ($confi['Pais'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="pais" id="formCheck12" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="pais" id="formCheck12">
                                                     <?php  }
                                                        ?>
                                                     <label class="form-check-label" for="formCheck12">
                                                         País
                                                     </label>
                                                 </div>

                                                 <div class="form-check form-check-dark mb-3">
                                                     <?php
                                                        if ($confi['Dash'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="dash" id="formCheck12" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="dash" id="formCheck12">
                                                     <?php  }
                                                        ?>
                                                     <label class="form-check-label" for="formCheck12">
                                                         Dashboard
                                                     </label>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <!--end col-->

                                     <div class="col-md-6">
                                         <div class="mt-4 mt-md-0">

                                             <!-- Bootstrap Custom Outline Checkboxes -->
                                             <div>
                                                 <div class="form-check form-check-outline form-check-primary mb-3">
                                                     <?php
                                                        if ($confi['Creaexpedi'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="creaexpedi" id="formCheck13" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="creaexpedi" id="formCheck13">
                                                     <?php  }
                                                        ?>

                                                     <label class="form-check-label" for="formCheck13">
                                                         Creación expediente
                                                     </label>
                                                 </div>

                                                 <div class="form-check form-check-outline form-check-secondary mb-3">
                                                     <?php
                                                        if ($confi['Expediactu'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="expediactu" id="formCheck14" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="expediactu" id="formCheck14">
                                                     <?php  }
                                                        ?>

                                                     <label class="form-check-label" for="formCheck14">
                                                         Expediente actuales
                                                     </label>
                                                 </div>


                                                 <div class="form-check form-check-outline form-check-success mb-3">
                                                     <?php
                                                        if ($confi['Juzgado'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="juzgado" id="formCheck15" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="juzgado" id="formCheck15">
                                                     <?php  }
                                                        ?>

                                                     <label class="form-check-label" for="formCheck15">
                                                         Juzgados
                                                     </label>
                                                 </div>


                                                 <div class="form-check form-check-outline form-check-warning mb-3">
                                                     <?php
                                                        if ($confi['Agenda'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="agenda" id="formCheck16" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="agenda" id="formCheck16">
                                                     <?php  }
                                                        ?>

                                                     <label class="form-check-label" for="formCheck16">
                                                         Agenda
                                                     </label>
                                                 </div>

                                                 <div class="form-check form-check-outline form-check-danger mb-3">

                                                     <?php
                                                        if ($confi['Noti'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="noti" id="formCheck17" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="noti" id="formCheck17">
                                                     <?php  }
                                                        ?>

                                                     <label class="form-check-label" for="formCheck17">
                                                         Notificaciones
                                                     </label>
                                                 </div>

                                                 <div class="form-check form-check-outline form-check-info mb-3">
                                                     <?php
                                                        if ($confi['Especi'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="especi" id="formCheck17" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="especi" id="formCheck17">
                                                     <?php  }
                                                        ?>

                                                     <label class="form-check-label" for="formCheck18">
                                                         Especialidad
                                                     </label>
                                                 </div>
                                                

                                                 <div class="form-check form-check-outline form-check-info mb-3">
                                                     <?php
                                                        if ($confi['Perfil'] == 1) { ?>
                                                         <input class="form-check-input" type="checkbox" name="perfil" id="formCheck19" checked>
                                                     <?php } else { ?>
                                                         <input class="form-check-input" type="checkbox" name="perfil" id="formCheck19">
                                                     <?php  }
                                                        ?>

                                                     <label class="form-check-label" for="formCheck18">
                                                         Perfil
                                                     </label>
                                                 </div>
                                                 
                                             </div>
                                         </div>



                                         <div>

                                             <button type="submit" name="update_config" class="btn btn-primary">Siguiente</button>
                                         </div>

                                     </div>
                             </form>
                             <!--end row-->
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
     <!--end col-->
         </div>