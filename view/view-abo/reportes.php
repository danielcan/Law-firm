<?php
require '../../controller/conexion.php';

$queryp = "SELECT (select count(IdCita) from citas where estado = 'activo') as activo, (select count(IdCita) from citas where estado = 'En proceso') as proceso, (select count(IdCita) from citas where estado = 'desestimar') as desestimar, (select count(IdCita) from citas where estado = 'finalizado') as finalizado, (select count(IdCita) from citas where estado = 'atrasado') as atrasado from citas";
$query_runp = mysqli_query($con, $queryp);
$paisnombre = mysqli_fetch_array($query_runp);

/**labels: [<?php foreach($data as $d):?>"<?php echo $d->date_at?>", <?php endforeach; ?>]*/
?>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- Script para crear el grafico -->
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work', 11],
            ['Eat', 2],
            ['Commute', 2],
            ['Watch TV', 2],
            ['Sleep', 37]
        ]);

        var options = {
            title: 'My Daily Activities',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico'));
        chart.draw(data, options);

        document.getElementById('variable').value = chart.getImageURI();
    }
</script>


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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Generar reporte de citas</h4>
                <form action="code-generar.php" method="POST" class="d-inline">
                <input type="hidden" name="variable" id="variable" >
                <div id="grafico" style="width: 100%; height: 500px;"></div>
                    <button type="submit" name="generar_cita" class="btn btn-danger btn-sm">Generar</button>
                </form>

            </div>

        </div>
    </div>
</div>