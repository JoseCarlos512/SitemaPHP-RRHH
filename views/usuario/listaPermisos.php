<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  

<div class="box-header with-border">
    <h1 class="box-title" >Lista de Accesos </h1>
    <div class="box-tools pull-right">
    </div>
</div>
<!-- /.box-header -->
<!-- centro -->
<div class="panel-body table-responsive" id="listadoregistros">
    <table id="lista" class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <th>Opciones</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        </thead>
        <tbody> 
            <?php while ($row = mysqli_fetch_object($lista)): ?>
                <tr>
                    <td>
                        <button class="btn btn-warning" ><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger" ><i class="fa fa-close"></i></button>
                    </td>
                    <td><?=$row->nombre?></td>
                    <td><?=$row->descripcion?></td>
                </tr>
        <?php endwhile; ?>
        </tbody>
        <tfoot> 
        <th>Opciones</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        </tfoot>
    </table>
</div>
<?php require_once 'views/layout/footer.php'; ?>

