<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?> 



<div class="panel-body" >
    <div class="box-header with-border">
        <h1 class="box-title">Metas de la Oficina</h1> 
        <div class="box-tools pull-right">
        </div>
    </div>
    <div class="panel-body" id="formularioregistros">
        <form action="<?= base_url ?>Metas/saveMetasEmpresa" method="POST">
                
            <input type="text" name="id_meta_empresa" id="id_meta_empresa" value="<?= isset($row->id) ? $row->id: 0?>" hidden="">
                <input type="text" name="id_empresa" id="id_empresa"  hidden="">
                
                <label>Oficina(*):</label>
                <input type="text" value="<?= isset($row->nombre_empresa) ? $row->nombre_empresa : "" ?>" class="form-control" name="nomnre_oficina" id="nombre_oficina" placeholder="Oficina" >
                <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCategoria" >
				<span class="glyphicon glyphicon-pencil">Agregar Empresa</span>
                </span> <br>
                
                <label>Nombre(*):</label>
                <input type="text" value="<?= isset($row->nombre) ? $row->nombre : "" ?>" class="form-control" name="nombre_meta" id="nombre_meta"  placeholder="Nombre" required>

                
                <label>Fecha fin(*):</label>
                <input type="date" value="<?= isset($row->fecha_fin) ? $row->fecha_fin : "" ?>" class="form-control" name="fecha_fin" id="fecha_fin"  placeholder="Fecha fin" required>

                
                <label>Descripcion(*):</label>
                <input for="descripcion" value="<?= isset($row->descripcion) ? $row->descripcion : "" ?>" type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" required>


            <br/>
            <div class="box-header with-border">
                <h1 class="box-title">Resultado</h1> 
                <div class="box-tools pull-right">
                </div>
            </div>


                <label>Resultado:</label>
                <select id="resultado" name="resultado" class="form-control">
                    <option  <?= isset($row)?$row->resultado == 0 ? "selected='true'": '':'' ?> value="0">Seleccionar</option>
                    <option  <?= isset($row)?$row->resultado == 1 ? "selected='true'": '':'' ?> value="1">Sin Iniciar</option>
                    <option  <?= isset($row)?$row->resultado == 2 ? "selected='true'": '':'' ?> value="2">Iniciado</option>
                    <option  <?= isset($row)?$row->resultado == 3 ? "selected='true'": '':'' ?> value="3">Finalizado</option>
                </select>

                <label>Comentario:</label>
                <input id="comentario" name="comentario" type="text" value="<?= isset($row->comentario) ? $row->comentario : "" ?>" class="form-control" name="comentario" id="email" maxlength="50" placeholder="Comentario" >

            
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
            <a href="<?= base_url ?>Metas/listaMetaEmpresa" class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
       
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
                                                                    <button onclick="agregarDato('<?= $row1->id_comp ?>','<?= $row1->nombre ?>')"
                                                                            class="btn btn-primary" data-dismiss="modal" id="ActualizarCategoria"><i class="fa fa-check"></i>
                                                                    </button>
                                                                </td>
                                                                <td><?=$row1->nombre?></td>
                                                            
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
		function agregarDato(id_empresa,oficina){ //esta funcion se desencadena en la tabla cuando das click en editar de la tabla
                        $('#id_empresa').val(id_empresa);
			$('#nombre_oficina').val(oficina);
		}
	</script>
