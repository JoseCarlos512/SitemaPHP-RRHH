  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <?php if($_SESSION['Escritorio']==1): ?>
                <li>
                    <a href="<?=base_url?>Usuario/dashboard">
                      <i class="fa fa-tasks"></i> <span>Escritorio</span>
                    </a>
                  </li>
            <?php endif; ?>
                  
            <?php if($_SESSION['Empleado']==1):?>
                    <li class="treeview">
                        <a href="#">
                          <i class="fa fa-laptop"></i>
                          <span>Empleado</span>
                          <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                          <?php if(isset($_SESSION['admin'])):?>
                          <li><a href="<?=base_url?>Empleado/listar"><i class="fa fa-circle-o"></i> Lista</a></li>
                          <!-- <li><a href=" base_url Empleado/registrar"><i class="fa fa-circle-o"></i> Registrar</a></li> -->
                          <?php endif;?>
                          <li><a href="<?=base_url?>Empleado/misDatosEmpleado"><i class="fa fa-circle-o"></i> Empleado</a></li>
                          <li><a href="<?=base_url?>Estudio/registrar"><i class="fa fa-circle-o"></i> Educacion</a></li>
                          <li><a href="<?=base_url?>Curso/registrar"><i class="fa fa-circle-o"></i> Cursos</a></li>
                        </ul>
                      </li>
            <?php endif; ?>
                      
            <?php if($_SESSION['Empresa']==1):?>
                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-th"></i>
                      <span>Empresa</span>
                       <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="<?=base_url?>Empresa/registrar"><i class="fa fa-circle-o"></i> Registrar</a></li>
                      <li><a href="<?=base_url?>Empresa/listaEmpresas"><i class="fa fa-circle-o"></i> Lista</a></li>
                    </ul>
                  </li>
            <?php endif; ?>
                  
            <?php if($_SESSION['Departamento']==1): ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Departamento</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url?>Departamento/formRegistrar"><i class="fa fa-circle-o"></i> Registrar</a></li>
                <li><a href="<?=base_url?>Departamento/listaDepartamentos"><i class="fa fa-circle-o"></i> Listar</a></li>
              </ul>
            </li>    
            <?php endif; ?>
            
            <?php if($_SESSION['Acceso']==1): ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url?>Usuario/agregar"><i class="fa fa-circle-o"></i> Registro</a></li>
                <li><a href="<?=base_url?>Usuario/lista"><i class="fa fa-circle-o"></i> Lista</a></li>
                <li><a href="<?=base_url?>Usuario/listaPermisos"><i class="fa fa-circle-o"></i> Permisos</a></li>
                
              </ul>
            </li>
            <?php endif; ?>
            
            <?php if($_SESSION['Metas']==1): ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Metas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php if(isset($_SESSION['admin'])):?>
                <li><a href="<?=base_url?>Metas/listaMetaEmpresa"><i class="fa fa-circle-o"></i> Empresa</a></li>
                <li><a href="<?=base_url?>Metas/listaMetaDepartamento"><i class="fa fa-circle-o"></i> Departamento</a></li>
                <li><a href="<?=base_url?>Metas/listaMetaEmpleado"><i class="fa fa-circle-o"></i> Empleado</a></li>
                <?php endif; ?>
                <li><a href="<?=base_url?>Metas/metasPersonales&id=<?=$_SESSION['identity']->id_emp?>"><i class="fa fa-circle-o"></i> Mis Metas</a></li>
              </ul>
            </li>
            <?php endif; ?>
            
            <?php if($_SESSION['Capacitacion']==1): ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Capacitacion</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                  <li><a href="<?=base_url?>Capacitacion/lista"><i class="fa fa-circle-o"></i> Lista </a></li>
                <li><a href="<?=base_url?>Capacitacion/registrar"><i class="fa fa-circle-o"></i> Registrar</a></li>
              </ul>
            </li>
            <?php endif; ?>
            
            <?php if($_SESSION['Configuracion']==1): ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Configuracion</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="consultacompras.php"><i class="fa fa-circle-o"></i> Consulta Compras</a></li>                
              </ul>
            </li>
            <?php endif; ?>
            
            <?php if($_SESSION['Departamento']==1): ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i> <span>Organigramas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url?>Departamento/organigrama"><i class="fa fa-circle-o"></i> Areas Empresa</a></li>
                <li><a href="<?=base_url?>Empleado/organigrama"><i class="fa fa-circle-o"></i> Jerarquia Empleado</a></li>
              </ul>
            </li>
            <?php endif; ?>
            
            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Reportes</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Ayuda De...</span>
                <small class="label pull-right bg-yellow">RH</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
  
  <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">