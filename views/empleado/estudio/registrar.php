<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>
<div class="box-header with-border">
    <h1 class="box-title">Estudios</h1> 
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

<div class="panel-body" id="formularioregistros">
    <form action="<?= base_url ?>Estudio/saveEstudio" method="POST">
        
        <input name="id_estudio" id="id_estudio" value="<?= isset($row->id_estudio)?$row->id_estudio:0?>" hidden="">
        
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="educacion">Nombre</label>
                <input type="text" value="<?= isset($row->nombre)?$row->nombre:''?>" class="form-control" name="nombre" id="nombre" placeholder="educacion" value="">
            </div>
            <div class="form-group col-md-6">
                <label for="nivel">Nivel</label>
                <input type="text" value="<?= isset($row->nivel)?$row->nivel:''?>" class="form-control" name="nivel" id="nivel" placeholder="nivel" value="">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="institucion">Institucion</label>
                <input type="text" value="<?= isset($row->institucion)?$row->institucion:''?>" class="form-control" name="institucion" id="institucion" placeholder="Institucion">
            </div>
            <div class="form-group col-md-6">
                <label for="nota">Nota</label>
                <input type="text" value="<?= isset($row->nota)?$row->nota:''?>" class="form-control" name="nota" id="nota" placeholder="nota">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inicio">Año de Inicio</label>
                <input type="text" value="<?= isset($row->anho_inicio)?$row->anho_inicio:''?>" class="form-control" name="year_ini" id="year_ini" placeholder="Inicio">
            </div>
            <div class="form-group col-md-6">
                <label for="fin">Año de Fin</label>
                <input type="text" value="<?= isset($row->anho_fin)?$row->anho_fin:''?>" class="form-control" name="year_fin" id="year_fin" placeholder="Fin">
            </div>
        </div>
        <div class="form-group col-md-4 mb-3">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
            <!--    
            <a href="base_url/Estudio/limpiarD" class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
            -->
        </div>
    </form>
</div>


<div class="panel-body" id="formularioregistros">
    <div class="col-xl-12">
        <table id="lista" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Opciones</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Institucion</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Año iniciado</th>
                    <th scope="col">Año terminado</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $listaEstudio->fetch_array()): ?>
                    <tr>
                        <td>
                            <a href="<?= base_url ?>Estudio/editarEstudio&id=<?= $row['id_estudio'] ?>" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>
                            <a href="<?= base_url ?>Estudio/eliminarEstudio&id=<?= $row['id_estudio'] ?>" class="btn btn-danger" ><i class="fa fa-close"></i></a>
                        </td>
                        <td scope="row"><?= $row['nombre'] ?></td>
                        <td scope="row"><?= $row['nivel'] ?></td>
                        <td scope="row"><?= $row['institucion'] ?></td>
                        <td scope="row"><?= $row['nota'] ?></td>
                        <td scope="row"><?= $row['anho_inicio'] ?></td>
                        <td scope="row"><?= $row['anho_fin'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>

    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>