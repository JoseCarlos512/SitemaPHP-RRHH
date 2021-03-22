<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  
<div class="box-header with-border">
    <h1 class="box-title">Empresa</h1> 
    <div class="box-tools pull-right">
    </div>
</div>

<div class="panel-body" id="formularioregistros">
    <form action="<?= base_url ?>Empresa/guardar" method="POST" enctype="multipart/form-data">
        <input id="id" name="id" value="<?= isset($row->id_comp)?$row->id_comp:0?>" hidden="">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <input class="form-control-file"  name="file" type="file"/>
            <br/>
            <img class="img-fluid img-thumbnail" src="<?= base_url ?>images/empresa/<?= isset($row->logo)?$row->logo:'sinPerfil.jpg'?>" />
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <br>
            <br/>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label for="nombre">Nombre</label>
                <input value="<?= isset($row->nombre)?$row->nombre:""?>" class="form-control" name="nombre" id="nombre" type="text">
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">  
                <label for="url">URL</label>
                <input value="<?= isset($row->url)?$row->url:""?>" class="form-control" name="url" id="url" type="text">
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="nota">Nota</label>
                <textarea class="form-control" name="nota" id="nota" 
                          placeholder="Completar una pequeña descripcion que identifique a la organizacion" ><?= isset($row->nota)?$row->nota:""?></textarea>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 f">
                <br/>
                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                <a href="<?= base_url ?>Empresa/listaEmpresas" class="btn btn-danger"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
            </div>
        </div>
    </form>
</div>
<hr>
<div class="panel-body" id="formularioregistros">
    <div class="box-header with-border">
        <h1 class="box-title">Datos de control</h1> 
        <div class="box-tools pull-right">
        </div>
    </div>
    <div class="panel-body table-responsive" id="listadoregistros">
        <table  class="table table-striped table-bordered table-condensed table-hover">
            <thead>
            <th>Usuario creacion</th>
            <th>Fecha creacion</th>
            <th>Usuario modificacion</th>
            <th>Fecha modificacion</th>
            </thead>
            <tbody>
            <td>jose.leon</td>
            <td>12-08-2020</td>
            <td>jose.leon</td>
            <td>12-08-2020</td>
            </tbody>
        </table>
    </div>  

</div>
</div>

<?php require_once 'views/layout/footer.php'; ?>