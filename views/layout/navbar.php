<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Navegación</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= base_url ?>images/usuario/<?= $_SESSION['identity']->imagen ?>   " class="user-image" alt="User Image">
                    <span class="hidden-xs"><?= $_SESSION['identity']->nombre . ' ' . $_SESSION['identity']->apellidos ?></span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="<?= base_url ?>images/usuario/<?= $_SESSION['identity']->imagen ?>" class="img-circle" alt="User Image">
                        <p>
                            <?= $_SESSION['identity']->rol ?> - Deister Software
                            <small>www.youtube.com/jcarlosad7</small>
                        </p>
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">

                        <div class="pull-right">
                            <a href="<?= base_url ?>Usuario/perfil" class="btn btn-default btn-flat">Mi perfil</a>
                            <a href="<?= base_url ?>Usuario/logout" class="btn btn-default btn-flat">Cerrar session</a>

                        </div>
                    </li>
                </ul>
            </li>

        </ul>
    </div>

</nav>
</header>