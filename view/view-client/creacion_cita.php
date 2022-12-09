


    <!-- Bootstrap CSS -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Solicitud para cita con nuestro asesor legal. </h4>
                    </div>
                    <div class="card-body">
                        <form action="codecita.php" method="POST">

                            
                            <div class="mb-3">
                                <label>Fecha que tenga disponible para la cita, con su asesor legal.</label>
                                <input type="date" name="fecha" class="form-control" required>
                            </div>
                            <div class="mb-3"><!--min="10:00:00" max="22:30:00"-->
                                <label>Hora que tenga disponible para la cita</label>
                                <input type="time" name="hora" class="form-control" required  >
                            </div>

                            <div class="mb-3">
                                <label>Motivo para la solicitud de la cita</label>
                                <input type="text" name="motivo" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_cita" class="btn btn-primary">Aceptar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
   

   
</body>
</html>
