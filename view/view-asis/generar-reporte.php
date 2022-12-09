<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Generar Reportes</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Reportes</a></li>
                    <li class="breadcrumb-item active">Generar</li>
                </ol>
            </div>

        </div>
    </div>
</div>




<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Generar reporte</h4>
                <div class="flex-shrink-0">

                </div>
            </div><!-- end card header -->
            <form action="code-reportgenerar.php" method="post">
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">


                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="basiInput" class="form-label">Abogado(a):</label>
                                    <select name="abog_id" size="1" id="Esp" class="form-control" required="required">
                                        <option value="">Seleccione un abogado para generar el reporte</option>
                                        <?php

                                        $consulta = "SELECT abogado.IdAbo ,perfil.primer_nomb, perfil.primer_ape FROM `abogado`,`perfil`,`usuario` WHERE usuario.rol = '3' and  usuario.IdUser  = perfil.Iduser and  perfil.IdPer = abogado.IdPer";
                                        $ejecutar = mysqli_query($con, $consulta);
                                        ?>

                                        <?php foreach ($ejecutar as $opciones) : ?>


                                            <option value="<?php echo $opciones['IdAbo'] ?>">Abogado(a): <?php echo $opciones['primer_nomb'] ?> <?php echo $opciones['primer_ape'] ?></option>

                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <!--end col-->
                            <div class="col-xxl-3 col-md-6">
                                <div style="position: absolute;top: 40%;">
                                    <button type="submit" name="generar-re" class="btn btn-primary" target="_blank">Generar</button>
                                </div>
                            </div>

                        </div>
                        <!--end row-->
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end col-->
</div>