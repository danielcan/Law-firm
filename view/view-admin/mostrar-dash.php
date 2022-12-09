<?php
require '../../controller/conexion.php';

$queryp = "SELECT (select count(IdCita) from citas where estado = 'activo') as activo, (select count(IdCita) from citas where estado = 'En proceso') as proceso, (select count(IdCita) from citas where estado = 'desestimar') as desestimar, (select count(IdCita) from citas where estado = 'finalizado') as finalizado, (select count(IdCita) from citas where estado = 'atrasado') as atrasado from citas";
$query_runp = mysqli_query($con, $queryp);
$paisnombre = mysqli_fetch_array($query_runp);

/**labels: [<?php foreach($data as $d):?>"<?php echo $d->date_at?>", <?php endforeach; ?>]*/
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <script src="chart.min.js"></script>


                <h3>Estadística de citas generales</h3>
                <canvas id="chart1" style="width:50%;" height="100%"></canvas>
                <script>
                    var ctx = document.getElementById("chart1");
                    //labels: ["Citas activas", "Citas en proceso", "Citas desestimadas", "Citas finalizadas "]

                    var data = {
                        labels: ["Citas activas",
                            "Citas en proceso",
                            "Citas desestimadas",
                            "Citas finalizadas ",
                            "Citas atrasadas "
                        ],
                        datasets: [{
                            label: 'Cantidad de citas totales',
                            data: [
                                <?= $paisnombre['activo']; ?>,
                                <?= $paisnombre['proceso']; ?>,
                                <?= $paisnombre['desestimar']; ?>,
                                <?= $paisnombre['finalizado']; ?>,
                                <?= $paisnombre['atrasado']; ?>
                            ],
                            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
                            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
                            borderWidth: 1
                        }]
                    };
                    var options = {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    };
                    var chart1 = new Chart(ctx, {
                        type: 'bar',
                        /* valores: line, bar*/
                        data: data,
                        options: options
                    });
                </script>


            </div>
        </div>
    </div>
</div>

<?php


$querycaso = "SELECT (select count(IdExp) from expediente where tipo = 'caso') as caso, (select count(IdExp) from expediente where tipo = 'tramite') as tramite from expediente";
$query_runcaso = mysqli_query($con, $querycaso);
$caso = mysqli_fetch_array($query_runcaso);

/**labels: [<?php foreach($data as $d):?>"<?php echo $d->date_at?>", <?php endforeach; ?>]*/
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <script src="chart.min.js"></script>


                <h3>Estadística de todos los casos y tramites que a hecho el bufete legal</h3>
                <canvas id="chart2" style="width:50%;" height="100%"></canvas>
                <script>
                    var ctx = document.getElementById("chart2");
                    //labels: ["Citas activas", "Citas en proceso", "Citas desestimadas", "Citas finalizadas "]

                    var data = {
                        labels: ["Casos",
                            "Tramites"
                        ],
                        datasets: [{
                            label: 'Cantidad de expedientes totales',
                            data: [
                                <?= $caso['caso']; ?>,
                                <?= $caso['tramite']; ?>
                            ],
                            backgroundColor: 'rgba(10, 100, 240, 0.2)', // Color de fondo
                            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
                            borderWidth: 1
                        }]
                    };
                    var options = {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    };
                    var chart1 = new Chart(ctx, {
                        type: 'bar',
                        /* valores: line, bar*/
                        data: data,
                        options: options
                    });
                </script>


            </div>
        </div>
    </div>
</div>



<?php
$querymes = "SELECT (select COUNT(IdCita) from citas where fecha >= '2022-01-01' AND fecha <= '2022-01-30') as enero,
(select COUNT(IdCita) from citas where fecha >= '2022-02-01' AND fecha <= '2022-02-28') as febrero,
(select COUNT(IdCita) from citas where fecha >= '2022-03-01' AND fecha <= '2022-03-30') as marzo,
(select COUNT(IdCita) from citas where fecha >= '2022-04-01' AND fecha <= '2022-04-30') as abril,
(select COUNT(IdCita) from citas where fecha >= '2022-05-01' AND fecha <= '2022-05-30') as mayo,
(select COUNT(IdCita) from citas where fecha >= '2022-06-01' AND fecha <= '2022-06-30') as junio,
(select COUNT(IdCita) from citas where fecha >= '2022-07-01' AND fecha <= '2022-07-30') as julio,
(select COUNT(IdCita) from citas where fecha >= '2022-08-01' AND fecha <= '2022-08-30') as agosto,
(select COUNT(IdCita) from citas where fecha >= '2022-09-01' AND fecha <= '2022-09-30') as septiembre,
(select COUNT(IdCita) from citas where fecha >= '2022-10-01' AND fecha <= '2022-10-30') as octubre,
(select COUNT(IdCita) from citas where fecha >= '2022-11-01' AND fecha <= '2022-11-30') as noviembre,
(select COUNT(IdCita) from citas where fecha >= '2022-12-01' AND fecha <= '2022-12-30') as diciembre";
$query_runmes = mysqli_query($con, $querymes);
$mes = mysqli_fetch_array($query_runmes);

// Valores con PHP. Estos podrían venir de una base de datos o de cualquier lugar del servidor
$etiquetas = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
$datosVentas = [$mes['enero'], $mes['febrero'], $mes['marzo'], $mes['abril'], $mes['mayo'], $mes['junio'], $mes['julio'], $mes['agosto'], $mes['septiembre'], $mes['octubre'], $mes['noviembre'], $mes['diciembre']];
?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
                <h3>Estadística de cantidad solicitudes de citas por mes</h3>
                <canvas id="grafica"></canvas>
                <script type="text/javascript">
                    // Obtener una referencia al elemento canvas del DOM
                    const $grafica = document.querySelector("#grafica");
                    // Pasaamos las etiquetas desde PHP
                    const etiquetas = <?php echo json_encode($etiquetas) ?>;
                    // Podemos tener varios conjuntos de datos. Comencemos con uno
                    const datosVentas2020 = {
                        label: "Casos por mes en el año 2022",
                        // Pasar los datos igualmente desde PHP
                        data: <?php echo json_encode($datosVentas) ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
                        borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
                        borderWidth: 1, // Ancho del borde
                    };
                    new Chart($grafica, {
                        type: 'line', // Tipo de gráfica
                        data: {
                            labels: etiquetas,
                            datasets: [
                                datosVentas2020,
                                // Aquí más datos...
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                            },
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>



<?php
/*
// Valores con PHP. Estos podrían venir de una base de datos o de cualquier lugar del servidor
$etiquetastramite = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
$datostramite = [5, 15, 8, 5, 9, 40, 20, 10, 20, 10, 11, 12];
?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
                <h3>Estadística de cantidad de tramite por mes</h3>
                <canvas id="graficatramite"></canvas>
                <script type="text/javascript">
                    // Obtener una referencia al elemento canvas del DOM
                    const $graficatramite = document.querySelector("#graficatramite");
                    // Pasaamos las etiquetas desde PHP
                    const etiquetastramite = <?php echo json_encode($etiquetastramite) ?>;
                    // Podemos tener varios conjuntos de datos. Comencemos con uno
                    const datostramite = {
                        label: "Casos por mes en el año 2022",
                        // Pasar los datos igualmente desde PHP
                        data: <?php echo json_encode($datostramite) ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
                        borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
                        borderWidth: 1, // Ancho del borde
                    };
                    new Chart($graficatramite, {
                        type: 'line', // Tipo de gráfica
                        data: {
                            labels: etiquetastramite,
                            datasets: [
                                datostramite,
                                // Aquí más datos...
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                            },
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
*/
?>