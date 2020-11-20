<?php  
	// --- Include del encabezado ---
	include('encabezado.php');
	// --- Include del menú --- 
	include('menu.php');
  // --- Include del título ---
  include('titulo.php');

  ?>
	<div class="content" id="app" v-cloak>
		
		 <div class="col-md-12" v-if="formCURP">
			<div class="card">
			 	<div class="card-header">
			    <div class="row">
			    	<div class="col-md-9">
			        <h4 class="card-title">Ingresa la CURP<small class="description"></small></h4>
			      </div>
			      <div class="col-md-3">			        
			      </div>
			    </div>
			  </div>
			  <div class="card-body">
			  	<span class="badge badge-info">Se verificara si la CURP no esta registrada</span>
			    <div class="form-group">
	          <label for="alumno_curp">CURP</label>
	          <input type="text" class="form-control" id="alumno_curp" required="yes" autocomplete="on">
	        </div>

	        <button class="btn btn-success" type="submit" @click="formCURP = false; consultarCURP();">Verificar</button>
			  </div>
			</div>
		</div>


		<div class="col-md-12" v-if="formDatos">
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
			  	<div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
	          <div class="card card-plain">
	            <div class="card-header" role="tab" id="headingOne">
	              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	              <div class="alert alert-primary" role="alert">
	           			<i class="now-ui-icons arrows-1_minimal-down" style="color: white;"></i>
	                 	Datos Personales
	              </div>
	              </a>
	            </div>
	          	<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
	              <div class="card-body">
	              	<div class="form-group">
	                  <label for="alumno_curp">CURP</label>
	                  <input type="text" class="form-control" id="alumno_curp" v-model="app.curp" required="yes" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="alumno_apaterno">Apellido Paterno</label>
	                  <input type="text" class="form-control" id="alumno_apaterno" v-model="newAlumno.alumno_apaterno" required="yes" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="alumno_amaterno">Apellido Materno</label>
	                  <input type="text" class="form-control" id="alumno_amaterno" v-model="newAlumno.alumno_amaterno" required="yes" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="alumno_1ernombre">Primer Nombre</label>
	                  <input type="text" class="form-control" id="alumno_1ernombre" v-model="newAlumno.alumno_1ernombre" required="yes" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="alumno_2donombre">Segundo Nombre</label>
	                  <input type="text" class="form-control" id="alumno_2donombre" v-model="newAlumno.alumno_2donombre" autocomplete="on">
	                </div> 
	                <div class="form-group">
	                  <label for="alumno_email">Email</label>
	                  <input type="text" class="form-control" id="alumno_email" placeholder="alumno@ejemplo.com" v-model="newAlumno.alumno_email" required="true" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="alumno_telefono">Télefono</label>
	                  <input type="text" class="form-control" id="alumno_telefono" placeholder="Ejemplo: 55 12 77 04 04" v-model="newAlumno.alumno_telefono" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="usuario_telegramID">Telegram ID</label>
	                  <input type="text" class="form-control" id="usuario_telegramID" placeholder="Ejemplo: 8745895478" v-model="newAlumno.usuario_telegramID" autocomplete="on">
	                </div>
	              </div>
	            </div>
	              </div>
	              <div class="card card-plain">
	                <div class="card-header" role="tab" id="headingTwo">
	                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
	                  <div class="alert alert-primary" role="alert">
	                		<i class="now-ui-icons arrows-1_minimal-down" style="color: white;"></i>
	                  	Dirección
	                  </div>
	                  </a>
	                </div>
	                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
	                  <div class="card-body">
			                <div class="form-group">
			                  <label for="alumno_d_calle">Calle</label>
			                  <input type="text" class="form-control" id="alumno_d_calle" v-model="newAlumno.alumno_d_calle" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_n_exterior">Número Exterior</label>
			                  <input type="text" class="form-control" id="alumno_d_n_exterior" v-model="newAlumno.alumno_d_n_exterior" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_n_interior">Número Interior</label>
			                  <input type="text" class="form-control" id="alumno_d_n_interior" v-model="newAlumno.alumno_d_n_interior" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_colonia">Colonia</label>
			                  <input type="text" class="form-control" id="alumno_d_colonia" v-model="newAlumno.alumno_d_colonia" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_municipio">Municipio</label>
			                  <input type="text" class="form-control" id="alumno_d_municipio" v-model="newAlumno.alumno_d_municipio" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_estado">Estado</label>
			                  <select class="form-control" id="alumno_d_estado" v-model="newAlumno.alumno_d_estado">
			                <option v-for="estado in estados" v-bind:value="estado.estado">{{ estado.estado }}</option>
			                  </select>
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_cp">Codigo Postal</label>
			                  <input type="text" class="form-control" id="alumno_d_cp" v-model="newAlumno.alumno_d_cp" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_pais">País</label>
			                  <input type="text" class="form-control" id="alumno_d_pais" v-model="newAlumno.alumno_d_pais" autocomplete="on">
			                </div>
	                  </div>
	                </div>
	              </div>
	              <div class="card card-plain">
	                <div class="card-header" role="tab" id="headingThree">
	                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
	                	<div class="alert alert-primary" role="alert">
		                  <i class="now-ui-icons arrows-1_minimal-down" style="color: white;"></i>
		                  Datos Escolares
	                	</div>
	                  </a>
	                </div>
	                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
	                  <div class="card-body">
			                <div class="form-group">
			                  <label for="alumno_matricula">Matricula</label>
			                  <input type="text" class="form-control" id="alumno_matricula" v-model="newAlumno.alumno_matricula" required="yes" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_carrera">Carrera</label>
			                  <select class="form-control" id="alumno_carrera" required="yes">
					                <option>Selecciona...</option>
					                <option v-for="carrera in l_carreras" v-bind:value="carrera.carrera_id">{{ carrera.carrera_nombre }}</option>
			                  </select>
			                </div>
			                <div class="form-group">
			                  <label for="alumno_semestre">Semestre</label>
			                  <select class="form-control" id="alumno_semestre" v-model="newAlumno.alumno_semestre" required="yes">
					                <option>Selecciona...</option>
					                <option v-for="semestre in semestres" v-bind:value="semestre.id">{{ semestre.semestre }}</option>
			                  </select>
			                </div>
			                <div class="form-group">
			                  <label for="alumno_contacto_e_nombre">Nombre Contacto de Emergencia</label>
			                  <input type="text" class="form-control" id="alumno_contacto_e_nombre" v-model="newAlumno.alumno_contacto_e_nombre" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_contacto_e_telefono">Télefono Contacto de Emergencia</label>
			                  <input type="text" class="form-control" id="alumno_contacto_e_telefono" v-model="newAlumno.alumno_contacto_e_telefono" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_contacto_e_parentesco">Parentesco Contacto de Emergencia</label>
			                  <input type="text" class="form-control" id="alumno_contacto_e_parentesco" v-model="newAlumno.alumno_contacto_e_parentesco" autocomplete="on">
			                </div>
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
<script src="assets/js/axios.min.js"></script>
<script src="assets/js/vee-validate.js"></script>
<script src="assets/js/vee-validate_es.js"></script>
<script src="assets/js/vue-paginate.js"></script>

  	<script type="text/javascript">
  	var app = new Vue({ 

	  el: "#app",
	  data: {
	  	formCURP: true,
	  	formDatos: false,
	  	showingdeleteModal: false,
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
      semestres: [
        { semestre: 'Primer Semestre', id: 1},
        { semestre: 'Segundo Semeste', id: 2},
        { semestre: 'Tercer Semestre', id: 3},
        { semestre: 'Cuarto Semestre', id: 4},
        { semestre: 'Quinto Semestre', id: 5},
        { semestre: 'Sexto Semestre', id: 6},
        { semestre: 'Séptimo Semestre', id: 7},
        { semestre: 'Octavo Semestre', id: 8},
      ],
      selected: 'Selecciona...',
      selected2: 'Selecciona...',
      paginate: ['alumnos'],
	  },

	  mounted: function () {
	  	console.log("Vue.js esta corriendo...");
	  },

	  methods: {

	  	consultarCURP: function(){
	  		let formdata=new FormData();
	  		formdata.append("alumno_curp",document.getElementById("alumno_curp").value);
	  		axios.post('<?= $axios_url ?>registrar_alumno.php?accion=consultaCURP', formdata)
	  		.then(function(response){
	  			console.log(response);

	  			if (response.data.error) {
	  				app.formCURP = true;
	  				app.errorMessage = response.data.message;
	  				app.notificacionE('top','center');
	  			} else {
	  				app.successMessage = response.data.message;
	          app.notificacionS('top','center');
	          app.formDatos = true;
	          app.curp = response.data.curp;
	          app.l_carreras = response.data.l_carreras;
	  			}
	  		})
	  	},

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