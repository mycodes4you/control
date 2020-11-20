<?php
	// --- Include del encabezado ---
	include('encabezado.php');
	// --- Include del menú ---
	include('menu.php');
  // --- Include del título ---
  include('titulo.php');
?>

		
	<div class="content" id="root" v-cloak>
			

					
		<div class="col-md-12">
			<div class="card">
			 	<div class="card-header">
			       	<div class="row">
			            <div class="col-md-9">
			                <h4 class="card-title">Alumnos <small class="description"></small></h4>
			            </div>
			            <div class="col-md-3">
			                <button class="btn btn-success" @click="app.showingaddModal = true;"><b><i class="fa fa-user-plus"></i> Agregar Alumno</b></button>
			            </div>
			        </div>
			    </div>
			    <div class="card-body table-full-width">
			        <div class="table-responsive">
			        	
			                    
			            <table class="table">
			                <thead class="text-primary">
			                    <tr>
			                      	<th>Matricula</th>
			                        <th>Nombre</th>
			                        <th>Email</th>
			                        <th>Teléfono</th>
			                        <th>Acciones</th>
			                    </tr>
			                </thead>
			                <tbody class="tbody-custom">
			                	<paginate name="alumnos" :list="alumnos" class="paginate-list" :per="5">
			                	<tr v-for="alumno in paginated('alumnos')" class="menu-item">
			                        <td>{{alumno.alumno_matricula}}</td>
			                        <td>{{alumno.alumno_apaterno}} {{alumno.alumno_amaterno}} {{alumno.alumno_nombres}}</td>
			                        <td>{{alumno.alumno_email}}</td>
			                        <td>{{alumno.alumno_telefono}}</td>
			                        <td>
			                          	<button class="btn btn-warning btn-sm btn-icon" @click="showingeditModal = true; selectAlumno(alumno);"><i class="fa fa-edit" aria-hidden="true"></i></button>
			                          	<a href="#" title="Eliminar Alumno" class="btn btn-danger btn-sm btn-icon" @click="showingdeleteModal = true; selectAlumno(alumno);"><i class="fa fa-eraser" aria-hidden="true"></i></a>
			                        </td>
			                    </tr>
			                </paginate>
			                </tbody>
			            </table>
									<paginate-links for="alumnos" :classes="{'ul': 'pagination', 'li': 'page-item', 'a': 'page-link'}" :show-step-links="true"></paginate-links>
			        </div>
			    </div>
			</div>
		</div>

		<!-- Modal Agregar -->
		<form @submit.prevent="addAlumno">
			<div class="modal" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true" v-if="showingaddModal" aria-hidden="true">
				<div class="modal-dialog modal-dialog-scrollable bd-example-modal-md" role="document">
					<div class="modal-content">
					    <div class="modal-header">
						    <h5 class="modal-title" id="exampleModalLabel">Agregar Alumno</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="showingaddModal = false;">
								<span aria-hidden="true">&times;</span>
							</button>
					    </div>
						<div class="modal-body">
							<div class="alert alert-primary" role="alert">
							  	Datos Personales
							</div>

							<div class="form-group">
								<label for="alumno_apaterno" :class="{'has-error': errors.has('Apellido Paterno') }">Apellido Paterno</label>
								<input type="text" class="form-control" id="alumno_apaterno" placeholder="Apellido Paterno" v-model="newAlumno.alumno_apaterno" v-validate="'required'" autocomplete="off" required name="Apellido Paterno">
								<p class="text-danger" v-if="errors.has('Apellido Paterno')">{{errors.first('Apellido Paterno')}}</p>
							</div>
							<div class="form-group">
								<label for="alumno_amaterno" :class="{'has-error': errors.has('Apellido Materno') }">Apellido Materno</label>
								<input type="text" class="form-control" id="alumno_amaterno" placeholder="Apellido Materno" v-model="newAlumno.alumno_amaterno" v-validate="'required'" autocomplete="off" required name="Apellido Materno">
								<p class="text-danger" v-if="errors.has('Apellido Materno')">{{errors.first('Apellido Materno')}}</p>
							</div>
							<div class="form-group" :class="{'has-error': errors.has('Nombre') }" >
								<label for="alumno_nombres">Nombre(s)</label>
								<input type="text" class="form-control" id="alumno_nombres" placeholder="Nombre(s)" v-model="newAlumno.alumno_nombres" v-validate="'required'" autocomplete="off" required name="Nombre">
								 <p class="text-danger" v-if="errors.has('Nombre')">{{errors.first('Nombre')}}</p>
							</div>
							<div class="form-group">
								<label for="alumno_matricula" :class="{'has-error': errors.has('Matricula') }">Matricula</label>
								<input type="text" class="form-control" id="alumno_matricula" placeholder="Matricula" v-model="newAlumno.alumno_matricula" v-validate="'required'|'digits:10'" autocomplete="off" required name="Matricula">
								<p class="text-danger" v-if="errors.has('Matricula')">{{errors.first('Matricula')}}</p>
							</div>
							<div class="form-group">
								<label for="alumno_email" :class="{'has-error': errors.has('Email') }">Email</label>
								<input type="email" class="form-control" id="alumno_email" placeholder="alumno@ejemplo.com" v-model="newAlumno.alumno_email" v-validate="'email'|'required'" autocomplete="off" required name="Email">
								<p class="text-danger" v-if="errors.has('Email')">{{errors.first('Email')}}</p>
							</div>
							<div class="form-group">
								<label for="alumno_telefono" :class="{'has-error': errors.has('Teléfono') }">Teléfono</label>
								<input type="text" class="form-control" id="alumno_telefono" placeholder="Teléfono" v-model="newAlumno.alumno_telefono" v-validate="'required'|'digits:10'" autocomplete="off" required name="Teléfono">
								<p class="text-danger" v-if="errors.has('Teléfono')">{{errors.first('Teléfono')}}</p>
							</div>
							<div class="form-group">
								<label for="alumno_telegram" :class="{'has-error': errors.has('ID Telegram') }">ID Telegram</label>
								<input type="text" class="form-control" id="alumno_telegram" placeholder="ID Telegram" v-model="newAlumno.alumno_telegram" v-validate="'required'|'digits:10'" autocomplete="off" required name="ID Telegram">
								<p class="text-danger" v-if="errors.has('ID Telegram')">{{errors.first('ID Telegram')}}</p>
							</div>
							<div class="alert alert-primary" role="alert">
							  	Dirección
							</div>
							<div class="form-group">
								<label for="alumno_d_calle">Calle</label>
								<input type="text" class="form-control" id="alumno_d_calle" placeholder="Calle" v-model="newAlumno.alumno_d_calle" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_d_n_ext">Número Exterior</label>
								<input type="text" class="form-control" id="alumno_d_n_ext" placeholder="Número Exterior" v-model="newAlumno.alumno_d_n_ext" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_d_n_int">Número Interior</label>
								<input type="text" class="form-control" id="alumno_d_n_int" placeholder="Número Interior" v-model="newAlumno.alumno_d_n_int" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_d_colonia">Colonia</label>
								<input type="text" class="form-control" id="alumno_d_colonia" placeholder="Colonia" v-model="newAlumno.alumno_d_colonia" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_d_municipio">Municipio</label>
								<input type="text" class="form-control" id="alumno_d_municipio" placeholder="Municipio" v-model="newAlumno.alumno_d_municipio" autocomplete="off">
							</div>
							<div class="form-group">
							    <label for="alumno_d_estado">Estado</label>
							    <select class="form-control" id="alumno_d_estado" v-model="newAlumno.alumno_d_estado">
							    	<option v-for="estado in estados" v-bind:value="estado.estado">{{ estado.estado }}</option>
							    </select>
							</div>
							<div class="form-group">
								<label for="alumno_d_cp">Código Postal</label>
								<input type="text" class="form-control" id="alumno_d_cp" placeholder="Código Postal" v-model="newAlumno.alumno_d_cp" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_d_pais">País</label>
								<input type="text" class="form-control" id="alumno_d_pais" placeholder="País" v-model="newAlumno.alumno_d_pais" autocomplete="off">
							</div>
							<div class="alert alert-primary" role="alert">
							  	Contacto de Emergencia
							</div>
							<div class="form-group">
								<label for="alumno_emergencia_contacto">Nombre Contacto</label>
								<input type="text" class="form-control" id="alumno_emergencia_contacto" placeholder="Nombre Contacto" v-model="newAlumno.alumno_emergencia_contacto" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_emergencia_telefono">Teléfono Contacto</label>
								<input type="text" class="form-control" id="alumno_emergencia_telefono" placeholder="Teléfono Contacto" v-model="newAlumno.alumno_emergencia_telefono" autocomplete="off">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-warning" @click="showingaddModal = false;">Cerrar</button>
							<button type="submit" class="btn btn-success" @click="showingaddModal = false; addAlumno();">Crear</button>
						</div>
					</div>
				</div>
			</div>
		</form>


		<!-- Modal Editar -->
		<form data-toggle="validator">
			<div class="modal" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodalLabel" aria-hidden="true" v-if="showingeditModal" >
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content">
					    <div class="modal-header">
						    <h5 class="modal-title" id="editmodalLabel">Editar Alumno</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="showingeditModal = false;">
								<span aria-hidden="true">&times;</span>
							</button>
					    </div>
						<div class="modal-body">
							<div class="alert alert-primary" role="alert">
							  	Datos Personales
							</div>

							<div class="form-group">
								<label for="alumno_apaterno">Apellido Paterno</label>
								<input type="text" class="form-control" id="alumno_apaterno" placeholder="Apellido Paterno" v-model="clickedAlumno.alumno_apaterno" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label for="alumno_amaterno">Apellido Materno</label>
								<input type="text" class="form-control" id="alumno_amaterno" placeholder="Apellido Materno" v-model="clickedAlumno.alumno_amaterno" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label for="alumno_nombres">Nombre(s)</label>
								<input type="text" class="form-control" id="alumno_nombres" placeholder="Apellido Materno" v-model="clickedAlumno.alumno_nombres" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label for="alumno_matricula">Matricula</label>
								<input type="text" class="form-control" id="alumno_matricula" placeholder="Matricula" v-model="clickedAlumno.alumno_matricula" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label for="alumno_email">Email</label>
								<input type="text" class="form-control" id="alumno_email" placeholder="alumno@ejemplo.com" v-model="clickedAlumno.alumno_email" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label for="alumno_telefono">Teléfono</label>
								<input type="text" class="form-control" id="alumno_telefono" placeholder="Teléfono" v-model="clickedAlumno.alumno_telefono" autocomplete="off" required>
							</div>
							<div class="form-group">
								<label for="alumno_telegram">ID Telegram</label>
								<input type="text" class="form-control" id="alumno_telegram" placeholder="ID Telegram" v-model="clickedAlumno.alumno_telegram" autocomplete="off">
							</div>
							 	
							<div class="alert alert-primary" role="alert">
							  	Dirección
							</div>
							<div class="form-group">
								<label for="alumno_d_calle">Calle</label>
								<input type="text" class="form-control" id="alumno_d_calle" placeholder="Calle" v-model="clickedAlumno.alumno_d_calle" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_d_n_ext">Número Exterior</label>
								<input type="text" class="form-control" id="alumno_d_n_ext" placeholder="Número Exterior" v-model="clickedAlumno.alumno_d_n_ext" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_d_n_int">Número Interior</label>
								<input type="text" class="form-control" id="alumno_d_n_int" placeholder="Número Interior" v-model="clickedAlumno.alumno_d_n_int" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_d_colonia">Colonia</label>
								<input type="text" class="form-control" id="alumno_d_colonia" placeholder="Colonia" v-model="clickedAlumno.alumno_d_colonia" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_d_municipio">Municipio</label>
								<input type="text" class="form-control" id="alumno_d_municipio" placeholder="Municipio" v-model="clickedAlumno.alumno_d_municipio" autocomplete="off">
							</div>
							<div class="form-group">
							    <label for="alumno_d_estado">Estado</label>
							    <select class="form-control" id="alumno_d_estado" v-model="clickedAlumno.alumno_d_estado">
							    	<option v-for="estado in estados" v-bind:value="estado.estado">{{ estado.estado }}</option>
							    </select>
							</div>
							<div class="form-group">
								<label for="alumno_d_cp">Código Postal</label>
								<input type="text" class="form-control" id="alumno_d_cp" placeholder="Código Postal" v-model="clickedAlumno.alumno_d_cp" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_d_pais">País</label>
								<input type="text" class="form-control" id="alumno_d_pais" placeholder="País" v-model="clickedAlumno.alumno_d_pais" autocomplete="off">
							</div>
							<div class="alert alert-primary" role="alert">
							  	Contacto de Emergencia
							</div>
							<div class="form-group">
								<label for="alumno_emergencia_contacto">Nombre Contacto de Emergencia</label>
								<input type="text" class="form-control" id="alumno_emergencia_contacto" placeholder="Nombre contacto de Emergencia" v-model="clickedAlumno.alumno_emergencia_contacto" required="true" autocomplete="off">
							</div>
							<div class="form-group">
								<label for="alumno_emergencia_telefono">Teléfono Contacto de Emergencia</label>
								<input type="text" class="form-control" id="alumno_emergencia_telefono" placeholder="Teléfono" v-model="clickedAlumno.alumno_emergencia_telefono" autocomplete="off">
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-warning" @click="showingeditModal = false;">Cerrar</button>
							<button type="submit" class="btn btn-success" @click="showingeditModal = false; updateAlumno();">Guardar</button>
						</div>
					</div>
				</div>
			</div>
		</form>

		<!-- Delete Editar -->
		<form data-toggle="validator">
			<div class="modal" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deletemodalLabel" aria-hidden="true" v-if="showingdeleteModal" >
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content">
					    <div class="modal-header">
						    <h5 class="modal-title" id="deleteModalLabel">Eliminar Alumno</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="showingdeleteModal = false;">
								<span aria-hidden="true">&times;</span>
							</button>
					    </div>
						<div class="modal-body">
							Se eliminara el Alumno con la matricula: {{clickedAlumno.alumno_matricula}}
						</div>
						<div class="modal-footer">
						   	<button type="button" class="btn btn-warning" @click="showingdeleteModal = false;">Cerrar</button>
						    <button type="submit" class="btn btn-danger" @click="showingdeleteModal = false; deleteAlumno();">Eliminar</button>
						</div>
					</div>
				</div>
			</div>
		</form>

	
	</div>

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
  	Vue.use(VuePaginate);
  	Vue.use(VeeValidate, {
		classes: true,// Sí queremos que ponga clases automáticamente
		// Indicar qué clase poner al input en caso de que sea
		// válido o inválido. Usamos Bootstrap 4
		classNames: {
			valid: "is-valid",
			invalid: "is-invalid",
		},
		// Podría ser blur, change, etcétera. Si está vacío
		// entonces se tiene que validar manualmente
		events: "change|blur|keyup",
	});
  	VeeValidate.Validator.localize("es");
  	var app = new Vue({ 

	  el: "#root",
	  data: {
	  	
	  	showingaddModal: false,
	  	showingeditModal: false,
	  	showingdeleteModal: false,
	  	errorMessage: "",
	  	successMessage: "",
	    alumnos: [],
	    users: "",
	  	newAlumno: {
	  		alumno_matricula: "", 
	  		alumno_apaterno: "", 
	  		alumno_amaterno: "", 
	  		alumno_nombres: "", 
	  		alumno_email: "", 
	  		alumno_telefono: "",
	  		alumno_telegram: "",
	  		alumno_d_calle: "",
	  		alumno_d_n_ext: "",
	  		alumno_d_n_int: "",
	  		alumno_d_colonia: "",
	  		alumno_d_municipio: "",
	  		alumno_d_estado: "",
	  		alumno_d_cp: "",
	  		alumno_d_pais: "",
	  		alumno_emergencia_contacto: "",
	  		alumno_emergencia_telefono: "",
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
	  	paginate: ['alumnos'],
	  },

	  mounted: function () {
	  	console.log("Vue.js esta corriendo...");
	  	this.getAllAlumnos();
	  },

	  methods: {
	  	getAllAlumnos: function () {
	  		axios.get('https://atom-rm.com/control/api/v1.php?action=leer')
	  		//axios.get('https://localhost/control/api/v1.php?action=leer')
	  		.then(function (response) {
	  			console.log(response);

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  			} else {
	  				app.alumnos = response.data.alumnos;
	  			}
	  		})
	  	},

	  	addAlumno: function () {
	  		

	  		var formData = app.toFormData(app.newAlumno);
	  		axios.post('https://atom-rm.com/control/api/v1.php?action=agregar', formData)
	  		//axios.post('https://localhost/control/api/v1.php?action=agregar', formData)
	  		.then(function (response) {
	  			console.log(response);
	  			app.newAlumno = {
	  				alumno_matricula: "", 
	  				alumno_apaterno: "", 
	  				alumno_amaterno: "", 
	  				alumno_nombres: "", 
	  				alumno_email: "", 
	  				alumno_telefono: "",
		  			alumno_telegram: "",
			  		alumno_d_calle: "",
			  		alumno_d_n_ext: "",
			  		alumno_d_n_int: "",
			  		alumno_d_colonia: "",
			  		alumno_d_municipio: "",
			  		alumno_d_estado: "",
			  		alumno_d_cp: "",
			  		alumno_d_pais: "",
			  		alumno_emergencia_contacto: "",
			  		alumno_emergencia_telefono: ""};

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  				app.notificacionE('top','center');
	  			} else {
	  				app.successMessage = response.data.message;
	          		//app.successMessage2 = response.data.message2;
	  				app.getAllAlumnos();
	  				app.notificacionS('top','center');
	  			}
	  		});
	  	},
	  	
	  	updateAlumno: function () {
	  		var formData = app.toFormData(app.clickedAlumno);
	  		axios.post('https://atom-rm.com/control/api/v1.php?action=actualizar', formData)
	  		//axios.post('https://localhost/control/api/v1.php?action=actualizar', formData)
	  		.then(function (response) {
	  			console.log(response);
	  			app.clickedAlumno = {};

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  				app.notificacionE('top','center');
	  			} else {
	  				app.successMessage = response.data.message;
	          		//app.successMessage2 = response.data.message2;
	  				app.getAllAlumnos();
	  				app.notificacionS('top','center');
	  			}
	  		});
	  	},

	  	deleteAlumno: function () {
	  		var formData = app.toFormData(app.clickedAlumno);
	  		axios.post('https://atom-rm.com/control/api/v1.php?action=eliminar', formData)
	  		//axios.post('https://localhost/control/api/v1.php?action=eliminar', formData)
	  		.then(function (response) {
	  			console.log(response);
	  			app.clickedAlumno = {};

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  				app.notificacionE('top','center');
	  			} else {
	  				app.successMessage = response.data.message;
	          		//app.successMessage2 = response.data.message2;
	  				app.getAllAlumnos();
	  				app.notificacionS('top','center');
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
	     	//app.successMessage2 = "";
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
		}


	  }
	});
  	</script>
<?php
include('../pie.php');
?>