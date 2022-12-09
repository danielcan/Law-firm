 <!-- start page title -->
 <div class="row">
     <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
             <h4 class="mb-sm-0">Permisos de vista para el abogado</h4>
             <div class="page-title-right">
                 <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Configuraciones </a></li>
                     <li class="breadcrumb-item active">Permisos de configuración</li>
                 </ol>
             </div>
         </div>
     </div>
 </div>

 <?php
    if (isset($_GET['idconfig'])) {
        $idconfig = mysqli_real_escape_string($con, $_GET['idconfig']);

        $S_check = FALSE;
        $C_checkA = FALSE;
        $M_check = FALSE;
        $U_check = FALSE;
        $E_check = FALSE;
        $Con_check = FALSE;
        $Cre_check = FALSE;
        $E_accheck = FALSE;
        $Juz_check = FALSE;
        $Age_check = FALSE;
        $Noti_check = FALSE;

        $consultaj = "SELECT * FROM permiso WHERE IdConfig='$idconfig' ";
        $ejecutarj = mysqli_query($con, $consultaj);

        foreach ($ejecutarj as $opcionesj) :

            $nombre = $opcionesj['nombre'];

            if ($nombre == "solicitudes") {
                $S_check = TRUE;
            } else if ($nombre == "asignacion") {
                $C_checkA = TRUE;
            } else if ($nombre == "miscitas") {
                $M_check = TRUE;
            } else if ($nombre == "usuario") {
                $U_check = TRUE;
            } else if ($nombre == "archivado") {
                $E_check = TRUE;
            } else if ($nombre == "confi") {
                $Con_check = TRUE;
            } else if ($nombre == "creaexpedi") {
                $Cre_check = TRUE;
            } else if ($nombre == "expediactu") {
                $E_accheck = TRUE;
            } else if ($nombre == "juzgado") {
                $Juz_check = TRUE;
            } else if ($nombre == "agenda") {
                $Age_check = TRUE;
            } else if ($nombre == "noti") {
                $Noti_check = TRUE;
            }
        endforeach

    ?>

     <div class="row">
         <div class="col-12">
             <div class="card">
                 <div class="card-header align-items-center d-flex">
                     <h4 class="card-title mb-0 flex-grow-1">Permisos</h4>
                 </div><!-- end card header -->
                 <form action="codepermiso.php" method="post">
                     <div class="card-body">
                         <div class="live-preview">
                             <div class="row">
                                 <div class="col-md-6">
                                     <div>
                                         <!-- Bootstrap Custom Checkboxes color -->
                                         <div>

                                             <div class="form-check mb-3">
                                                 <div>
                                                     <label for="basiInput" class="form-label">Nombre de la nueva configuración</label>
                                                     <input type="text" name="nombreConfig" class="form-control" id="basiInput">
                                                 </div>
                                             </div>


                                             <div class="form-check mb-3">
                                                 <div>
                                                     <select name="iduserab" size="1" id="Esp" class="form-control" for="basiInput">
                                                         <option value="">Seleccione abogado </option>
                                                         <?php
                                                            //  include_once('../../controller/conexion.php');
                                                            $consultap = "SELECT usuario.IdUser, perfil.primer_nomb, perfil.primer_ape FROM `usuario`,`perfil` WHERE usuario.IdUser=perfil.IdUser AND usuario.rol = 3";
                                                            $ejecutarp = mysqli_query($con, $consultap);
                                                            ?>

                                                         <?php foreach ($ejecutarp as $opciones) : ?>


                                                             <option value="<?php echo $opciones['IdUser'] ?>"> <?php echo $opciones['primer_nomb'] ?> <?php echo $opciones['primer_ape'] ?> </option>

                                                         <?php endforeach ?>
                                                     </select>
                                                 </div>
                                             </div>

                                             <input type="hidden" name="idconfig" value="<?= $idconfig; ?>">



                                             <div class="form-check mb-3">
                                                 <?php
                                                    if ($S_check) { ?>
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
                                                    if ($C_checkA) { ?>
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
                                                    if ($M_check) { ?>
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
                                                    if ($U_check) { ?>
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
                                                    if ($E_check) { ?>
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
                                                    if ($Con_check) { ?>
                                                     <input class="form-check-input" type="checkbox" name="confi" id="formCheck11" checked>
                                                 <?php } else { ?>
                                                     <input class="form-check-input" type="checkbox" name="confi" id="formCheck11">
                                                 <?php  }
                                                    ?>
                                                 <label class="form-check-label" for="formCheck11">
                                                     Configuración administrativa
                                                 </label>
                                             </div>
                                             <!-- <div class="form-check form-check-dark">
                                             <input class="form-check-input" type="checkbox" id="formCheck12">
                                             <label class="form-check-label" for="formCheck12">
                                                 Checkbox Dark
                                             </label>
                                         </div>-->
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
                                                    if ($Cre_check) { ?>
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
                                                    if ($E_accheck) { ?>
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
                                                    if ($Juz_check) { ?>
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
                                                    if ($Age_check) { ?>
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
                                                    if ($Noti_check) { ?>
                                                     <input class="form-check-input" type="checkbox" name="noti" id="formCheck17" checked>
                                                 <?php } else { ?>
                                                     <input class="form-check-input" type="checkbox" name="noti" id="formCheck17">
                                                 <?php  }
                                                    ?>

                                                 <label class="form-check-label" for="formCheck17">
                                                     Notificaciones
                                                 </label>
                                             </div>
                                             <!--      <div class="form-check form-check-outline form-check-info mb-3">
                                             <input class="form-check-input" type="checkbox" id="formCheck18">
                                             <label class="form-check-label" for="formCheck18">
                                             
                                             </label>
                                         </div>
                                         <div class="form-check form-check-outline form-check-dark">
                                             <input class="form-check-input" type="checkbox" id="formCheck19">
                                             <label class="form-check-label" for="formCheck19">
                                                 Checkbox Outline Dark
                                             </label>-->
                                         </div>
                                     </div>
                                 </div>
                             </div>


                             <div class="card-body">
                                 <table class="table table-bordered table-striped">
                                     <thead>
                                         <tr>
                                             <th>
                                                 Permisos Especificos
                                             </th>
                                         </tr>
                                     </thead>
                                     <thead>
                                         <tr>
                                             <th>Descripción</th>
                                             <th>Ingresar</th>
                                             <th>Modificar</th>
                                             <th>Eliminar</th>
                                             <th>Visualizar</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                             <td> Juzgado</td>
                                             <td>
                                                 <div class="form-check mb-3"> <input class="form-check-input" type="checkbox" id="formCheck7"> </div>
                                             </td>
                                             <td>
                                                 <div class="form-check form-check-danger mb-3"> <input class="form-check-input" type="checkbox" id="formCheck8"> </div>
                                             </td>
                                             <td>
                                                 <div class="form-check form-check-success mb-3"> <input class="form-check-input" type="checkbox" id="formCheck9"> </div>
                                             </td>
                                             <td>
                                                 <div class="form-check form-check-warning mb-3"> <input class="form-check-input" type="checkbox" id="formCheck10"> </div>
                                             </td>
                                         </tr>

                                         <tr>
                                             <td> Expediente</td>
                                             <td>
                                                 <div class="form-check mb-3"> <input class="form-check-input" type="checkbox" id="formCheck7"> </div>
                                             </td>
                                             <td>
                                                 <div class="form-check form-check-danger mb-3"> <input class="form-check-input" type="checkbox" id="formCheck8"> </div>
                                             </td>
                                             <td>
                                                 <div class="form-check form-check-success mb-3"> <input class="form-check-input" type="checkbox" id="formCheck9"> </div>
                                             </td>
                                             <td>
                                                 <div class="form-check form-check-warning mb-3"> <input class="form-check-input" type="checkbox" id="formCheck10"> </div>
                                             </td>
                                         </tr>

                                         <tr>
                                             <td> Usuario</td>
                                             <td>
                                                 <div class="form-check mb-3"> <input class="form-check-input" type="checkbox" id="formCheck7"> </div>
                                             </td>
                                             <td>
                                                 <div class="form-check form-check-danger mb-3"> <input class="form-check-input" type="checkbox" id="formCheck8"> </div>
                                             </td>
                                             <td>
                                                 <div class="form-check form-check-success mb-3"> <input class="form-check-input" type="checkbox" id="formCheck9"> </div>
                                             </td>
                                             <td>
                                                 <div class="form-check form-check-warning mb-3"> <input class="form-check-input" type="checkbox" id="formCheck10"> </div>
                                             </td>
                                         </tr>

                                     </tbody>
                                 </table>

                             </div>


                             <div class="card-header align-items-center d-flex">
                                 <div>
                                     <button type="submit" name="update_permiso" class="btn btn-primary">Siguiente</button>
                                 </div>
                             </div>


                             <!--end col-->
                         </div>
                         <!--end row-->
                     </div>

             </div>

             </form>
         </div>
     </div>

 <?php

    }
    ?>
 <!--end col-->
 </div>
 <!--end row-->