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
			        <h4 class="card-title">Selecciona carrera y grupo<small class="description"></small></h4>
			      </div>
			      <div class="col-md-3">
			        
			      </div>
			    </div>
			  </div>
			  <div class="card-body">
			  	<label for="filtro_carreras">Carrera</label>
			  	<select class="form-control" id="filtro_carreras" onchange="carga_grupos(this.value);">
						<option value="0">Selecciona...</option>
						<?php foreach ($l_carreras as $cid => $cnombre):?>
							<option value="<?= $cnombre['carrera_id'] ?>"><?= $cnombre['carrera_nombre'] ?></option>
						<?php endforeach; ?>
					</select>
					<!--<pre>
						<?php print_r($l_grupos); ?>
					</pre>-->
					<label for="filtro_grupo">Grupo</label>
			  	<select class="form-control" id="filtro_grupo">
						<option value="0">Selecciona Primero una Carrera...</option>			
					</select>
					<br>
					<div id="respuesta"></div>
					<button type="submit" class="btn btn-success" @click="muestraLista = true; cargaalumnos();">Buscar</button>
						  
			  	
			  </div>
			</div>
		</div>

		<div class="col-md-12" id="muestraLista" v-if="muestraLista" >
			<div class="card">
			 	<div class="card-header">
			    <div class="row">
			    	<div class="col-md-9">
			        <h4 class="card-title" v-if="titulo">{{titulo}}<small class="description"></small></h4>
			      </div>
			      <div class="col-md-3">
			        
			      </div>
			    </div>
			  </div>
			  <div class="card-body">
			  	<table class="table">
			      <thead class="text-primary">
			        <tr>
			        	<th></th>
			         	<th>Matricula</th> 
			          <th>Nombre</th>
			          <th>Email</th>
			          <th>Teléfono</th>
			          <th>Acciones</th>
			        </tr>
			      </thead>
			      <tbody class="tbody-custom">
			       	<tr v-for="grupo in grupos" class="menu-item">
			       		<td><center><img class="avatar border-gray" :src="grupo.alumno_foto" alt="..." style="margin: 0;"></center></td>
			          <td>{{grupo.alumno_matricula}}</td>
			          <td>{{grupo.alumno_apaterno}} {{grupo.alumno_amaterno}} {{grupo.alumno_1ernombre}} {{grupo.alumno_2donombre}}</td>
			          <td>{{grupo.alumno_email}}</td>
			      	  <td>{{grupo.alumno_telefono}}</td>
			          <td>
			           	<button class="btn btn-warning btn-sm btn-icon" @click="showingeditModal = true; selectAlumno(alumno);"><i class="fa fa-edit" aria-hidden="true"></i></button>
			           	<a href="#" title="Eliminar Alumno" class="btn btn-danger btn-sm btn-icon" @click="showingdeleteModal = true; selectAlumno(alumno);"><i class="fa fa-eraser" aria-hidden="true"></i></a>
			          </td>
			        </tr>
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
<script src="assets/js/axios.min.js"></script>
<script>
	function carga_grupos(val){
	    $('#respuesta').html("Por favor espera un momento");    
	    var datos = 'accion=filtro_grupos'+'&filtro_carreras='+val;
	    $.ajax({
	        type: "POST",
	        url: 'lista_alumnos.php',
	        data: datos,
	        success: function(resp){
	            $('#filtro_grupo').html(resp);
	            $('#respuesta').html("");
	        }
	    });
	}
</script>

  	<script type="text/javascript">
  	var app = new Vue({ 

	  el: "#app",
	  data: {
	  	muestraLista: false,
	  	errorMessage: "",
	  	successMessage: "",
	    alumnos: [],
	    grupos: [],
	    titulo: [],
	  },

	  mounted: function () {
	  	console.log("Vue.js esta corriendo...");
	  	//this.getAllAlumnos();
	  },

	  methods: {
	  	cargaalumnos: function(){
	  		let formdata=new FormData();
	  		formdata.append("filtro_carreras",document.getElementById("filtro_carreras").value);
	  		formdata.append("filtro_grupo",document.getElementById("filtro_grupo").value);

	  		axios.post('<?= $axios_url ?>lista_alumnos.php?accion=lista_alumnos', formdata)
	  		.then(function(response){
	  			console.log(response);

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  				app.notificacionE('top','center');
	  			} else {
	  				app.grupos = response.data.grupos;
	  				app.titulo = response.data.titulo;
	  				app.successMessage = response.data.message;
	          app.notificacionS('top','center');
	  			}
	  		})
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