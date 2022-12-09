<?php


$query = "UPDATE notificacion SET estado= 'leido' WHERE IdUser = '$iduser' ";
$query_run = mysqli_query($con, $query);
?>


    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Notificaciones</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Notificaciones</a></li>
                            <li class="breadcrumb-item active">Mostrar</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
            </div><!--end col-->
            <div class="col-xxl-9">
                <div class="card" id="companyList">
<!--                    <div class="card-header">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                        placeholder="Buscar notificación...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>

                        </div>
                    </div>-->
                    <div class="card-body">
                        <div>
                            <div class="table-responsive table-card mb-3">
                                <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                    <thead class="table-light">
                                        <tr>

                                            <th class="sort" data-sort="name" scope="col">Nombre de la notificación</th>
                                            <th class="sort" data-sort="owner" scope="col">Descripción</th>
                                            <th class="sort" data-sort="owner" scope="col">Fecha y Hora</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                    <?php
                                     $query = "SELECT * FROM notificacion where IdUser = '$iduser' ORDER BY IdNoti DESC ";
                                     $query_run = mysqli_query($con, $query);
                                     if (mysqli_num_rows($query_run) > 0) {
                                     foreach ($query_run as $noti) {
                                     ?>
                                        <tr >
  
                                            <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ001</a></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="assets/images/brands/dribbble.png" alt="" class="avatar-xxs rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1 ms-2 name"><?=$noti['nombre'];?></div>
                                                </div>
                                            </td>
                                            <td class="owner"><?=$noti['descripcion'];?></td>   
                                            <td class="owner"><?=$noti['fecha_noti'];?></td>                                     

                                        </tr>

                                        <?php
                            }
                        } else {
                            echo "<h5> Aun no hay datos </h5>";
                        }
                        ?>

                                    </tbody>
                                </table>

                            </div>
                      <!--      <div class="d-flex justify-content-end mt-3">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="#">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="#">
                                        Next
                                    </a>
                                </div>
                            </div>-->
                        </div>
                        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0">
                                    <div class="modal-header bg-soft-primary p-3">
                                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <form action="">
                                        <div class="modal-body">
                                            <input type="hidden" id="id-field" />
                                            <div class="row g-3">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="name-field" class="form-label">Name</label>
                                                        <input type="text" id="customername-field" class="form-control" placeholder="Enter company name" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="owner-field" class="form-label">Owner Name</label>
                                                        <input type="text" id="owner-field" class="form-control" placeholder="Enter owner name" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="industry_type-field" class="form-label">Industry Type</label>
                                                        <select class="form-control" id="industry_type-field" >
                                                            <option value="">Select industry type</option>
                                                            <option value="Computer Industry">Computer Industry</option>
                                                            <option value="Chemical Industries">Chemical Industries</option>
                                                            <option value="Health Services">Health Services</option>
                                                            <option value="Telecommunications Services">Telecommunications Services</option>
                                                            <option value="Textiles: Clothing, Footwear">Textiles: Clothing, Footwear</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="star_value-field" class="form-label">Rating</label>
                                                        <input type="text" id="star_value-field" class="form-control"  placeholder="Enter rating" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div>
                                                        <label for="location-field" class="form-label">location</label>
                                                        <input type="text" id="location-field" class="form-control"  placeholder="Enter location" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="add-btn">Add Company</button>
                                                <button type="button" class="btn btn-primary" id="edit-btn">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!--end add modal-->
    
                        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                    </div>
                                    <div class="modal-body p-5 text-center">
                                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#00bd9d,secondary:#25a0e2" style="width:90px;height:90px"></lord-icon>
                                        <div class="mt-4 text-center">
                                            <h4 class="fs-semibold">You are about to delete a company ?</h4>
                                            <p class="text-muted fs-14 mb-4 pt-1">Deleting your company will remove all of your information from our database.</p>
                                            <div class="hstack gap-2 justify-content-center remove">
                                                <button class="btn btn-link link-primary fw-medium text-decoration-none" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                                <button class="btn btn-primary" id="delete-record">Yes, Delete It!!</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end delete modal -->

                    </div>
                </div><!--end card-->
            </div><!--end col-->

        </div><!--end row-->

    <!-- container-fluid -->

<!-- End Page-content -->

