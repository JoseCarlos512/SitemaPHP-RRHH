<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  

<div class="box-header with-border">
    <h1 class="box-title" >Lista de Metas "Departamento" 
        <a  href="<?=base_url?>Metas/metasDepartamento" class="btn btn-success" id="btnagregar" >
            <i class="fa fa-plus-circle"></i> Agregar
        </a>
    </h1>
    <div class="box-tools pull-right">
    </div>
</div>
<!-- /.box-header -->
<!-- centro -->
<div class="panel-body table-responsive" id="listadoregistros">
    <table id="lista" class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <th>Opciones</th>
        <th>Departamento</th>
        <th>Nombre Meta</th>
        <th>Descripcion</th>
        <th>Fecha fin</th>
        <th>Resultado</th>
        </thead>
        <tbody> 
            <?php while ($row = mysqli_fetch_object($lista)): ?>
                <tr>
                    <td>
                        <a href="<?=base_url?>Metas/editarDepartamentoMeta&id=<?=$row->id?>" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>
                        <a href="<?=base_url?>Metas/eliminarDepartamentoMeta&id=<?=$row->id?>" class="btn btn-danger" ><i class="fa fa-close"></i></a>
                    </td>
                    <td><?=$row->nombre_departamento?></td>
                    <td><?=$row->nombre?></td>
                    <td><?=$row->descripcion?></td>
                    <td><?=$row->fecha_fin?></td>
                    <td><?php if($row->resultado == 1){echo '<span class="label bg-green">Logrado</span>';}else{echo '<span class="label bg-red">No logrado</span>';} ?>
                </tr>
        <?php endwhile; ?>
        </tbody>
        <tfoot>
        <th>Opciones</th>
        <th>Departamento</th>
        <th>Nombre Meta</th>
        <th>Descripcion</th>
        <th>Fecha fin</th>
        <th>Resultado</th>
        </tfoot>
    </table>
</div>
<?php require_once 'views/layout/footer.php'; ?>

