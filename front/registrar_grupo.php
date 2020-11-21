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
    


		 <div class="col-md-12">
			<div class="card">
			 	<div class="card-header">
			    <div class="row">
			    	<div class="col-md-9">
			        <h4 class="card-title">Completa los datos<small class="description"></small></h4>
			      </div>
			      <div class="col-md-3">
			        
			      </div>
			    </div>
			  </div>
			  <div class="card-body">
			  	<div class="form-group">
	          <label for="grupo_nombre">Nombre del Grupo</label>
	          <input type="text" class="form-control" id="grupo_nombre" autocomplete="on">
	        </div>

	        <div class="form-group">
			      <label for="carrera_id">Carrera</label>
			      <select class="form-control" id="carrera_id" required="yes">
					    <option>Selecciona...</option>
					    <option v-for="carrera in l_carreras" v-bind:value="carrera.carrera_id">{{ carrera.carrera_nombre }}</option>
			      </select>
			    </div>

			    <div class="form-group">
			      <label for="grupo_semestre">Semestre</label>
			      <select class="form-control" id="grupo_semestre" required="yes">
					    <option value="0">Selecciona...</option>
					    <?php foreach ($lista_semestres as $key => $value): ?>
					    	<option value="<?= $key ?>"><?= $value ?></option>
					    <?php endforeach; ?>
			      </select>
			    </div>
			    <br>
			    <button class="btn btn-success" type="submit" @click="registrarGrupo();">Registrar</button>
			    
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
	  	showingdeleteModal: false,
	  	errorMessage: "",
	  	successMessage: "",
	  	l_carreras: [],
	  },

	  mounted: function () {
	  	console.log("Vue.js esta corriendo...");
	  	this.leercarreras();
	  },

	  methods: {
	  	leercarreras: function () {
	  		axios.get('<?= $axios_url ?>registrar_grupo.php?accion=leer_carreras')
	  		.then(function (response) {
	  			console.log(response);

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  			} else {
	  				app.l_carreras = response.data.l_carreras;
	  			}
	  		})
	  	},
	  	
	  	registrarGrupo:function(){
	  		let formdata=new FormData();
	  		formdata.append("grupo_nombre",document.getElementById("grupo_nombre").value);
	  		formdata.append("carrera_id",document.getElementById("carrera_id").value);
	  		formdata.append("grupo_semestre",document.getElementById("grupo_semestre").value);

	  		axios.post('<?= $axios_url ?>registrar_grupo.php?accion=registrar', formdata)
	  		.then(function(response){
	  			console.log(response);

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  				app.notificacionE('top','center');
	  			} else {
	  				app.successMessage = response.data.message;
	          app.notificacionS('top','center');
	          window.location.href = "inicio.php?accion=grupos";
	  			}
	  		})
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