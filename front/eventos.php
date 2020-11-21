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
              <h4 class="card-title">Proximos Eventos (<?= $n_eventos ?>)
                <small class="description"> </small>
              </h4>
            </div>
            <div class="col-md-2">
              <button class="btn btn-success" @click="app.showingaddModal = true;"><b><i class="fa fa-user-plus"></i> Agregar Evento</b></button>
            </div>
          </div>
        </div>
        <div class="card-body">

      
          <div class="card mb-3 col-md-12" v-for="evento of eventos">
            <div class="row no-gutters">
              <div class="col-md-4">
                <p class="crop" style="border-right-width: 5px;border-right-color: red;">
                  <img :src="evento.evento_imagen" class="card-img" alt="...">
                </p>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <h5 class="card-title">{{evento.evento_nombre}} <br><small>{{evento.evento_fecha}}</small></h5>
                      <p class="card-text">{{evento.evento_descripcion}}</p>
                      <p class="card-text"><small class="text-muted">Publicado el {{evento.evento_fecha_creado}}</small></p>
                    </div>
                    <div class="col-md-2">
                      <button class="btn btn-warning btn-sm btn-icon" @click="showingeditModal = true; selectEvento(evento);"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    <a href="#" title="Eliminar Evento" class="btn btn-danger btn-sm btn-icon" @click="showingdeleteModal = true; selectEvento(evento);"><i class="fa fa-eraser" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
   

        </div>
      </div>
    </div>


    <!-- Modal Agregar -->
    <form id="addEvento" autosomplete="off" @submit.prevent="addEvento" class="form" data-toggle="validator">
      <div class="modal" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addmodalLabel" aria-hidden="true" v-if="showingaddModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable bd-example-modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar Evento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="showingaddModal = false;">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img v-if="eurl" :src="eurl" width="200px"><br> 
              <input class="form-control" type="file" name="evento_imagen" ref="evento_imagen" id="evento_imagen" v-on:change="everImagen();">
              <div class="form-group">
                <label for="evento_nombre">Nombre Evento</label>
                <input type="text" class="form-control" id="evento_nombre" v-model="newEvento.evento_nombre">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción Evento</label>
                <textarea class="form-control" v-model="newEvento.evento_descripcion" id="evento_descripcion" rows="3"></textarea>
              </div>
              <!-- input with datetimepicker -->
              <div class="form-group">
                  <label class="label-control">Fecha Evento</label>
                  <input type="text" class="form-control" v-model="newEvento.evento_fecha" id="evento_fecha" placeholder="2020/01/31" />
              </div>

              


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-warning" @click="showingaddModal = false;">Cerrar</button>
              <button type="submit" class="btn btn-success" @click="showingaddModal = false; addEvento();">Crear</button>
            </div>
          </div>
        </div>
      </div>
    </form>


    <!-- Delete Editar -->
    <form data-toggle="validator" id="deleteEvento" @submit.prevent="deleteEvento">
      <div class="modal" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deletemodalLabel" aria-hidden="true" v-if="showingdeleteModal" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Eliminar Evento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="showingdeleteModal = false;">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
            <div class="modal-body">
              Se eliminara el Evento: {{clickedEvento.evento_nombre}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" @click="showingdeleteModal = false;">Cerrar</button>
                <button type="submit" class="btn btn-danger" @click="showingdeleteModal = false; deleteEvento();">Eliminar</button>
            </div>
          </div>
        </div>
      </div>
    </form>



    <!-- Modal Editar -->
    <div class="modal" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodalLabel" aria-hidden="true" v-if="showingeditModal" >
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editmodalLabel">Editar Evento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="showingeditModal = false;">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div v-if="eurl">
              <img :src="eurl" class="avatar border-gray" style="width: 160px;height: auto;margin-bottom: 0;">
            </div>
            <div v-else="eurl">
              <img class="avatar border-gray" style="width: 160px; height: auto; margin-bottom: 0; margin-left: 122px;" :src="clickedEvento.evento_imagen" alt="..." >
            </div>
            <div class="card-body">
              <h4 class="card-title" style="text-align: center;">Fotografía Evento</h4>
              <p class="card-text" ></p>
              <input type="file" id="evento_imagen" class="form-control" accept=".jpg,.jpeg" />
              <div class="form-group">
                <label for="evento_nombre">Nombre Evento</label>
                <input type="text" class="form-control" id="evento_nombre" v-model="clickedEvento.evento_nombre">
              </div>
              <div class="form-group">
                <label for="evento_nombre">Descripción Evento</label>
                <input type="text" class="form-control" id="evento_descripcion" v-model="clickedEvento.evento_descripcion">
              </div>
              <div class="form-group">
               <input type="hidden" class="form-control" id="evento_id" v-model="clickedEvento.evento_id">
              </div>

              <button @click="showingeditModal = false; cambiaFoto();" class="btn btn-success" >Subir Foto</button>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" @click="showingeditModal = false;">Cerrar</button>
            <button type="submit" class="btn btn-success" @click="showingeditModal = false; updateEvento();">Guardar</button>
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
<script src="assets/js/axios.min.js"></script>
<script src="assets/js/plugins/bootstrap-notify.js"></script>


<?php $rutaaxios = "https://localhost/control/"; ?>
<?php //$rutaaxios = "https://atom-rm.com/control/eventos.php?accion=agregar"; ?>
<script type="text/javascript">
  Vue.use('vue-moment');
  var now = moment();
  moment.locale('es');
  var app = new Vue({ 
    el: "#app",
    data: {
      date: "",
      showingaddModal: false,
      showingeditModal: false,
      showingdeleteModal: false,
      errorMessage: "",
      successMessage: "",
      eventos: [],
      url: "",
      eurl: "",
      newEvento: {
        evento_nombre: "", 
        evento_descripcion: "", 
        evento_fecha_creado: "",
        evento_fecha: "",
        evento_imagen: "",
      },
      clickedEvento: {},
    },

    mounted: function () {
      console.log("Vue.js esta corriendo...");
      console.log(moment().format('LLLL'));
      this.getAllEventos();
    },

    methods: {
      moment: function () {
      return moment();
      },      
      getAllEventos: function () {
<<<<<<< TREE
        axios.get('<?= $rutaaxios ?>eventos.php?accion=leer')
=======
        axios.get('<?= $url_axios ?>eventos.php?accion=leer')
>>>>>>> MERGE-SOURCE
        .then(function (response) {
          console.log(response);

          if (response.data.error) {
            app.errorMessage = response.data.message;
          } else {
            app.eventos = response.data.eventos;
          }
        })
      },

      addEvento: function () {
        let formdata=new FormData();
        formdata.append("evento_nombre",document.getElementById("evento_nombre").value);
        formdata.append("evento_descripcion",document.getElementById("evento_descripcion").value);
        formdata.append("evento_fecha",document.getElementById("evento_fecha").value);
        formdata.append("evento_imagen",document.getElementById("evento_imagen").files[0]);

<<<<<<< TREE
        axios.post('<?= $rutaaxios ?>eventos.php?accion=agregar', formdata)
=======
        axios.post('<?= $url_axios ?>eventos.php?accion=agregar', formdata)
>>>>>>> MERGE-SOURCE
        .then(function(response){
          console.log(response);

          if (response.data.error) {
            app.errorMessage = response.data.message;
            app.notificacionE('top','center');
          } else {
            app.successMessage = response.data.message;
                //app.successMessage2 = response.data.message2;
            app.getAllEventos();
            app.notificacionS('top','center');
          }
        })
      },

      updateEvento: function () {
        var formData = app.toFormData(app.clickedEvento);
<<<<<<< TREE
        axios.post('<?= $rutaaxios ?>evento.php?accion=actualizar', formData)
=======
        axios.post('<?= $url_axios ?>evento.php?accion=actualizar', formData)
>>>>>>> MERGE-SOURCE
        .then(function (response) {
          console.log(response);
          app.clickedEvento = {};

          if (response.data.error) {
            app.errorMessage = response.data.message;
            app.notificacionE('top','center');
          } else {
            app.successMessage = response.data.message;
                //app.successMessage2 = response.data.message2;
            app.getAllEventos();
            app.notificacionS('top','center');
          }
        });
      },

      deleteEvento: function () {
        var formData = app.toFormData(app.clickedEvento);
<<<<<<< TREE
        axios.post('<?= $rutaaxios ?>eventos.php?accion=eliminar', formData)
=======
        axios.post('<?= $url_axios ?>eventos.php?accion=eliminar', formData)
>>>>>>> MERGE-SOURCE
        .then(function (response) {
          console.log(response);
          app.clickedEvento = {};

          if (response.data.error) {
            app.errorMessage = response.data.message;
            app.notificacionE('top','center');
          } else {
            app.successMessage = response.data.message;
                //app.successMessage2 = response.data.message2;
            app.getAllEventos();
            app.notificacionS('top','center');
          }
        })
      },

      cambiaFoto:function(){
        let formdata=new FormData();
        formdata.append("evento_id",document.getElementById("evento_id").value);
        formdata.append("evento_nombre",document.getElementById("evento_nombre").value);
        formdata.append("evento_descripcion",document.getElementById("evento_descripcion").value);
        formdata.append("evento_imagen",document.getElementById("evento_imagen").files[0]);

<<<<<<< TREE
        axios.post('<?= $rutaaxios ?>eventos.php?accion=cambiar_foto', formdata)
=======
        axios.post('<?= $url_axios ?>eventos.php?accion=cambiar_foto', formdata)
>>>>>>> MERGE-SOURCE
        .then(function(response){
          console.log(response);

          if (response.data.error) {
            app.errorMessage = response.data.message;
            app.notificacionE('top','center');
          } else {
            app.successMessage = response.data.message;
                //app.successMessage2 = response.data.message2;
            app.getAllEventos();
            app.notificacionS('top','center');
          }
        })
      },

      verImagen:function(){
        var _this = this
        _this.file = _this.$refs.evento_imagen.files[0];
        _this.url = URL.createObjectURL(_this.file);
      },
      everImagen:function(){
        var _this = this
        _this.file = _this.$refs.evento_imagen.files[0];
        _this.url = URL.createObjectURL(_this.file);
      },

      selectEvento(Evento) {
        app.clickedEvento = Evento;


        /*N*/
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