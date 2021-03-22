<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  

<div class="box-header with-border">
    <h1 class="box-title" >Lista de Capacitaciones 
        <a  href="<?=base_url?>Capacitacion/agregarCapacitacion" class="btn btn-success" id="btnagregar" >
            <i class="fa fa-plus-circle"></i> Agregar
        </a>
    </h1>
    <div class="box-tools pull-right">
    </div>
</div>
<!-- /.box-header -->
<?php if (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] == 'correct'): ?>
    <div class="alert alert-success" role="alert">
        CORRECTO
    </div>
<?php elseif (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] == 'error'): ?>
    <div class="alert alert-danger" role="alert">
        ERROR
    </div>
<?php endif; ?>
<!-- centro -->
<?php Utils::deleteSession("mensaje"); ?>
<div class="panel-body table-responsive" id="listadoregistros">
    <table id="lista" class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <th>Opciones</th>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Tipo <br>conocimiento</th>
        <th>Institucion</th>
        <th>Fecha de inicio</th>
        <th>Nombre Certificado</th>
        <th>Estado</th>
        <th>Agregar<br> Empleados</th>
        </thead>
        <tbody> 
            <?php while ($row = $lista->fetch_object()): ?>
                <tr>
                    <td>
                        <a href="<?=base_url?>Capacitacion/editarCapacitacion&id=<?=$row->id?>" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>
                        <a href="<?=base_url?>Capacitacion/eliminarCapacitacion&id=<?=$row->id?>" class="btn btn-danger" ><i class="fa fa-close"></i></a>
                    </td>
                    <td><?=$row->cod_capacitacion?></td>
                    <td><?=$row->nombre?></td>
                    <td><?=$row->tipo_conocimiento?></td>
                    <td><?=$row->institucion?></td>
                    <td><?=$row->fec_ini?></td>
                    <td><?=$row->nombre_certificado?></td>
                    <td><?php if($row->estado == 1){echo '<span class="label bg-green">Activado</span>';}else{echo '<span class="label bg-red">Desactivado</span>';} ?>
                    <td><a href="<?=base_url?>Capacitacion/agregarEmpleado&id=<?=$row->id?>" class="btn btn-primary" ><i class="fa fa-user"></i></a></td>
                </tr>
        <?php endwhile; ?>
        </tbody>
        <tfoot>
        <th>Opciones</th>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Tipo conocimiento</th>
        <th>Institucion</th>
        <th>Fecha de inicio</th>
        <th>Nombre Certificado</th>
        <th>Estado</th>
        <th>Agregar<br> Empleados</th>
        </tfoot>
    </table>
</div>
<?php require_once 'views/layout/footer.php'; ?>

