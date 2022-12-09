<?php

$dato = $_GET['id'];

?>   
 
 <!-- start page title -->
 <div class="row">
     <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
             <h4 class="mb-sm-0">Información especifica del abogado</h4>

             <div class="page-title-right">
                 <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="javascript: void(0);">Información </a></li>
                     <li class="breadcrumb-item active">Agregar información especifica del abogado</li>
                 </ol>
             </div>

         </div>
     </div>
 </div>



 <div class="row">
     <div class="col-lg-12">
         <div class="card">
             <div class="card-header align-items-center d-flex">
                 <h4 class="card-title mb-0 flex-grow-1">Agregar nueva Configuración</h4>
                 <div class="flex-shrink-0">

                 </div>
             </div><!-- end card header -->
             <div class="card-body">
                 <div class="live-preview">
                     <form action="codeabo.php"method="POST">
                         <div class="row gy-4">

                             <div class="col-xxl-3 col-md-6">
                                 <div>
                                     <label for="basiInput" class="form-label">Numero de colegiación</label>
                                     <input type="text"  name="numeCole" class="form-control" id="basiInput" required="required">
                                 </div>
                             </div>
                            
                             <div class="col-xxl-3 col-md-6">
                                <label for="exampleDataList" class="form-label">Especialización</label>
                                <select name="especiali" size="1" id="Esp" class="form-control" required="required">
                                    <option value=""></option>    
                                    <?php
                                    
                                    $consultaj = "SELECT * FROM especialidad";
                                    $ejecutarj = mysqli_query($con, $consultaj);
                                    ?>

                                    <?php foreach ($ejecutarj as $opcionesj) : ?>

                                        <option value="<?php echo $opcionesj['IdEsp'] ?>"><?php echo $opcionesj['nombre'] ?></option>

                                    <?php endforeach ?>
                                </select>
                            </div>



                             <div class="col-xxl-3 col-md-6">
                                  <div>
                                  <input type="text" name="id_per" class="form-control" value="<?=$dato?>" hidden>
                                  </div>
                              </div>


                             <div>
                                 <button type="submit" name="save-abo" class="btn btn-primary">Guardar</button>
                             </div>

                         </div>
                     </form>
                     <!--end row-->
                 </div>

             </div>
         </div>
     </div>
     <!--end col-->
 </div>