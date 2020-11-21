<?php  
	// --- Include del encabezado ---
	include('encabezado.php');
	// --- Include del menú --- 
	include('menu.php');
  // --- Include del título ---
  include('titulo.php');

  ?>
	<div class="content" id="app" v-cloak>
	
		<div class="col-md-12">
			<div class="card">
			 	<div class="card-header">
			    <div class="row">
			    	<div class="col-md-9">
			        <h4 class="card-title">Completa el formulario<small class="description"></small></h4>
			      </div>
			      <div class="col-md-3">			        
			      </div>
			    </div>
			  </div>
			  <div class="card-body">
			  	<form action="registrar_profesor.php?accion=registrar_profesor" method="POST">
			  	<div class="form-group">
	                  <label for="profesor_apaterno">Apellido Paterno</label>
	                  <input type="text" class="form-control" id="profesor_apaterno" required="yes" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="profesor_amaterno">Apellido Materno</label>
	                  <input type="text" class="form-control" id="profesor_amaterno" required="yes" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="profesor_1ernombre">Primer Nombre</label>
	                  <input type="text" class="form-control" id="profesor_1ernombre" required="yes" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="profesor_2donombre">Segundo Nombre</label>
	                  <input type="text" class="form-control" id="profesor_2donombre"  autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="profesor_email">Email</label>
	                  <input type="text" class="form-control" id="profesor_email" placeholder="alumno@ejemplo.com"  required="true" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="profesor_telefono">Télefono</label>
	                  <input type="text" class="form-control" id="profesor_telefono" placeholder="Ejemplo: 55 12 77 04 04" autocomplete="on">
	                </div>
	                <button type="submit" class="btn btn-success">Registrar</button>
	              </form>
	                <div id="respuesta"></div>
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
<script src="assets/js/axios.min.js"></script>

          
  	<script type="text/javascript">
  	var app = new Vue({ 

	  el: "#app",
	  data: {
	  	errorMessage: "",
	  	successMessage: "",
	    alumnos: [],
	    usuarios: [],
	    users: "",
	    curp: "",
	    eurl: "",
	    carreras: [],
	  	newAlumno: {
	  		alumno_matricula: "", 
        alumno_apaterno: "", 
        alumno_amaterno: "",
        alumno_1ernombre: "",
        alumno_2donombre: "",
        alumno_email: "", 
        alumno_telefono: "",
        alumno_d_calle: "",
        alumno_d_n_exterior: "",
        alumno_d_n_interior: "",
        alumno_d_colonia: "",
        alumno_d_municipio: "",
        alumno_d_estado: "",
        alumno_d_cp: "",
        alumno_d_pais: "México",
        alumno_carrera: "",
        alumno_semestre: "",
        alumno_activo: "",
        usuario_Idtelegram: "",
        bitacora_usuario: "<?= $_SESSION['usuario_id'] ?>",
        usuario_telegramID: "",
        alumno_contacto_e_nombre: "",
        alumno_contacto_e_telefono: "",
        alumno_contacto_e_parentesco: "",
      },
	  	clickedAlumno: {},
	  	estados: [
        { estado: 'Selecciona'},
        { estado: 'Aguascalientes'},
        { estado: 'Baja California'},
        { estado: 'Baja California Sur'},
        { estado: 'Campeche'},
        { estado: 'Chiapas'},
        { estado: 'Chihuahua'},
        { estado: 'Coahuila de Zaragoza'},
        { estado: 'Colima'},
        { estado: 'Ciudad de México'},
        { estado: 'Durango'},
        { estado: 'Guanajuato'},
        { estado: 'Guerrero'},
        { estado: 'Hidalgo'},
        { estado: 'Jalisco'},
        { estado: 'Mexico'},
        { estado: 'Michoacan de Ocampo'},
        { estado: 'Morelos'},
        { estado: 'Nayarit'},
        { estado: 'Nuevo Leon'},
        { estado: 'Oaxaca'},
        { estado: 'Puebla'},
        { estado: 'Queretaro de Arteaga'},
        { estado: 'Quintana Roo'},
        { estado: 'San Luis Potosi'},
        { estado: 'Sinaloa'},
        { estado: 'Sonora'},
        { estado: 'Tabasco'},
        { estado: 'Tamaulipas'},
        { estado: 'Tlaxcala'},
        { estado: 'Veracruz'},
        { estado: 'Yucatan'},
        { estado: 'Zacatecas'},
      ],
	  },

	  mounted: function () {
	  	console.log("Vue.js esta corriendo...");
	  },

	  methods: {



	  	selectAlumno(Usuario) {
	  		app.clickedAlumno = Usuario;
	  	},

	  	toFormData: function (obj) {
	  		var form_data = new FormData();
	  		for (var key in obj) {
	  			form_data.append(key, obj[key]);
	  		}
	  		return form_data;
	  	},

	  	clearMessage: function (argument) {
	  		app.errorMessage   = "";
	  		app.successMessage = "";
	  	},

	  	notificacionS: function(from, align) {
		    color = 'success';

		    $.notify({
		      icon: "now-ui-icons ui-1_bell-53",
		      message: app.successMessage

		    }, {
		      type: color,
		      timer: 2000,
		      placement: {
		        from: from,
		        align: align
		      }
		    });
		},

		notificacionE: function(from, align) {
		    color = 'danger';

		    $.notify({
		      icon: "now-ui-icons ui-1_bell-53",
		      message: app.errorMessage

		    }, {
		      type: color,
		      timer: 2000,
		      placement: {
		        from: from,
		        align: align
		      }
		    });
		},



	  }
	});
  	</script>
<?php

	// --- Include de Pie de página ---
	include('pie.php');

?>