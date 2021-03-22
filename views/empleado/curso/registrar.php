<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>

<div class="panel-body" id="formularioregistros">
    <div class="box-header with-border">
        <h1 class="box-title">Curso</h1> 
        <div class="box-tools pull-right">
        </div>
    </div>

    <form action="<?=base_url?>Curso/saveCurso" method="POST">
        <input name="id_curso" id="id_curso" value="<?= isset($row->id_curso)?$row->id_curso :0 ?>" hidden="">
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="curso">Nombre</label>
            <input type="text" value="<?= isset($row->id_curso)?$row->id_curso :"" ?>" class="form-control" name="nombre" id="curso" placeholder="Nombre del curso">
        </div>
        
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="nivel">Duracion</label>
            <input type="text" value="<?= isset($row->duracion)?$row->duracion :"" ?>" class="form-control" name="duracion" id="duracion" placeholder="Duracion">
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="tipo_duracion">Tipo Duracion</label>
            <select class="form-control" name="tipo_duracion" id="tipo_duracion">
                <option value="H">Horas</option>
                <option value="D">Dias</option>
                <option value="S">Semanas</option>
                <option value="M">Meses</option>
                <option value="A">Años</option>
            </select>
        </div>
        
        
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="fec_ini">Fecha Inicio</label>
            <input type="date" value="<?= isset($row->fec_inicio)?$row->fec_inicio :"" ?>" class="form-control" name="fec_ini" id="fec_ini" >
        </div>
        
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="nivel">Fecha Fin</label>
            <input type="date" value="<?= isset($row->fec_fin)?$row->fec_fin :"" ?>" class="form-control" id="fec_fin" name="fec_fin" >
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="grado">Grado</label>
            <input type="text" value="<?= isset($row->grado)?$row->grado :"" ?>" class="form-control" name="grado" id="grado" placeholder="Grado">
        </div>
        
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label for="grado">Nivel</label>
            <select class="form-control" name="nivel" id="nivel">
                <option value="B">Basico</option>
                <option value="I">Intermedio</option>
                <option value="A">Avanzado</option>
            </select>
        </div>
        <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <label for="grado">Comentario</label>
            <input type="text" value="<?= isset($row->comentario)?$row->comentario :"" ?>" class="form-control" name="comentario" id="comentario" placeholder="Agregar un pequeño comentario de temas tocados">
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
            
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
                    <th scope="col">Duracion</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Fecha fin</th>
                    <th scope="col">Grado</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $lista->fetch_array()): ?>
                    <tr>
                        <td>
                            <a href="<?= base_url ?>Curso/editarCurso&id=<?= $row['id_curso'] ?>" class="btn btn-warning" ><i class="fa fa-pencil"></i></a>
                            <a href="<?= base_url ?>Curso/eliminarCurso&id=<?= $row['id_curso'] ?>" class="btn btn-danger" ><i class="fa fa-close"></i></a>
                        </td>
                        <td scope="row"><?= $row['nombre'] ?></td>
                        <td scope="row"><?= $row['nivel'] ?></td>
                        <td scope="row"><?= $row['duracion'] ?></td>
                        <td scope="row"><?= $row['fec_inicio'] ?></td>
                        <td scope="row"><?= $row['fec_fin'] ?></td>
                        <td scope="row"><?= $row['grado'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>

    </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>