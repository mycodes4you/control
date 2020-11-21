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
			<form id="agregar_alumno" autosomplete="off" @submit.prevent="agregar_alumno" class="form" data-toggle="validator">	
				<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header" style="text-align: center;">
                <h4 class="card-title">Completa Correctamente los Datos
                  <small class="description"></small>
                </h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
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
                              <label for="alumno_apaterno">Apellido Paterno</label>
                              <input type="text" class="form-control" id="alumno_apaterno" placeholder="Apellido Paterno" v-model="newAlumno.alumno_apaterno" required="yes">
                            </div>
                            <div class="form-group">
                              <label for="alumno_amaterno">Apellido Materno</label>
                              <input type="text" class="form-control" id="alumno_amaterno" placeholder="Apellido Materno" v-model="newAlumno.alumno_amaterno" required="yes">
                            </div>
                            <div class="form-group">
                              <label for="alumno_1ernombre">Primer Nombre</label>
                              <input type="text" class="form-control" id="alumno_1ernombre" placeholder="Primer Nombre" v-model="newAlumno.alumno_1ernombre" required="yes">
                            </div>
                            <div class="form-group">
                              <label for="alumno_2donombre">Segundo Nombre</label>
                              <input type="text" class="form-control" id="alumno_2donombre" placeholder="Segundo Nombre" v-model="newAlumno.alumno_2donombre">
                            </div>
                            <div class="form-group">
                              <label for="alumno_email">Email</label>
                              <input type="text" class="form-control" id="alumno_email" placeholder="alumno@ejemplo.com" v-model="newAlumno.alumno_email" required="true">
                            </div>
                            <div class="form-group">
                              <label for="alumno_telefono">Telefono</label>
                              <input type="text" class="form-control" id="alumno_telefono" placeholder="Telefono" v-model="newAlumno.alumno_telefono">
                            </div>
                            <div class="form-group">
                              <label for="usuario_Idtelegram">ID Telegram</label>
                              <input type="text" class="form-control" id="usuario_Idtelegram" placeholder="ID Telegram" v-model="newAlumno.usuario_Idtelegram">
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
                              <input type="text" class="form-control" id="alumno_d_calle" placeholder="Calle" v-model="newAlumno.alumno_d_calle">
                            </div>
                            <div class="form-group">
                              <label for="alumno_d_n_exterior">Número Exterior</label>
                              <input type="text" class="form-control" id="alumno_d_n_exterior" placeholder="Número Exterior" v-model="newAlumno.alumno_d_n_exterior">
                            </div>
                            <div class="form-group">
                              <label for="alumno_d_n_interior">Número Interior</label>
                              <input type="text" class="form-control" id="alumno_d_n_interior" placeholder="Número Interior" v-model="newAlumno.alumno_d_n_interior">
                            </div>
                            <div class="form-group">
                              <label for="alumno_d_colonia">Colonia</label>
                              <input type="text" class="form-control" id="alumno_d_colonia" placeholder="Colonia" v-model="newAlumno.alumno_d_colonia">
                            </div>
                            <div class="form-group">
                              <label for="alumno_d_municipio">Municipio</label>
                              <input type="text" class="form-control" id="alumno_d_municipio" placeholder="Municipio" v-model="newAlumno.alumno_d_municipio">
                            </div>
                            <div class="form-group">
                              <label for="alumno_d_estado">Estado</label>
                              <select class="form-control" id="alumno_d_estado" v-model="newAlumno.alumno_d_estado">
                                <option v-for="estado in estados" v-bind:value="estado.estado">{{ estado.estado }}</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="alumno_d_cp">Codigo Postal</label>
                              <input type="text" class="form-control" id="alumno_d_cp" placeholder="Codigo Postal" v-model="newAlumno.alumno_d_cp">
                            </div>
                            <div class="form-group">
                              <label for="alumno_d_pais">País</label>
                              <input type="text" class="form-control" id="alumno_d_pais" placeholder="País" v-model="newAlumno.alumno_d_pais">
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
                              <input type="text" class="form-control" id="alumno_matricula" placeholder="Matricula" v-model="newAlumno.alumno_matricula" required="yes">
                            </div>
                            <div class="form-group">
                              <label for="carrera_id">Carrera</label>
                              <select class="form-control" id="carrera_id" v-model="selected" required="yes">
                                <option>Selecciona...</option>
                                <option v-for="carrera in carreras" v-bind:value="carrera.id">{{ carrera.carrera }}</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="semestre_id">Semestre</label>
                              <select class="form-control" id="semestre_id" v-model="selected2" required="yes">
                                <option>Selecciona...</option>
                                <option v-for="semestre in semestres" v-bind:value="semestre.id">{{ semestre.semestre }}</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <input type="hidden" id="bitacora_usuario" value="<?= $_SESSION['usuario_id'] ?>" required="yes">
                        <button class="btn btn-success" type="submit">Resgistrar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
      

        
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

<script type="text/javascript">
  var app = new Vue({ 
    el: "#app",
    data: {
      newAlumno: {
        alumno_matricula: "", 
        alumno_apaterno: "", 
        alumno_amaterno: "", 
        alumno_nombres: "", 
        alumno_email: "", 
        alumno_telefono: "",
        alumno_d_pais: "México",
        bitacora_usuario: ""},
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
      carreras: [
        { carrera: 'Administración Pública', id: 1},
        { carrera: 'Contaduría', id: 2},
        { carrera: 'Economía', id: 3},
        { carrera: 'Pedagogía', id: 4},
        { carrera: 'Psicopedagogía', id: 5},
        { carrera: 'Derecho', id: 6},
        { carrera: 'Periodismo y comunicación', id: 7},
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
    },

    mounted: function () {
      console.log("Vue.js esta corriendo...");
      //this.getAllAlumnos();
    },

    methods: {
      addAlumno: function () {
        var formData = app.toFormData(app.newAlumno);
        //axios.post('https://atom-rm.com/control/api/v1.php?action=agregar', formData)
        axios.post('https://localhost/control/alumno_registrar.php?action=agregar', formData)
        .then(function (response) {
          console.log(response);
          app.newAlumno = {
            alumno_matricula: "", 
            alumno_apaterno: "", 
            alumno_amaterno: "",
            alumno_1ernombre: "",
            alumno_2donombre: "",
            alumno_email: "", 
            alumno_telefono: "",
            alumno_d_calle: "",
            alumno_d_n_ext: "",
            alumno_d_n_int: "",
            alumno_d_colonia: "",
            alumno_d_municipio: "",
            alumno_d_estado: "",
            alumno_d_cp: "",
            alumno_d_pais: "",
            alumno_carrera: "",
            alumno_semestre: "",
            alumno_activo: "",
            usuario_Idtelegram: "",
            bitacora_usuario: "",
          };

          if (response.data.error) {
            app.errorMessage = response.data.message;
            app.notificacionE('top','center');
          } else {
            app.successMessage = response.data.message;
                //app.successMessage2 = response.data.message2;
            //app.getAllAlumnos();
            app.notificacionS('top','center');
          }
        });
      },
      toFormData: function (obj) {
        var form_data = new FormData();
        for (var key in obj) {
          form_data.append(key, obj[key]);
        }
        return form_data;
      },
    }
  });
</script>
<?php

	// --- Include de Pie de página ---
	include('pie.php');

?>