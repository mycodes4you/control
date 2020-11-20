<?php
	// --- Include del encabezado ---
	include('encabezado.php');
	// --- Include del menú ---
	include('menu.php');
  // --- Include del título ---
  include('titulo.php');
?>
      <div class="content">
        <div class="col-md-12">
          <div class="card">
            <div class="row">
              <div class="col-md-9">                        
                <div class="card-header">
                  <h6 class="card-title"> Promedio General
                    <button class="btn btn-success btn-sm"><b>8.7</b></button></h6>
                </div>
              </div>
              <div class="col-md-3" style="text-align: center;">
                <button class="btn btn-danger btn-round">
                  <b><i class="now-ui-icons arrows-1_cloud-download-93"></i> PDF</b>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-9" style="text-align: center;">
                  <div class="dropdown col-md-4">
                    <button class="dropdown-toggle btn btn-danger btn-round btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>SEMESTRE</b>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(1px, 38px, 0px);">
                      <h6 class="dropdown-header">Selecciona el semestre</h6>
                      <a class="dropdown-item" href="#">Primero</a>
                      <a class="dropdown-item" href="#">Segundo</a>
                      <a class="dropdown-item" href="#">tercero</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3" style="text-align: center;">
                  <img src="imagenes/economia.png" title="Lic. en Economía">
                </div>
              </div>            
            </div>
          </div>
        </div>


          <div class="col-md-12">
            <div class="card">                        
              <div class="card-header">
                <h6 class="card-title"> PRIMER SEMESTRE</h6>
              </div>              
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-danger">
                      <tr>
												<th>
                        	<b>ASIGNATURA</b>
                      	</th>
												<th style="text-align: right;">
                        	<b>1er PARCIAL</b>
                      	</th>
												<th style="text-align: right;">
                        	<b>2do PARCIAL</b>
                      	</th>
												<th style="text-align: right;">
                        	<b>3er PARCIAL</b>
                      	</th>
												<th style="text-align: right;">
													<b>CALIFICACIÓN</b>
												</th>                      
                    	</tr>
										</thead>
                    <tbody>
                      <tr>
                        <td>
                          Introducción al estudio de la filosofía
                        </td>
                        <td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
												<td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
                      </tr>
											<tr>
                        <td>
                          Geografía Económica
                        </td>
                        <td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
												<td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
                      </tr>
											<tr>
                        <td>
                          Historia del pensamiento económico
                        </td>
                        <td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
												<td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
                      </tr>
											<tr>
                        <td>
                        	Introducción a la economía
                        </td>
                        <td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
												<td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
                      </tr>
											<tr>
                        <td>
                        	Práctica de la Lengua Española
                        </td>
                        <td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
												<td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
                      </tr>
											<tr>
                        <td>
                        	Administración General
                        </td>
                        <td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
												<td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
                      </tr>
											<tr>
                        <td>
                        	Mercadotecnia I
                        </td>
                        <td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
												<td style="text-align: right;">
                          10
                        </td>
												<td style="text-align: right;">
                          10
                        </td> 
                      </tr>
											<tr> 
												<td colspan="4" style="text-align: right;" class="text-danger">
                          <b>PROMEDIO</b>
                        </td>
												<td style="text-align: right;">
                          <b>10</b>
                        </td> 
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php

	// --- Include de Pie de página ---
	include('pie.php');

?>