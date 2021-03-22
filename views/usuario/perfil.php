<?php
require_once 'views/layout/header.php';
require_once 'views/layout/navbar.php';
require_once 'views/layout/sidebar.php';
?>  

<br>

<div class="box-header with-border">
    <h1 class="box-title">Mi Perfil</h1> 
    <div class="box-tools pull-right">
    </div>
</div>

<?php if (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] == 'correct'): ?>
    <div class="alert alert-success" role="alert">
        EMPRESA REGISTRADA CORRECTAMENTE
    </div>
<?php elseif (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] == 'error'): ?>
    <div class="alert alert-danger" role="alert">
        ERROR AL REGISTRAR LA EMPRESA
    </div>
<?php endif; ?>



<div class="panel-body" id="formularioregistros">
    <form id="demo-form2" data-parsley-validate action="<?= base_url ?>Usuario/saveDatosPerfil" enctype="multipart/form-data" method="post">
        <?php Utils::deleteSession("mensaje"); ?>

        <div class="row justify-content-end"> <!-- No me funciona -->
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 align-self-center">
                <div class="image view view-first">
                    <img class="thumb-image" height="350px" width="350px" src="<?= base_url ?>images/usuario/<?= $datos->imagen; ?>" alt="image" />
                </div>
                <br/>
                <input name="file" id="file" type="file" >
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="box-header with-border">
                    <h1 class="box-title">Datos Generales</h1> 
                    <div class="box-tools pull-right">
                    </div>
                </div>

                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label  for="first-name">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control col-md-7 col-xs-12" value="<?= $datos->nombre; ?>">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="last-name">Correo electronico</label>

                    <input type="text" id="last-name" name="email" class="form-control col-md-7 col-xs-12" value="<?= $datos->email ?>">

                </div>

                <hr class="col-xl-10">

                <div class="box-header with-border">
                    <h1 class="box-title">Seguridad de la cuenta</h1> 
                    <div class="box-tools pull-right">
                    </div>
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Contraseña antigua</label>
                    <input name="password" class="date-picker form-control col-md-7 col-xs-12" type="password" >
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Nueva contraseña</label>
                    <input name="new_password" class="date-picker form-control col-md-7 col-xs-12" type="password">
                </div>
                <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label>Confirmar contraseña nueva</label>
                    <input name="confirm_new_password" class="date-picker form-control col-md-7 col-xs-12" type="password">
                </div>

                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                    <button class="btn btn-danger"  type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                </div>

            </div>
        </div>

    </form>
</div>
<?php require_once 'views/layout/footer.php'; ?>