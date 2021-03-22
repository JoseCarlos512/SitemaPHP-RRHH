<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  

<div class="box-header with-border">
    <h1 class="box-title" >Lista de Departamentos  
        <a  href="<?= base_url ?>Departamento/formRegistrar" class="btn btn-success"  >
            <i class="fa fa-plus-circle"></i> Agregar
        </a>
    </h1>
    <div class="box-tools pull-right">
    </div>
</div>

<!-- /.box-header -->
<!-- centro -->
<div class="panel-body table-responsive" id="listadoregistros">
    <div class="col-6">
        <?php
        if (isset($_SESSION['mensaje'])) {
            echo $_SESSION['mensaje'];
        }
        ?>
    </div>
</div>
<?php Utils::deleteSession("mensaje"); ?>
<div class="panel-body table-responsive" id="listadoregistros">
    <table id="lista" class="" style="width:100%">
        <thead>
        <th>Opciones</th>
        <th scope="col">Empresa</th>
        <th>Codigo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Nota</th>
        <th scope="col">Estado</th>
        </thead>

        <tbody>
            <?php while ($row = $listaDepartamento->fetch_array()): ?>
                <tr>
                    <td>
                        <a href="<?= base_url ?>Departamento/getDatosDepartamento&id=<?= $row['id_dep'] ?>" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>
                        <a href="<?= base_url ?>Departamento/eliminarDepartamento&id=<?= $row['id_dep'] ?>" class="btn btn-danger" ><i class="fa fa-close"></i></a>
                    </td>
                    <td scope="row"><?= $row['empresa']; ?></td>
                    <td scope="row"><?= $row['abreviatura']; ?></td>
                    <td scope="row"><?= $row['nombre']; ?></td>
                    <td scope="row"><?= $row['nota']; ?></td>
                    <td>
                    <?= $row['estado'] == 1?'<span class="label bg-green">Activado</span>':
                            '<span class="label bg-red">Desactivado</span>'?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
        <tfoot>
        <th scope="col">Opciones</th>
        <th scope="col">Empresa</th>
        <th>Codigo</th>
        <th scope="col">Nombre</th>
        <th scope="col">Nota</th>
        <th scope="col">Estado</th>
        </tfoot>
    </table>
</div>
<?php require_once 'views/layout/footer.php'; ?>

