<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  
<div class="box-header with-border">
    <h1 class="box-title">Departamento o Area de la empresa</h1> 
    <div class="box-tools pull-right">
    </div>
</div>

<?php Utils::deleteSession("mensaje"); ?>
<div class="panel-body" id="formularioregistros">
    <form action="<?= base_url ?>Departamento/SaveDepartamento" method="POST">
        <input name="id" id="id" value="<?= isset($rowD->id_dep)?$rowD->id_dep:0?>" hidden="">
        <div class="row">
            <div class="col-xs-12 col-xl-5">
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <label for="codigo">Codigo</label>
                    <input type="text" value="<?= isset($rowD->abreviatura)?$rowD->abreviatura:''?>" name="codigo" id="codigo" class="form-control col-md-7 col-xs-12" value="">
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <label for="nombre" for="nombre">Nombre</label>
                    <input id="nombre" value="<?= isset($rowD->nombre)?$rowD->nombre:''?>" type="text" id="last-name" name="nombre" class="form-control col-md-7 col-xs-12" >
                </div>
                <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <label for="empresa" >Empresa</label>
                    <select id="empresa" name="empresa" class="date-picker form-control col-md-7 col-xs-12">
                        <?php while ($row = $listaEmpresa->fetch_object()): ?>
                            <option value="<?= $row->id_comp; ?>"><?= $row->nombre; ?></option>
                            <!--
                            <option  //isset($rowD)?$rowD->id_comp == $row->id_comp?"selected='true":"":''  value=" //$row->id_comp; ?>"> $row->nombre; </option>
                            -->
                        <?php   endwhile; ?>
                    </select>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <label for="nota" >Nota</label>
                    <textarea id="nota" name="nota" class="form-control col-md-7 col-xs-12" style="height: 8em;"><?= isset($rowD->nota)?$rowD->nota:''?></textarea>
                </div>
                <div class="form-group col-lg-16 col-md-6 col-sm-6 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                    <a href="<?=base_url?>Departamento/listaDepartamentos" class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
                </div>
            </div>   
        </div>
    </form>
</div>
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