<?php
include('../cabecera.php');
?>
    <div class="panel-header panel-header-sm">
    </div>
      <div class="content">
        <div class="col-md-12">
          <div class="card">
            <div class="row">
              <div class="col-md-8">                        
                <div class="card-header">
                  <h6 class="card-title"> Promedio General
                    <button class="btn btn-success btn-sm">8.7</button></h6>
                </div>
              </div>
              <div class="col-md-4" style="text-align: center;">
                <!-- <button class="btn btn-danger btn-round">
                  <i class="now-ui-icons arrows-1_cloud-download-93"></i> PDF
                </button> -->
                <button class="btn btn-primary btn-round">
                  <i class="now-ui-icons ui-1_calendar-60"></i> Horario
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-9">
                  <h4 class="card-title">FINANZAS</h4>
                </div>
                <div class="col-md-3" style="text-align: center;">
                  <img src="../imagenes/economia.png" title="Lic. en Economía">
                </div>
              </div>            
            </div>
          </div>
        </div>

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Datos Bancarios - <small class="description">Banorte</small></h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3 col-md-6">
                    <!--color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"-->
                    <ul class="nav nav-pills nav-pills-primary nav-pills-icons flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" style="background-image: url('../imagenes/banorte.png'); background-repeat;background-repeat: round;" data-toggle="tab" href="#link10" role="tablist">
                          <i></i>
                            <br><br><br><br><br>
                        </a>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-8">
                    <div class="tab-content">
                      <div class="tab-pane active" id="link10">
                        NO. DE CUENTA <b>XXXXXXXXX<br></b>
                        REFERENCIA <b>XXXXX<br></b>
                        MONTO: <b>XXXXXX</b>
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
                  <h4 class="card-title"> Pagos -<small class="description" style="color: red;"><b> Tienes un Adeudo de: $1,200.<sup>00</sup></b></small></h4>
                  
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr><th>Mes</th>
                        <th>Monto</th>
                        <th style="text-align: center;">Estado</th>
                        <th>Fecha</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr><td>Enero</td>
                        <td>$1,200.<sup>00</sup></td>
                        <td style="text-align: center;"><b><i class="now-ui-icons ui-1_check" style="color: white; background-color: green; border-radius: 10px;border: green;border-style: solid;" title="Pagado"></i></b></td>
                        <td>01/01/2019</td>
                        <td><button class="btn btn-info btn-sm"><i class="now-ui-icons education_glasses"></i> Ver</button></td></td>
                      </tr>
                      <tr><td>Febrero</td>
                        <td>$1,200.<sup>00</sup></td>
                        <td style="text-align: center;"><b><i class="now-ui-icons ui-1_simple-delete" style="color: white; background-color: orange; border-radius: 10px;border: orange;border-style: solid;" title="Pendiente"></i></b></td>
                        <td>02/02/2019</td>
                        <td><button class="btn btn-info btn-sm"><i class="now-ui-icons education_glasses"></i> Ver</button></td></td>
                      </tr>
                      <tr><td>Marzo</td>
                        <td>$1,200.<sup>00</sup></td>
                        <td style="text-align: center;"><b><i class="now-ui-icons ui-1_simple-remove" style="color: white; background-color: red; border-radius: 10px;border: red;border-style: solid;" title="No Pagado"></i></b></td>
                        <td>02/02/2019</td>
                        <td><button class="btn btn-warning btn-sm"><i class="now-ui-icons arrows-1_cloud-upload-94"></i> Subir</button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        


        </div>
      
<?php
include('../pie.php'); 
?>