<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  

<div class="box-header with-border">
    <h1 class="box-title" >Lista de Empresas  
        <a  href="<?= base_url ?>Empresa/registrar" class="btn btn-success"  >
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
        <th>Nro</th>
        <th>Nombre</th>
        <th>Nota</th>
        <th>URL</th>
        <th>Logo</th>
        </thead>

        <tbody>
            <?php while ($row = $lista->fetch_array()): ?>
                <tr>
                    <td>
                        <a href="<?= base_url ?>Empresa/getDatosEmpresa&id=<?= $row['id_comp'] ?>" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>
                        <a href="<?= base_url ?>Empresa/eliminarDatosEmpresa&id=<?= $row['id_comp'] ?>" class="btn btn-danger" ><i class="fa fa-close"></i></a>
                    </td>
                    <td><?= $row['id_comp'] ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['nota']; ?></td>
                    <td><?php echo $row['url']; ?></td>
                    <td><img height='50px' width='60px' src="<?= base_url ?>images/empresa/<?=$row['logo']?>"/></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
        <tfoot>
        <th>Opciones</th>
        <th>Nro</th>
        <th>Nombre</th>
        <th>Nota</th>
        <th>URL</th>
        <th>Logo</th>
        </tfoot>
    </table>
</div>
<?php require_once 'views/layout/footer.php'; ?>

