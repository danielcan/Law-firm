<?php
require '../../controller/conexion.php';

$queryp = "SELECT (select count(IdCita) from citas where estado = 'activo') as activo, (select count(IdCita) from citas where estado = 'En proceso') as proceso, (select count(IdCita) from citas where estado = 'desestimar') as desestimar, (select count(IdCita) from citas where estado = 'finalizado') as finalizado from citas";
$query_runp = mysqli_query($con, $queryp);
$paisnombre = mysqli_fetch_array($query_runp);



/**labels: [<?php foreach($data as $d):?>"<?php echo $d->date_at?>", <?php endforeach; ?>]*/
?>

<script src="chart.min.js"></script>


<h1>Grafica de Barra y Lineas con PHP y MySQL</h1>
<canvas id="chart1" style="width:50%;" height="100%"></canvas>
<script>
var ctx = document.getElementById("chart1");
//labels: ["Citas activas", "Citas en proceso", "Citas desestimadas", "Citas finalizadas "]

var data = {
        labels: ["Citas activas",
         "Citas en proceso", 
         "Citas desestimadas", 
         "Citas finalizadas "],
        datasets: [{        
            label: 'Cantidad de citas totales',
            data: [
                <?= $paisnombre['activo']; ?>,
                <?= $paisnombre['proceso']; ?>,
                <?= $paisnombre['desestimar']; ?>,
                <?= $paisnombre['finalizado']; ?>
            ],
            backgroundColor: "#3898db",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});
</script>


