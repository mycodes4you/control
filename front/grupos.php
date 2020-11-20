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
          
    <div class="col-md-12">
      <div class="card">
        <div class="card-header" style="text-align: center;">
          <div class="row">
            <div class="col-md-10">
              <h4 class="card-title">Grupos Registrados
                <small class="description"> </small>
              </h4>
            </div>
            <div class="col-md-2">
              <a class="btn btn-success" href="inicio.php?accion=registrar_grupo"><b><i class="fa fa-user-plus"></i> Registrar Grupo</b></a>
            </div>
          </div>
        </div>
        <div class="card-body">

      
          <table class="table">
            <thead class="text-primary">
              <tr>
                <th>Grupo</th> 
                <th>Carrera</th>
                <th>Semestre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody class="tbody-custom">
              <?php while($lista_grupos = $consulta_grupos->fetch_array()): ?>
                <tr class="menu-item">
                  <td><?= $lista_grupos['grupo_nombre'] ?></td>
                  <td><?= $lista_grupos['carrera_nombre'] ?> </td>
                  <td><?= $lista_semestres[$lista_grupos['grupo_semestre']] ?></td>
                  <td>
                    <input type="hidden" name="grupo_id" :value="grupo.grupo_id">
                    <a class="btn btn-info btn-sm btn-icon" href="inicio.php?accion=ver_grupo&grupo_id=<?= $lista_grupos['grupo_id'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a class="btn btn-warning btn-sm btn-icon" href="inicio.php?accion=editar_grupo&grupo_id=<?= $lista_grupos['grupo_id'] ?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    <a href="#" title="Eliminar Alumno" class="btn btn-danger btn-sm btn-icon" @click="showingdeleteModal = true; selectAlumno(alumno);"><i class="fa fa-eraser" aria-hidden="true"></i></a> 
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
   

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
<script src="assets/js/axios.min.js"></script>
<script src="assets/js/plugins/bootstrap-notify.js"></script>


<script type="text/javascript">
  Vue.use('vue-moment');
  var now = moment();
  moment.locale('es');
  var app = new Vue({ 
    el: "#app",
    data: {
      date: "",
      showingaddModal: false,
      errorMessage: "",
      successMessage: "",
      grupos: [],
      l_carreras: [],
      grupo: '',
    },

    mounted: function () {
      console.log("Vue.js esta corriendo...");
      console.log(moment().format('LLLL'));
      //this.cargarGrupos();
    },

    methods: {
      moment: function () {
      return moment();
      },      
      
      cargarGrupos: function () {
        axios.get('<?= $axios_url ?>registrar_grupo.php?accion=leer')
        .then(function (response) {
          console.log(response);

          if (response.data.error) {
            app.errorMessage = response.data.message;
          } else {
            app.grupos = response.data.grupos;
            app.l_carreras = response.data.l_carreras;
          }
        })
      },

      verGrupo:function(){
        let formdata=new FormData();
        formdata.append("grupo_id",document.getElementById("grupo_id").value);

        axios.post('<?= $axios_url ?>registrar_grupo.php?accion=ver_grupo', formdata)
        .then(function(response){
          console.log(response);
          window.location.href = "inicio.php?accion=ver_grupo";
          if (response.data.error) {
            app.errorMessage = response.data.message;
            app.notificacionE('top','center');
          } else {
            app.successMessage = response.data.message;
            app.notificacionS('top','center');
            
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
    },

    },
  });
</script>

<?php

  // --- Include de Pie de página ---
  include('pie.php');

?>