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
        $idconfig = mysqli_real_escape_string($con, $_GET['idconfig']); ?>

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

                                             <input type="hidden" name="idconfig" value="<?= $idconfig; ?>">

                                             <div class="form-check mb-3">
                                                 <input class="form-check-input" name="solicitudes" type="checkbox" id="formCheck6">
                                                 <label class="form-check-label" for="formCheck6">
                                                     Solicitudes citas de clientes
                                                 </label>
                                             </div>
                                             <div class="form-check form-check-secondary mb-3">
                                                 <input class="form-check-input" name="asignacion" type="checkbox" id="formCheck7">
                                                 <label class="form-check-label" for="formCheck7">
                                                     Citas asignadas a otros abogados
                                                 </label>
                                             </div>
                                             <div class="form-check form-check-success mb-3">
                                                 <input class="form-check-input" type="checkbox" name="miscitas" id="formCheck8">
                                                 <label class="form-check-label" for="formCheck8">
                                                     Tus citas asignadas con clientes
                                                 </label>
                                             </div>
                                             <div class="form-check form-check-warning mb-3">
                                                 <input class="form-check-input" type="checkbox" name="usuario" id="formCheck9">
                                                 <label class="form-check-label" for="formCheck9">
                                                     Usuario del sistema
                                                 </label>
                                             </div>
                                             <div class="form-check form-check-danger mb-3">
                                                 <input class="form-check-input" type="checkbox" name="archivado" id="formCheck10">
                                                 <label class="form-check-label" for="formCheck10">
                                                     Expediente archivados
                                                 </label>
                                             </div>

                                             <div class="form-check form-check-info mb-3">
                                                 <input class="form-check-input" type="checkbox" name="confi" id="formCheck11">
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
                                                 <input class="form-check-input" type="checkbox" name="creaexpedi" id="formCheck13">
                                                 <label class="form-check-label" for="formCheck13">
                                                     Creación expediente
                                                 </label>
                                             </div>
                                             <div class="form-check form-check-outline form-check-secondary mb-3">
                                                 <input class="form-check-input" type="checkbox" name="expediactu" id="formCheck14">
                                                 <label class="form-check-label" for="formCheck14">
                                                     Expediente actuales
                                                 </label>
                                             </div>
                                             <div class="form-check form-check-outline form-check-success mb-3">
                                                 <input class="form-check-input" type="checkbox" name="juzgado" id="formCheck15">
                                                 <label class="form-check-label" for="formCheck15">
                                                     Juzgados
                                                 </label>
                                             </div>
                                             <div class="form-check form-check-outline form-check-warning mb-3">
                                                 <input class="form-check-input" type="checkbox" name="agenda" id="formCheck16">
                                                 <label class="form-check-label" for="formCheck16">
                                                     Agenda
                                                 </label>
                                             </div>
                                             <div class="form-check form-check-outline form-check-danger mb-3">
                                                 <input class="form-check-input" type="checkbox" name="noti" id="formCheck17">
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
                                     <button type="submit" name="agregar_conf" class="btn btn-primary">Siguiente</button>
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