<!DOCTYPE html>
<html lang="es_MX">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Centro Universitario Tlacaélel | Bienvenido
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.4.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-mini ">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#pablo">Iniciar Sesión</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">

      </div>
    </div>
  </nav>
  <!-- End Navbar -->
	<div id="app">
		<div class="wrapper wrapper-full-page ">
			<div class="full-page login-page section-image" filter-color="black" data-image="imagenes/fondo1.jpg">
		  	<!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
		  	<div class="content">
					<div class="container">
						<div class="col-md-4 ml-auto mr-auto">
						<form id="inicioSesion" autosomplete="off" @submit.prevent="login" class="form">
							<div class="card card-login card-plain">
							<div class="card-header ">
								<div class="logo-container" style="width: 160px;">
								<img src="imagenes/logocut.png" alt="">
								</div>
							</div>
							<div class="card-body ">
								<div class="input-group no-border form-control-lg">
								<span class="input-group-prepend">
									<div class="input-group-text">
									<i class="now-ui-icons users_circle-08"></i>
									</div>
								</span>
								<input type="text" name="email" class="form-control" placeholder="Correo">
								</div>
								<div class="input-group no-border form-control-lg">
								<div class="input-group-prepend">
									<div class="input-group-text">
									<i class="now-ui-icons objects_key-25"></i>
									</div>
								</div>
								<input type="password" name="pass" placeholder="Contraseña" class="form-control">
								</div>
							</div>
							<div class="card-footer ">
								<button type="submit" class="btn btn-danger btn-round btn-lg btn-block mb-3"><b>INICIAR SESIÓN</b></button>
								<div class="pull-right">
								<h6>
									<a href="#pablo" class="link footer-link">¿Olvidaste tu contraseña?</a>
								</h6>
								</div>
							</div>
							</div>
						</form>
						</div>
					</div>
		  	</div>
		  	<footer class="footer">
					<div v-if="mostrarRespuesta"> <!-- Ayuda -->
						<p>res: {{ respuesta }}</p>
					</div>
					<div class=" container-fluid ">
			  		<div class="copyright" id="copyright">
								&copy;
							<script>
								document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
							</script>, Atom RM
						</div>
					</div>
		  	</footer>
			</div>
	  </div>
	</div>
	<!-- VueJS Library -->
	<script src="assets/js/vue.min.js"></script>
	<!-- Axios Library -->
	<script type="text/javascript" src="assets/js/axios.min.js"></script>
	
	<script id="login">
		
		Vue.config.devtools = false
		Vue.config.debug = false
		Vue.config.silent = true

		// --- objeto Vue.js	#app ---	
		const app = new Vue({

			el: '#app',
			data: {
				respuesta: '',
				mostrarRespuesta: false,
			},

			methods: {
				login(){
						
					const form = document.getElementById('inicioSesion')
					axios.post('login.php?accion=validar', new FormData(form))
					.then( res =>{
						this.respuesta = res.data
						if(res.data == 'success'){
							location.href = 'index.php'
						} else{
							this.mostrarRespuesta = true
							if(res.data == 'fail'){
								Swal.fire({
									type: 'error',
									title: 'Error',
									text: 'Correo y/o contraseña incorrectos!',
								})
							} else {
								Swal.fire({
									type: 'error',
									title: 'Error',
									text: 'Error al iniciar sesión',
								})
							}
						}
					})
						
				}
			}
		})

	</script>
	
	
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.min.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.4.1" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
</body>

</html>