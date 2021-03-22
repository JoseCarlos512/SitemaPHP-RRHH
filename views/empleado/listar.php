<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>    


<div class="box-header with-border">
    <h1 class="box-title" >Empleado 
        <!-- <a  href="  base_url  Empleado/registrar" class="btn btn-success" id="btnagregar" >
            <i class="fa fa-plus-circle"></i> Agregar
        </a> -->
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

<div class="col-xl-12">
    <div class="panel-body table-responsive">
        <table id="lista" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
                <tr>
                    <th scope="col">Opciones</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Fecha<br>Nacimiento</th>
                    <th scope="col">Email<br>Empresa</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Sueldo</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $lista->fetch_array()): ?>
                    <tr>
                        <td scope="row">
                            <a href="<?= base_url ?>Empleado/editarEmpleado&id=<?= $row['id_emp'] ?>" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>
                            <a href="<?= base_url ?>Empleado/deleteEmpleado&id=<?= $row['id_emp'] ?>" class="btn btn-danger" ><i class="fa fa-close"></i></a>
                        </td>
                        <td scope="row"><?= $row['nombre'] . " " . $row['apellido'] ?></td>
                        <td scope="row"><?php
                            if ($row['genero'] == 1) {
                                echo "Hombre";
                            } else {
                                echo "Mujer";
                            }
                            ?></td>
                        <td scope="row"><?= $row['fec_nac'] ?></td>
                        <td scope="row"><?= $row['email_work'] ?></td>
                        <td scope="row"><?= $row['puesto'] ?></td>
                        <td scope="row"><?= $row['pago'] ?></td>
                        <td scope="row"><img height='50px' width='50px' src="<?= base_url ?>images/usuario/<?=$row['imagen']?>"/></td>
                        <td>
                            <?php if ($row['estado'] == 1) {
                                echo '<span class="label bg-green">Activado</span>';
                            } else {
                                echo '<span class="label bg-red">Desactivado</span>';
                            } ?>
                        </td>
                    </tr>
<?php endwhile; ?>
            </tbody>

        </table>
    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>
