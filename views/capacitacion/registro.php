<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  

<div class="panel-body" id="formularioregistros">
    <?php Utils::deleteSession("mensaje"); ?>
    <form action="<?= base_url ?>Capacitacion/saveCapacitacion" enctype="multipart/form-data"  method="POST">
            <input name="id" id="id" value="<?= isset($row->id) ? $row->id : 0 ?>" hidden="">
        <div class="box-header with-border">
            <h1 class="box-title">Registro de capacitacion</h1>
            <div class="box-tools pull-right">
            </div>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label>Cod. capacitacion:</label>
            <input type="text" class="form-control" value="<?= isset($row->cod_capacitacion) ? $row->cod_capacitacion : '' ?>" name="codigo" id="codigo" maxlength="100" placeholder="Codigo" >
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label>Nombre:</label>
            <input type="text" class="form-control" value="<?= isset($row->nombre) ? $row->nombre : ''?>" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" >
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label>Entrenador:</label>
            <input type="text" class="form-control" value="<?= isset($row->nombre) ? $row->nombre : ''?>" name="entrenador" id="entrenador" maxlength="100" placeholder="Entrenador" >
        </div>


        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label>Tipo conocimiento:</label>
            <input type="text" class="form-control" value="<?= isset($row->tipo_conocimiento) ? $row->tipo_conocimiento: ''?>" name="tipo_conocimiento" id="tipo_conocimiento" maxlength="100" placeholder="Tipo de conocimiento" >
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label>Nombre certificado:</label>
            <input type="text" class="form-control" value="<?= isset($row->nombre_certificado) ? $row->nombre_certificado : ''?>" name="nombre_certificado" id="nombre_certificado" maxlength="100" placeholder="Nombre del Certificado" >
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label>Institucion:</label>
            <input type="text" class="form-control" value="<?= isset($row->institucion) ? $row->institucion : ''?>" name="institucion" id="institucion" maxlength="100" placeholder="Institucion" >
        </div>


        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label>Fecha Inicio:</label>
            <input type="date" class="form-control" value="<?= isset($row->fec_ini) ? $row->fec_ini : ''?>" name="fecha_inicio" id="fecha_inicio" maxlength="100" placeholder="Fecha inicio" >
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label>Fecha fin:</label>
            <input type="date" class="form-control" value="<?= isset($row->fec_fin) ? $row->fec_fin : ''?>" name="fecha_fin" id="fecha_fin" maxlength="100" placeholder="Fecha fin" >
        </div>
        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <label>Estado:</label>
            <select name="estado" id="estado" class="form-control input-sm">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <label>Observacion:</label>
            <textarea name="observacion" id="observacion" 
                      class="form-control"  placeholder="Completar la observacion" 
                      ><?= isset($row->Comentario) ? $row->Comentario : ''?></textarea>
        </div>
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

            <a href="<?= base_url ?>/Capacitacion/lista" class="btn btn-danger" ><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
        </div>
    </form>
</div>

<?php require_once 'views/layout/footer.php'; ?>