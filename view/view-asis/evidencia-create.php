   <!-- dropzone css -->
   <link rel="stylesheet" href="assets/libs/dropzone/dropzone.css" type="text/css" />

   <!-- Filepond css -->
   <link rel="stylesheet" href="assets/libs/filepond/filepond.min.css" type="text/css" />
   <link rel="stylesheet" href="assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">

   <!-- start page title -->
   <div class="row">
       <div class="col-12">
           <div class="page-title-box d-sm-flex align-items-center justify-content-between">
               <h4 class="mb-sm-0">Agregar Evidencia al expediente</h4>
               <div class="page-title-right">
                   <ol class="breadcrumb m-0">
                       <li class="breadcrumb-item"><a href="javascript: void(0);">Evidencia</a></li>
                       <li class="breadcrumb-item active">Agregar</li>
                       
                   </ol>
               </div>
           </div>
       </div>
   </div>
   <?php
    if (isset($_GET['idexp'])) {
        $expe_id = mysqli_real_escape_string($con, $_GET['idexp']);

    ?>

       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h4>Agrega evidencia
                       <a href="menu-abo.php?controlador=mostrar-evidencia&idexp=<?= $expe_id; ?>" class="btn btn-secondary ">Regresar</a>
                       </h4>
                    </div>
                   <div class="card-body">
                       <form action="code-evidencia.php" method="POST" enctype="multipart/form-data">

                           <input type="hidden" name="expedi_id" value="<?= $expe_id; ?>">

                           <div class="mb-3">
                               <label>Nombre de la evidencia</label>
                               <input type="text" name="nombre_evi" class="form-control" required placeholder="Nombre de la evidencia. Ejemplo: fotografia de casa.">
                           </div>


                           <div class="mb-3">
                               <label>Formatos permitidos no mayores a (10MB): PDF, JPG, JPEG, PNG.</label>
                               <input type="file" name="doc"   class="form-control" >
                           </div>

                           <div class="mb-3">
                               <button type="submit" name="save_agrega" class="btn btn-primary">Agregar</button>
                           </div>

                       </form>
                   </div>
               </div>
           </div>
       </div>

   <?php

    }
    ?>