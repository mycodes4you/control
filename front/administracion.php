<?php
	// --- Include del encabezado ---
	include('encabezado.php');
	// --- Include del menú ---
	include('menu.php');
  // --- Include del título ---
  include('titulo.php');
?>

			<div class="content" id="app" v-cloak>

        <br>
        <!--  row mensajes -->
        <?php if($_SESSION['mensajes']['aviso'] != ''): ?>
          <div class="row">
            <div class="col-lg-12">
              <div class="alert alert-success" align="center">
                <h3><STRONG><?= $_SESSION['mensajes']['aviso'] ?></STRONG></h3>
              </div>
            </div>		
          </div>
        <?php endif; ?>
				
				<div class="row">
          <div class="col-md-12">
              <div class="card ">
                <div class="card-body ">
                  <div class="row"> 
                    <div class="col-md-3"><center>
                      <img src="imagenes/logocut.png" width="50%"></center>
                    </div>
                    <div class="col-md-9">
                      <div class="tab-content">
                        <div class="tab-pane active" id="link4" style="margin-top: 4%;margin-bottom: 0px;">
													<center>
                          	<h3><b>CENTRO UNIVERSITARIO TLACAÉLEL</b></h3>
                            <span><big><b><?= $saludo ?> </big><br>{{moment(date).format('LLLL a')}}</b></span>
                          </center>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
				
				<div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="imagenes/fondo1.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                   <img class="avatar border-gray" src="<?= $_SESSION['usuario_foto'] ?>" alt="<?= $_SESSION['usuario_nom_completo'] ?>">
									<h5 class="title"><?= $_SESSION['usuario_nom_completo'] ?></h5>
                </div>
                <p class="text-center">
                  <?= $_SESSION['tipo'] ?>
                </p>
              </div>
              <hr>
            </div>
          </div>
         
          <div class="col-md-8">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header" style="text-align: center;">
                  <h4 class="card-title">Accesos Rapidos
                    <small class="description"> </small>
                  </h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <a href="inicio.php?accion=administradores" class="btn btm-large" style="width: 100%; height: 60px; background-color: #007bff;"><b><i class="fas fa-user-plus"></i><br>Registrar Administrador</b></a>
                    </div>
                    <div class="col-md-4">
                      <a href="inicio.php?accion=registrar_profesor" class="btn btn-danger btm-large" style="width: 100%; height: 60px; background-color: #ff8707;"><b><i class="fas fa-user-plus"></i><br>Registrar Profesor</b></a>
                    </div>
                    <div class="col-md-4">
                      <a href="inicio.php?accion=registrar_alumno" class="btn btn-danger btm-large" style="width: 100%; height: 60px; background-color: #17a2b8;"><b><i class="fas fa-user-plus"></i><br>Registrar Alumno</b></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <a href="inicio.php?accion=administradores" class="btn btm-large" style="width: 100%; height: 60px; background-color: #007bff;"><b><i class="fas fa-user-plus"></i><br>Listas Administradores</b></a>
                    </div>
                    <div class="col-md-4">
                      <a href="inicio.php?accion=profesores" class="btn btn-danger btm-large" style="width: 100%; height: 60px; background-color: #ff8707;"><b><i class="fas fa-user-plus"></i><br>Listas Profesores</b></a>
                    </div>
                    <div class="col-md-4">
                      <a href="inicio.php?accion=lista_alumnos" class="btn btn-danger btm-large" style="width: 100%; height: 60px; background-color: #17a2b8;"><b><i class="fas fa-user-plus"></i><br>Listas Alumnos</b></a>
                    </div>
                  </div>
                </div>
                
                </div>
              </div>
            </div>

          </div>

        </div>
      

        
        <br>

				<footer class="footer">
          <div class=" container-fluid ">
            <div class="copyright" id="copyright">
              &copy;
              <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
              </script>, Atom RM.
            </div>
          </div>
        </footer>
      </div>

<script src="assets/js/jquery.js"></script>
<script src="assets/js/vue.min.js"></script>
<script src="assets/js/vue-moment.js"></script>
<script type="text/javascript">
  Vue.use('vue-moment');
  var now = moment();
  moment.locale('es');
  var app = new Vue({ 
    el: "#app",
    data: {
      date: '',
    },

    mounted: function () {
      console.log("Vue.js esta corriendo...");
      console.log(moment().format('LLLL')); // 16:13:11
  
    },
    methods: {
      moment: function () {
      return moment();
      }
    },
    filters: {
      //moment: function (date) {
        //return moment(date).format('MMMM Do YYYY, h:mm:ss a');
      //}
    },
  });
</script>
<?php

	// --- Include de Pie de página ---
	include('pie.php');

?>