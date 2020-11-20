
<body class=" sidebar-mini ">
  
  <div class="wrapper ">
    
    <div class="sidebar" data-color="red">
     
      <div class="logo">
        <a href="index.php" class="simple-text logo-mini">
          <img src="imagenes/logocut.png">
        </a>
        <a href="index.php" class="simple-text logo-normal">
          Control Escolar
        </a>
        <div class="navbar-minimize">
          <button id="minimizeSidebar" class="btn btn-simple btn-icon btn-neutral btn-round">
            <i class="now-ui-icons text_align-center visible-on-sidebar-regular"></i>
            <i class="now-ui-icons design_bullet-list-67 visible-on-sidebar-mini"></i>
          </button>
        </div>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <div class="user">
          <?php if($_SESSION['tipo'] == 'Alumno'): ?>
            <div class="photo">            
              <img src="<?= $_SESSION['alumno_foto'] ?>" />
            </div>
            <div class="info">
              <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                <span>
                  <b>
                  <?= $_SESSION['usuario_nom_corto'] ?><br>
                  <small>Alumno</small>
                  <small><?= $semestre ?></small>                  
                  </b>
                </span>							
              </a>
            </div>
          <?php elseif($_SESSION['tipo'] == 'Profesor'): ?>
            <div class="photo">            
              <img src="<?= $_SESSION['profesor_foto'] ?>" />
            </div>
            <div class="info">
              <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                <span>
                  <b>
                  <?= $_SESSION['usuario_nom_corto'] ?><br>
                  <small>Profesor</small>
                  </b>
                </span>             
              </a>
            </div>
          <?php elseif($_SESSION['tipo'] == 'Administrador'): ?>
            <div class="photo">            
              <img src="<?= $_SESSION['administrador_foto'] ?>" />
            </div>
            <div class="info">
              <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                <span>
                  <b>
                  <?= $_SESSION['usuario_nom_corto'] ?><br>
                  <small>Administrador</small>
                  </b>
                </span>             
              </a>
            </div>
          <?php endif; ?>
        </div>
        <ul class="nav">
          <?php if($_SESSION['tipo'] == 'Administrador'): ?>
            <li class="<?= $menu_administracion ?>">
              <a href="inicio.php?accion=administracion">
                <i class="now-ui-icons design_app"></i>
                <p>Administración</p>
              </a>
            </li>
            <li class="<?= $registrar_alumno ?>">
              <a href="inicio.php?accion=registrar_alumno">
                <i class="now-ui-icons design_app"></i>
                <p>Registrar Alumno</p>
              </a>
            </li>
            <li class="<?= $registrar_profesor ?>">
              <a href="inicio.php?accion=registrar_profesor">
                <i class="now-ui-icons design_app"></i>
                <p>Registrar Profesor</p>
              </a>
            </li>
            <li class="<?= $registrar_grupo ?>">
              <a href="inicio.php?accion=registrar_grupo">
                <i class="now-ui-icons design_app"></i>
                <p>Registrar Grupo</p>
              </a>
            </li>
            <li class="<?= $lista_alumnos ?>">
              <a href="inicio.php?accion=lista_alumnos">
                <i class="now-ui-icons design_app"></i>
                <p>Lista de Alumnos</p>
              </a>
            </li>
          <?php elseif($_SESSION['tipo'] == 'Profesor'): ?>
          <?php elseif($_SESSION['tipo'] == 'Alumno'): ?>
            <li class="<?= $menu_cuenta ?>">
              <a href="inicio.php?accion=cuenta">
                <i class="now-ui-icons design_app"></i>
    						<p>Mi Cuenta</p>
              </a>
            </li>
            <li class="<?= $menu_calificaciones ?>">
              <a href="inicio.php?accion=calificaciones">
                <i class="now-ui-icons business_chart-pie-36"></i>
                <p>Calificaciones</p>
              </a>
            </li>
            <li class="<?= $menu_mensajes ?>">
            <a href="inicio.php?accion=mensajes">
              <i class="now-ui-icons ui-1_send"></i>
              <p>
                Mensajes 
                <?php if($mensajes_no_leidos > 0): ?>
                  <span class="badge badge-pill badge-danger"><?= $mensajes_no_leidos ?></span>
                <?php endif; ?>
              </p>
            </a>
            </li>
            
            <li>
              <a href="talleres.php">
                <i class="now-ui-icons ui-2_settings-90"></i>
                <p>Talleres</p>
              </a>
            </li>
            <li>
              <a href="planes-de-estudio.php">
                <i class="now-ui-icons text_align-left"></i>
                <p>Planes de Estudios</p>
              </a>
            </li>
            <li>
              <a href="finanzas.php">
                <i class="now-ui-icons business_chart-bar-32"></i>
                <p>Finanzas</p>
              </a>
            </li>
            <li>
              <a href="calendario.php">
                <i class="now-ui-icons ui-1_calendar-60"></i>
                <p>Calendario</p>
              </a>
            </li>
            <?php endif; ?>
  					<li>
            <a href="login.php?accion=salir">
              <i class="now-ui-icons ui-1_simple-remove"></i>
              <p>
                Cerrar Sesión
              </p>
            </a>
					</li>
        </ul>
      </div>
    
    </div>
