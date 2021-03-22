<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?> 

<div class="box-header with-border">
    <h1 class="box-title">Metas del Empleado</h1> 
    <div class="box-tools pull-right">
    </div>
</div>
<div class="panel-body" >
    <form action="<?=base_url?>/Metas/saveMetasEmpleado" name="formulario" id="formulario" method="POST">
        
            
        <input name='id_meta_empleado' name="id_meta_empleado" value="<?= isset($row->id)?$row->id:0?>" hidden="" >
        <input name="id_empleado" id="id_empleado"  hidden="">
            
            <label>Empleado(*):</label>
            <input type="text" value="<?= isset($row->nombre_empleado)?$row->nombre_empleado:"" ?>" 
                   class="form-control " name="nombre_empleado" id="nombre_empleado" maxlength="100" placeholder="Nombre" required>
            <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCategoria" >
				<span class="glyphicon glyphicon-pencil">Agregar Empleado</span>
            </span> <br>
        
            <label>Nombre(*):</label>
            <input type="text" value="<?= isset($row->nombre)?$row->nombre:"" ?>" 
                   class="form-control" name="nombre_meta" id="nombre_meta"  placeholder="Meta" required>
        

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
            <select name="resultado" id="resultado" class="form-control">
                    <option  <?= isset($row)?$row->resultado == 0 ? "selected='true'": '':'' ?> value="0">Seleccionar</option>
                    <option  <?= isset($row)?$row->resultado == 1 ? "selected='true'": '':'' ?> value="1">Sin Iniciar</option>
                    <option  <?= isset($row)?$row->resultado == 2 ? "selected='true'": '':'' ?> value="2">Iniciado</option>
                    <option  <?= isset($row)?$row->resultado == 3 ? "selected='true'": '':'' ?> value="3">Finalizado</option>
            </select>

            <label>Comentario:</label>
            <input type="text" value="<?= isset($row->comentario)?$row->comentario:"" ?>" 
                   class="form-control" name="comentario" id="comentario" maxlength="50" placeholder="Comentario" hidden="">

            
            <br>
            

            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
            <?php if(!isset($_SESSION['admin'])):?>
            <a href="<?=base_url?>Metas/metasPersonales&id=<?=$row->id?>" class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
            <?php else: ?>
            <a href="<?=base_url?>Metas/listaMetaEmpleado" class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
            <?php endif; ?>
     
    </form>
    
    <!-- MODAL -->
    <div class="modal fade" id="actualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Seleccionar empleado</h4>
					</div>
					<div class="modal-body">
						
                                                    <table id="lista" class="table table-striped table-bordered table-condensed table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Opciones</th>
                                                                <th>Empleados</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while($row1 = $resultado->fetch_object()): ?>
                                                            <tr>
                                                            
                                                                <td>
                                                                    <button onclick="agregarDato('<?= $row1->id_emp ?>','<?= $row1->apellido ?>')"
                                                                            class="btn btn-primary" data-dismiss="modal" id="ActualizarCategoria"><i class="fa fa-check"></i>
                                                                    </button>
                                                                </td>
                                                                <td><?=$row1->nombre." ".$row1->apellido?></td>
                                                            
                                                            </tr>
                                                            <?php endwhile; ?>
                                                        </tbody>
                                                    </table>
                                                        						
					</div>
					<div class="modal-footer">
						<button type="button" id="" class="btn btn-warning" data-dismiss="modal">Guardar</button>
					</div>
				</div>
			</div>
		</div>
    
    
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


<?php require_once 'views/layout/footer.php'; ?>


                        
<!-- Actualizar Categoria -->
	<script type="text/javascript">
		function agregarDato(id_empleado,nombre_empleado){ //esta funcion se desencadena en la tabla cuando das click en editar de la tabla
			
                        $('#id_empleado').val(id_empleado);
			$('#nombre_empleado').val(nombre_empleado);
		}
	</script>
