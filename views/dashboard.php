
<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>   

<?php

  require_once "helpers/consultas.php";
  $consulta = new Consultas();

  $rsptav = $consulta->metasHoy();
  $regv=$rsptav->fetch_object();
  $totalv=$regv->total_venta;
  
  $empleado = $consulta->metasHoyEmpleado();
  $nroEmpleado=$empleado->fetch_object();
  $totalEmpleado=$nroEmpleado->total_venta;
  
  $empresa = $consulta->metasHoyEmpresa();
  $nroEmpresa=$empresa->fetch_object();
  $totalEmpresa=$nroEmpresa->total_venta;
  
  /*********************************************************/
  $ventase = $consulta->metasUltimos12mesesEmpresa();
  $fechase='';
  $totalese='';
  

  while ($regfechae= $ventase->fetch_object()) {
    $fechase=$fechase.'"'.$regfechae->fecha .'",';
    $totalese=$totalese.$regfechae->total .','; 
  }
  //Quitamos la última coma
  $fechase=substr($fechase, 0, -1);
  $totalese=substr($totalese, 0, -1);
  /*********************************************************/
  //Datos para mostrar el gráfico de barras de las ventas
  $ventas12 = $consulta->metasUltimos12meses();
  $fechasv='';
  $totalesv='';
  

  while ($regfechav= $ventas12->fetch_object()) {
    $fechasv=$fechasv.'"'.$regfechav->fecha .'",';
    $totalesv=$totalesv.$regfechav->total .','; 
  }
  
  //Quitamos la última coma
  $fechasv=substr($fechasv, 0, -1);
  $totalesv=substr($totalesv, 0, -1);
  /*********************************************************/
  
   /*************************EMPLEADO********************************/
  $ventasemp = $consulta->metasUltimos12mesesEmpleado();
  $fechasemp='';
  $totalesemp='';
  

  while ($regfechaemp= $ventasemp->fetch_object()) {
    $fechasemp=$fechasemp.'"'.$regfechaemp->fecha .'",';
    $totalesemp=$totalesemp.$regfechaemp->total .','; 
  }
  //Quitamos la última coma
  $fechasemp=substr($fechasemp, 0, -1);
  $totalesemp=substr($totalesemp, 0, -1);
  /*********************************************************/
?>

<div class="col-md-12">
    <div class="box">
        <div class="box-header with-border">
            <h1 class="box-title">Escritorio </h1>
            <div class="box-tools pull-right">
            </div>
        </div>
        <!-- /.box-header -->
        <!-- centro -->
        <div class="panel-body">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h4 style="font-size:20px;">
                            <strong> Metas Empresa</strong>
                        </h4>
                        <p><?php echo $totalEmpresa; ?> Unidad</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?=base_url?>Metas/listaMetaEmpresa" class="small-box-footer">Metas Empresa <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h4 style="font-size:20px;">
                            <strong>Metas Departamento</strong>
                        </h4>
                        <p><?php echo $totalv; ?> Unidad</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?=base_url?>Metas/listaMetaDepartamento" class="small-box-footer">Metas Departamento <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="small-box bg-aqua-active">
                    <div class="inner">
                        <h4 style="font-size:20px;">
                            <strong>Metas Empleado</strong>
                        </h4>
                        <p><?php echo $totalEmpleado; ?> Unidad</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?=base_url?>Metas/listaMetaEmpleado" class="small-box-footer">Metas Empleado <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                       Metas de la empresa
                    </div>
                    <div class="box-body">
                        <canvas id="ventas1" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        Metas del departamento
                    </div>
                    <div class="box-body">
                        <canvas id="ventas2" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        Metas de los Empleados
                    </div>
                    <div class="box-body">
                        <canvas id="ventas3" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>

            <!--Fin centro -->
        </div><!-- /.box -->
    </div><!-- /.col -->


    <?php require_once 'views/layout/footer.php'; ?>

<script type="text/javascript" src="scripts/categoria.js"></script>
<script src="<?=base_url?>public/js/chart.min.js"></script>
<script src="<?=base_url?>public/js/Chart.bundle.min.js"></script> 
<script type="text/javascript">

var ctx = document.getElementById("ventas1").getContext('2d');
var ventas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $fechase; ?>],
        datasets: [{
            label: 'Metas cumplidas en los últimos 12 Meses',
            data: [<?php echo $totalese; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


var ctx = document.getElementById("ventas2").getContext('2d');
var ventas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $fechasv; ?>],
        datasets: [{
            label: 'Metas cumplidas en los últimos 12 Meses',
            data: [<?php echo $totalesv; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

var ctx = document.getElementById("ventas3").getContext('2d');
var ventas = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $fechasemp; ?>],
        datasets: [{
            label: 'Metas cumplidas en los últimos 12 Meses',
            data: [<?php echo $totalesemp; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>




<?php 
//}
ob_end_flush();

?>
