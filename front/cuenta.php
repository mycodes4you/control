<?php 
	// --- Include del encabezado ---
	include('encabezado.php');
	// --- Include del menú ---
	include('menu.php');
  // --- Include del título ---
  include('titulo.php');
?>

	<div class="content" id="app">
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
                <a href="index.php"><img src="imagenes/logocut.png" width="50%"></a></center>
              </div>
              <div class="col-md-9">
                <div class="tab-content">
                  <div class="tab-pane active" id="link4" style="margin-top: 4%;margin-bottom: 0px;">
										<center>
                     	<h3><b>CENTRO UNIVERSITARIO TLACAÉLEL</b></h3>
                      <span><big><b><?= $saludo ?> </big><br><?= $hora_actual ?></b></span>
                      <br>
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
              <img class="avatar border-gray" src="<?= $_SESSION['alumno_foto'] ?>" alt="...">
  						<h5 class="title"><?= $_SESSION['usuario_nom_completo'] ?></h5>
              <p class="">
                <img src="assets/img/carreras/carrera_<?= $_SESSION['alumno_carrera'] ?>.png">
              </p>
            </div>
            <p class="text-center">Matricula: <b><?= $_SESSION['alumno_matricula'] ?></b><br><b><?= $semestre ?></b>
            </p>
          </div>
          <hr>
        </div>

        <div class="card">
          <div class="card-header" style="text-align: center;">
            <h7 class="card-title">Contacto de Emergencia
              <small class="description"> </small>
            </h7>
          </div>
          <div class="card-body">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Nombre</th>
                  <th scope="row">Telefono</th>
                </tr>
                <tr>
                  <td><?= $_SESSION['alumno_contacto_e_nombre'] ?></td>
                  <td><?= $_SESSION['alumno_contacto_e_telefono'] ?></td>
                </tr>
                <tr>
                  <th scope="row">Parentesco</th>
                  <td><?= $_SESSION['alumno_contacto_e_parentesco'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
         
      <div class="col-md-8">
        
        <div class="col-md-12">
          <div class="card card-stats">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="statistics">
                    <div class="info">
                      <div class="icon icon-danger">
                        <i class="now-ui-icons location_bookmark"></i>
                      </div>
                      <h3 class="info-title">8.3</h3>
                      <h6 class="stats-title">Promedio Semestre Actual</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="statistics">
                    <div class="info">
                      <div class="icon icon-success">
                        <i class="now-ui-icons objects_globe"></i>
                      </div>
                      <h3 class="info-title">8.7</h3>
                      <h6 class="stats-title">Promedio General</h6>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="statistics">
                    <div class="info">
                      <div class="icon icon-info">
                        <i class="now-ui-icons education_hat"></i>
                      </div><a href="inicio.php?accion=eventos">
                      <h3 class="info-title"><?= $n_eventos ?></h3>
                      <h6 class="stats-title">Eventos</h6></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          
        <div class="col-md-12">
          <div class="card">
            <div class="card-header" style="text-align: center;">
              <h4 class="card-title">Información Personal
                <small class="description"> </small>
              </h4>
            </div>
            <div class="card-body table-responsive">
              <table class="table">
                <tbody>
                  <tr>
                    <th scope="row" colspan="4" style="text-align: center;"><small class="description" style="font-size: large;">Dirección</small></th>
                  </tr>
                  <tr>
                    <th scope="row">Calle</th>
                    <td><?= $_SESSION['alumno_d_calle'] ?></td>
                    <th scope="row"># Exterior</th>
                    <td><?= $_SESSION['alumno_d_n_exterior'] ?></td>
                  </tr>
                  <tr>
                    <th scope="row"># Interior</th>
                    <td><?= $_SESSION['alumno_d_n_interior'] ?></td>
                    <th scope="row">Colonia</th>
                    <td><?= $_SESSION['alumno_d_colonia'] ?></td>                        
                  </tr>
                  <tr>
                    <th scope="row">Municipio</th>
                    <td><?= $_SESSION['alumno_d_municipio'] ?></td>
                    <th scope="row">Estado</th>
                    <td><?= $_SESSION['alumno_d_estado'] ?></td>                        
                  </tr>
                  <tr>
                    <th scope="row">país</th>
                    <td><?= $_SESSION['alumno_d_pais'] ?></td>
                    <th scope="row">CP</th>
                    <td><?= $_SESSION['alumno_d_cp'] ?></td>                        
                  </tr>
                  <tr>
                    <th scope="row" colspan="4" style="text-align: center;"><small class="description" style="font-size: large;">Contacto</small></th>
                  </tr>
                  <tr>
                    <th scope="row">Télefono</th>
                    <td><?= $_SESSION['alumno_telefono'] ?></td>
                    <th scope="row">Email</th>
                    <td><?= $_SESSION['alumno_email'] ?></td>                        
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
      
  <div class="row">
          
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
              <button class="btn btm-large" style="width: 100%; height: 60px;background-color:#9700FF ; border-color: ;"><b>Calificaciones</b></button>
            </div>
            <div class="col-md-4">
              <button class="btn btm-large" style="width: 100%; height: 60px;background-color:#3800FF ; border-color: ;"><b>Inscripcíón Actual</b></button>
            </div>
            <div class="col-md-4">
              <button class="btn btm-large" style="width: 100%; height: 60px;background-color:#0034FF ; border-color: ;"><b>Taller</b></button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <button class="btn btm-large" style="width: 100%; height: 60px;background-color:#0087FF ; border-color: ;"><b>Plan de Estudios</b></button>
            </div>
            <div class="col-md-4">
              <button class="btn btm-large" style="width: 100%; height: 60px;background-color:#00FF93 ; border-color: ;"><b>Finanzas</b></button>
            </div>
            <div class="col-md-4">
              <button class="btn btm-large" style="width: 100%; height: 60px;background-color:#00FF1C ; border-color: ;"><b>Reglamento</b></button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-header" style="text-align: center;">
          <h4 class="card-title">Eventos
            <small class="description">Proximos 3</small>
          </h4>
        </div>
        <div class="card-body">

        <div class="table-responsive">
          <table class="table">         
            <tbody>
              <?php $c = 0 ?>
              <?php foreach ($eventos as $key => $value): ?>
                <tr style="background-color: #ff3636; color: white;">
                  <td colspan="2" style="text-align: center;"><b><?= $value['evento_nombre'] ?></b></td>
                </tr>
                <tr>
                  <td style="width: 30%"><img src="<?= $value['evento_imagen'] ?>" style="width: 100%;"></td>
                  <td style="width: 70%"><small><?= $value['evento_fecha'] ?></small></td>
                  
                </tr>
                <?php if(++$i > 2) break; ?>
                <?php $c++ ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card">
        <div class="card-header" style="text-align: center;">
          <h4 class="card-title">Listado de Materias
            <small class="description"></small>
          </h4>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th class="text-center"><?= $semestre ?> / <?= $carrera_nombre ?>              
                </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($lista as $key => $value) : ?>
                <tr>
                  <td><?= $value['materia_descripcion'] ?></td>
                </tr>
              <?php endforeach; ?> 
            </tbody>
          </table>
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
  });
</script>

<?php

	// --- Include de Pie de página ---
	include('pie.php');

?>