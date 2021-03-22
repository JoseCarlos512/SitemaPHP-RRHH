<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  



<div class="panel-body" id="formularioregistros">

    <div class="box-header with-border">
    <h1 class="box-title">Registro de Empleado </h1>
    <div class="box-tools pull-right">
    </div>
</div>
    
    <div class="col-lg-3">
        <br/>
        <input class="form-control-file" name="file" id="file" type="file" name="file">
        <br/>
        <div class="float">
            <img  width="220" height="140"  src="<?= base_url ?>images/usuario/<?=isset($row->imagen)? $row->imagen:"sinPerfil.jpg" ?>" alt="image" />
        </div>
    </div>
    
        <form class="" action="<?= base_url ?>Empleado/guardar" method="POST">
            <div class="col-lg-9">
            <input name="id" id="id" value="<?=($row->id_emp)?$row->id_emp:0?>" hidden="">
            <br>
            <br>
            <br>
          
                <div class="form-group col-md-4 mb-3">
                    <label for="nombre">Nombres</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?= isset($row->nombre)?$row->nombre:""?>" >
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="apellido">Apellidos</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" value="<?= isset($row->apellido)?$row->apellido:""?>" >
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="dni">DNI</label>
                    <input type="text" maxlength="8" class="form-control" id="dni" name="dni" placeholder="DNI" value="<?= isset($row->dni)?$row->dni:""?>" >
                </div>
    
                <div class="form-group col-md-4 mb-3">
                    <label for="emailp">Email Personal</label>
                    <input type="text" class="form-control" id="emailp" name="emailp" placeholder="Email personal" value="<?= isset($row->email_per)?$row->email_per:""?>" >
                </div>
                <div class="form-group col-md-4 mb-3">
                    <label for="emailc">Email Corporativo</label>
                    <input type="text" class="form-control" id="emailc" name="emailc" placeholder="Email corporativo" value="<?= isset($row->email_work)?$row->email_work:""?>" >
                </div>

                <div class="form-group col-md-4 mb-3">
                    <label for="genero">Genero</label>
                    <div class="checkbox">
                        <label class="control-label" for="masculino">
                            <input type="checkbox" id="masculino" name="genero" value="1" <?= isset($row->genero)? (($row->genero == 1) ? "checked" : "") : "checked"?> >Masculino  
                        </label>
                        <label class="control-label" for="femenino">
                            <input  type="checkbox" id="femenino" name="genero" value="0" <?= isset($row->genero)? (($row->genero == 0) ? "checked" :""):"" ?> >Femenino
                        </label>
                    </div>
                </div>
            
            
                
            </div>
            <div class="col-lg-12">
            <div class="form-group col-md-3 mb-3">
                    <label for="fechan">Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="fechan" name='fechan' value="<?=$row->fec_nac?>" >
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="fechad">Fecha registro</label>
                    <input type="date" class="form-control" id="fechad" name="fechad" value="<?=$row->fec_des?>" >
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="pago">Pago</label>
                    <input type="number" class="form-control" id="pago" name='pago' value="<?= isset($row->pago)?$row->pago:""?>" >
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="puesto">Puesto</label>
                    <input type="text" class="form-control" id="puesto" name='puesto' placeholder="Puesto de trabajo" value="<?= isset($row->puesto)?$row->puesto:""?>" >
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="jefe_directo">Jefe directo</label>
                    <input name="id_jefe_empleado" id="id_jefe_empleado" hidden="">
                    <input type="text" class="form-control" id="nombre_jefe" name='nombre_jefe' placeholder="Jefe directo" value="<?= isset($row2->nombre)?$row2->nombre:""?>" >
                    <span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#actualizaCategoria" >
				<span class="glyphicon glyphicon-pencil">Agregar Jefe</span>
		    </span>
                    <br>
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="estado">Estado</label>
                    <select name="estado" class="form-control">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                <br>
                <div class="form-group col-md-12 mb-3">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control" id="domicilio" name='domicilio' placeholder="Domicilio" value="<?= isset($row->domicilio)?$row->domicilio:""?>" >
                </div>
            
            <div class="form-group col-md-4 mb-3">
                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                <?php if(isset($_SESSION['admin'])):?>
                    <a href="<?=base_url?>Empleado/listar" class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</a>
                <?php endif; ?>
            </div>
                </div>
        </form>
    
    <div class="modal fade" id="actualizaCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Seleccionar Jefe</h4>
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
                                                                    <button onclick="agregarDato('<?= $row1->id_emp ?>','<?= $row1->nombre.' '.$row1->apellido ?>')"
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
						<button type="button" id="ActualizarCategoria" class="btn btn-warning" data-dismiss="modal">Guardar</button>
					</div>
				</div>
			</div>
		</div>
    

<?php require_once 'views/layout/footer.php'; ?>

<!-- Actualizar Categoria -->
	<script type="text/javascript">
		function agregarDato(id_jefe_empleado,nombre_jefe){ //esta funcion se desencadena en la tabla cuando das click en editar de la tabla
			
                        $('#id_jefe_empleado').val(id_jefe_empleado);
			$('#nombre_jefe').val(nombre_jefe);
		}
	</script>
        
        <script type="text/javascript">
		$(document).ready(function() {
	
				
				$.ajax({
					url: '<?=base_url?>views/empleado/getNombreJefe.php',
					type: 'POST',
					data: "id=<?= isset($row)?$row->jefe_directo:0?>", //aca viene un array
						success:function(r){
							
								$('#nombre_jefe').val(r);
							
						}
					});


		});
	</script>
