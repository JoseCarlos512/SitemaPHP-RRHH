<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?> 

<div class="panel-body" >
    <div class="box-header with-border">
        <a href="<?= base_url ?>Capacitacion/lista" class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</a> <br><br>
        <h1 class="box-title">INFORMACION GENERAL DE LA CAPACITACION</h1> 
        <div class="box-tools pull-right">
        </div>
    </div>


    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label>Cod. capacitacion:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" disabled="">
    </div>
    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label>Nombre:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" disabled="">
    </div>
    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label>Entrenador:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" disabled="">
    </div>


    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label>Tipo conocimiento:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" disabled="">
    </div>
    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label>Nombre certificado:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" disabled="">
    </div>
    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <label>Institucion:</label>
        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" disabled="">
    </div>


    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label>Observacion:</label>
        <input type="text" class="form-control" name="num_documento" id="num_documento" maxlength="20" placeholder="Documento" disabled="">
    </div>



    <div class="box-header with-border">
        <h1 class="box-title">Agregar empleado</h1> 
        <div class="box-tools pull-right">
        </div>
    </div>

    <form action="<?= base_url ?>Capacitacion/buscar&id_capacitacion" method="POST">
        <input name="id_capacitacion" id="id_capacitacion" value="<?=$id_capacitacion?>" hidden="">
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <input type="text" class="form-control" name="nombre" id="nombre">
        </div>
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-search"></i> Buscar</button>
        </div>
    </form>
    
    <form name="formulario" id="formulario" method="POST">

        <div class="panel-body table-responsive" id="listadoregistros">

            <table id="lista" class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                <th>Seleccionar</th>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Puesto</th>
                <th>Estado</th>
                </thead>
                <?php if (isset($lista)): ?>
                    <tbody> 
                        <?php while ($row = mysqli_fetch_object($lista)): ?>
                            <tr>
                                <td> 
                                    <a href="<?= base_url ?>Capacitacion/matricular&idEmpleado=<?= $row->id_emp ?>&id_capacitacion=<?=$id_capacitacion?>"  class="btn btn-success" >
                                        <i class="fa fa-check"></i></a> 
                                </td>
                                <td><?= $row->dni ?></td>
                                <td><?= $row->nombre ?></td>
                                <td><?= $row->apellido ?></td>
                                <td><?= $row->puesto ?></td>
                                <td><?= $row->status ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                <?php endif; ?>
            </table>

        </div>  

    </form>

    <br>
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
<?php unset($_SESSION['mensaje']); ?>

    <div class="box-header with-border">
        <h1 class="box-title">Lista de Matriculados</h1> 
        <div class="box-tools pull-right">
        </div>
    </div>

    <div class="panel-body table-responsive" id="listadoregistros">
        <table  id="lista2" class="table table-striped table-bordered table-condensed table-hover">  
            <thead>
            <th>Quitar</th>
            <th>Empleado</th>
            <th>DNI</th>
            <th>Fecha registro</th>
            <th>Estado</th>
            </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_object($lista2)): ?>
                    <td> <a href="<?= base_url ?>Capacitacion/eliminarMatriculado&id=<?= $row->id_emp ?>" class="btn btn-danger" ><i class="fa fa-close"></i></a> </td>
                    <td><?= $row->empleado ?></td>
                    <td><?= $row->dni ?></td>
                    <td><?= $row->fecha_registro ?></td>
                    <td><?= $row->estado ?></td>
                </tbody>
            <?php endwhile; ?>
        </table>
    </div>



    <?php require_once 'views/layout/footer.php'; ?>