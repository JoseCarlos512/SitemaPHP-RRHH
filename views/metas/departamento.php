<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?> 

<div class="box-header with-border">
    <h1 class="box-title">Metas del Departamento</h1> 
    <div class="box-tools pull-right">
    </div>
</div>
<div class="panel-body" >
    <form name="formulario" id="formulario" method="POST">
        
        <input name='id_meta_departamento' name="id_meta_departamento" value="<?= isset($row->id)?$row->id:""?>" hidden="">
        

            <label>Departamento(*):</label>
            <input type="text" value="<?= isset($row->nombre_departamento)?$row->nombre_departamento:"" ?>" 
                   class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>

            <label>Nombre(*):</label>
            <input type="text" value="<?= isset($row->nombre)?$row->nombre:"" ?>" 
                   class="form-control" name="nombre" id="nombre"  placeholder="Nombre" required>

            <label>Fecha fin(*):</label>
            <input type="date" value="<?= isset($row->fecha_fin)?$row->fecha_fin:"" ?>" 
                   class="form-control" name="fecha_fin" id="fecha_fin"  placeholder="Fecha fin" required>

            <label>Descripcion(*):</label>
            <input for="descripcion" value="<?= isset($row->descripcion)?$row->descripcion:"" ?>" type="text" 
                   class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" required>


        <br/>
        <div class="box-header with-border">
            <h1 class="box-title">Resultado</h1> 
            <div class="box-tools pull-right">
            </div>
        </div>


            <label>Resultado:</label>
            <select class="form-control">
                    <option  <?= isset($row)?$row->resultado == 0 ? "selected='true'": '':'' ?> value="0">Seleccionar</option>
                    <option  <?= isset($row)?$row->resultado == 1 ? "selected='true'": '':'' ?> value="1">Sin Iniciar</option>
                    <option  <?= isset($row)?$row->resultado == 2 ? "selected='true'": '':'' ?> value="2">Iniciado</option>
                    <option  <?= isset($row)?$row->resultado == 3 ? "selected='true'": '':'' ?> value="3">Finalizado</option>
            </select>
            

            <label>Comentario:</label>
            <input type="text" value="<?= isset($row->comentario)?$row->comentario:"" ?>" 
                   class="form-control" name="comentario" id="email" maxlength="50" placeholder="Comentario" hidden="">


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

        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
            <a href="<?=base_url?>Metas/listaMetaDepartamento" class="btn btn-danger"  type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
        </div>
    </form>
</div>


<?php require_once 'views/layout/footer.php'; ?>