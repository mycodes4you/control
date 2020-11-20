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
			        <h4 class="card-title">Alumnos Registrados<small class="description"></small></h4>
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
			          	<th><center>Foto</center></th>
			            <th>Nombre</th>
			            <th>Matricula</th>
			            <th>Semestre</th>
			            <th>Carrera</th>
			            <th>Telefono</th>
			            <th>Acciones</th>
			          </tr>
			        </thead>
			        <tbody class="tbody-custom">
			        	<?php while ($value=$consulta->fetch_row()) { /// Para los tellaes de los valores de $value consultar inicio.php?accion=administracion_usuarios?>
				        	<tr class="menu-item">
				            <td><center><img class="avatar border-gray" src="<?= $value[21] ?>" alt="..." style="margin: 0;"></center></td>
				            <td><?= $value[2] ?> <?= $value[3] ?> <?= $value[4] ?> <?= $value[5] ?></td>
				            <td><?= $value[1] ?></td>
				            <?php 
				            	if($value[17]==1){$sem='1<sup>er</sup> Semestre';}
											elseif($value[17]==2){$sem='2<sup>do</sup> Semestre';}
											elseif($value[17]==3){$sem='3<sup>er</sup> Semestre';}
											elseif($value[17]==4){$sem='4<sup>to</sup> Semestre';}
											elseif($value[17]==5){$sem='5<sup>to</sup> Semestre';}
											elseif($value[17]==6){$sem='6<sup>to</sup> Semestre';}
											elseif($value[17]==7){$sem='7<sup>mo</sup> Semestre';}
											elseif($value[17]==8){$sem='8<sup>vo</sup> Semestre';}
										?>
				            <td><?= $sem ?></td>
				            <?php $a_carrera = $value[16] ?>
				            <td><?= $l_carreras[$a_carrera]['carrera_nombre'] ?></td>
				            <td><?= $value[7] ?></td>
				            <td>
				              <button class="btn btn-warning btn-sm btn-icon" @click="showingeditModal = true" ><i class="fa fa-edit" aria-hidden="true"></i></button>
				              <a href="#" title="Eliminar Alumno" class="btn btn-danger btn-sm btn-icon" @click="showingdeleteModal = true; selectAlumno(alumno);"><i class="fa fa-eraser" aria-hidden="true"></i></a>
				            </td>
				          </tr>			       
								<?php } ?>
			        
			      
			        </tbody>
			      </table>
			      <div class="justify-content-center" style="display: grid;">
			      	<?php if($filtro_carreras){ ?>
			      	<?php } else { ?>
				      	<?
				      	$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
								$DecrementNum =(($compag -1))<1?1:($compag -1); ?>
								<ul class="pagination">
									<li class="page-item">
										<a class="page-link" href="inicio.php?accion=registrar_alumno&pag=<?= $DecrementNum ?>">◀</a>
									</li>
									<?php 
										//Se resta y suma con el numero de pag actual con el cantidad de números  a mostrar
										$Desde=$compag-(ceil($CantidadMostrar/2)-1);
										$Hasta=$compag+(ceil($CantidadMostrar/2)-1);
										     
										//Se valida
										$Desde=($Desde<1)?1: $Desde;
										$Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
										//Se muestra los números de paginas
										for($i=$Desde; $i<=$Hasta;$i++){
										 	//Se valida la paginacion total
										 	//de registros
										 	if($i<=$TotalRegistro){
										 		//Validamos la pag activo
										 	  if($i==$compag){ ?>
										      <li class="active page-item"><a class="page-link" href="inicio.php?accion=administracion_alumnos&fpag=<?= $i ?>"><?= $i ?></a>
										      </li>
										 	  <?php } else { ?>
											  	<li class="page-item"><a class="page-link" href="inicio.php?accion=administracion_alumnos&pag=<?= $i ?>"><?= $i ?></a></li>
										 	  <?php }
										 	} 
										} ?>
										<li class="page-item"><a class="page-link" href="inicio.php?accion=administracion_alumnos&pag=<?= $IncrimentNum ?>">▶</a></li></ul>
							<?php } ?>

			    	</div>
			    </div>
			  </div>
			</div>
		</div>

		<!-- Modal Agregar -->
		<form id="addAlumno" autosomplete="off" @submit.prevent="addAlumno" class="form" data-toggle="validator">
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
			                  <select class="form-control" id="alumno_carrera" v-model="newAlumno.alumno_carrera" required="yes">
					                <option>Selecciona...</option>
					                <option v-for="carrera in carreras" v-bind:value="carrera.id">{{ carrera.carrera }}</option>
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
          	<div class="modal-footer">
							<button type="button" class="btn btn-warning" @click="showingaddModal = false;">Cerrar</button>
							<button type="submit" class="btn btn-success" @click="showingaddModal = false; addAlumno();">Crear</button>
						</div>
        	</div>
				</div>
			</div>
		</form>


		<!-- Modal consultar curp -->
		<form id="addAlumno" autosomplete="off" @submit.prevent="addAlumno" class="form" data-toggle="validator">
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
							
								<div class="col-md-12">
									<div class="card">
										<div v-if="eurl">
											<img :src="eurl" class="avatar border-gray" style="width: 160px;height: auto;margin-bottom: 0;">
										</div>
										<div v-else="eurl">
											<img class="avatar border-gray" style="width: 160px; height: auto; margin-bottom: 0; margin-left: 122px;" :src="clickedAlumno.alumno_foto" alt="..." >
										</div>
									  <div class="card-body">
									    <h4 class="card-title" style="text-align: center;">Fotografía Alumno</h4>
									    <p class="card-text">Se recomienda que la imagen sea cuadrada y el rostro centrado</p>
									   
										    <input type="file" id="alumno_foto" class="form-control" accept=".jpg,.jpeg" />
										    <input type="hidden" name="alumno_id" id="alumno_id" v-model="clickedAlumno.alumno_id">
										    <input type="hidden" name="alumno_matricula" id="alumno_matricula" v-model="clickedAlumno.alumno_matricula">
										    <button @click="showingeditModal = false; cambiaFoto();" class="btn btn-success" >Subir Foto</button>
										 
									    
										
									  </div>
									</div>
								</div>
							<form data-toggle="validator" id="updateAlumno" @submit.prevent="updateAlumno">
							<div id="accordion" role="tablist" aria-multiselectable="true" class="card-collapse">
	              <div class="card card-plain">
	                <div class="card-header" role="tab" id="headingOne">

	                  <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
	                  <div class="alert alert-primary" role="alert">
	               			<i class="now-ui-icons arrows-1_minimal-down" style="color: white;"></i>
	                  	Datos Personaless
	                  </div>
	                  </a>
	                </div>
	                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
	                  <div class="card-body">
	                <div class="form-group">
	                  <label for="alumno_apaterno">Apellido Paterno</label>
	                  <input type="text" class="form-control" id="alumno_apaterno" v-model="clickedAlumno.alumno_apaterno" required="yes" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="alumno_amaterno">Apellido Materno</label>
	                  <input type="text" class="form-control" id="alumno_amaterno" v-model="clickedAlumno.alumno_amaterno" required="yes" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="alumno_1ernombre">Primer Nombre</label>
	                  <input type="text" class="form-control" id="alumno_1ernombre" v-model="clickedAlumno.alumno_1ernombre" required="yes" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="alumno_2donombre">Segundo Nombre</label>
	                  <input type="text" class="form-control" id="alumno_2donombre" v-model="clickedAlumno.alumno_2donombre" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="alumno_email">Email</label>
	                  <input type="text" class="form-control" id="alumno_email" placeholder="alumno@ejemplo.com" v-model="clickedAlumno.alumno_email" required="true" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="alumno_telefono">Télefono</label>
	                  <input type="text" class="form-control" id="alumno_telefono" placeholder="Ejemplo: 55 12 77 04 04" v-model="clickedAlumno.alumno_telefono" autocomplete="on">
	                </div>
	                <div class="form-group">
	                  <label for="usuario_telegramID">Telegram ID</label>
	                  <input type="text" class="form-control" id="usuario_telegramID" placeholder="Ejemplo: 8745895478" v-model="clickedAlumno.usuario_telegramID" autocomplete="on">
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
			                  <input type="text" class="form-control" id="alumno_d_calle" v-model="clickedAlumno.alumno_d_calle" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_n_exterior">Número Exterior</label>
			                  <input type="text" class="form-control" id="alumno_d_n_exterior" v-model="clickedAlumno.alumno_d_n_exterior" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_n_interior">Número Interior</label>
			                  <input type="text" class="form-control" id="alumno_d_n_interior" v-model="clickedAlumno.alumno_d_n_interior" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_colonia">Colonia</label>
			                  <input type="text" class="form-control" id="alumno_d_colonia" v-model="clickedAlumno.alumno_d_colonia" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_municipio">Municipio</label>
			                  <input type="text" class="form-control" id="alumno_d_municipio" v-model="clickedAlumno.alumno_d_municipio" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_estado">Estado</label>
			                  <select class="form-control" id="alumno_d_estado" v-model="clickedAlumno.alumno_d_estado">
			                <option v-for="estado in estados" v-bind:value="estado.estado">{{ estado.estado }}</option>
			                  </select>
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_cp">Codigo Postal</label>
			                  <input type="text" class="form-control" id="alumno_d_cp" v-model="clickedAlumno.alumno_d_cp" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_d_pais">País</label>
			                  <input type="text" class="form-control" id="alumno_d_pais" v-model="clickedAlumno.alumno_d_pais" autocomplete="on">
			                </div>
	                  </div>
	                </div>
	              </div><!--
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
			                  <input type="text" class="form-control" id="alumno_matricula" v-model="clickedAlumno.alumno_matricula" required="yes" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_carrera">Carrera</label>
			                  <select class="form-control" id="alumno_carrera" v-model="clickedAlumno.alumno_carrera" required="yes">
					                <option>Selecciona...</option>
					                <option v-for="carrera in carreras" v-bind:value="carrera.id">{{ carrera.carrera }}</option>
			                  </select>
			                </div>
			                <div class="form-group">
			                  <label for="alumno_semestre">Semestre</label>
			                  <select class="form-control" id="alumno_semestre" v-model="clickedAlumno.alumno_semestre" required="yes">
					                <option>Selecciona...</option>
					                <option v-for="semestre in semestres" v-bind:value="semestre.id">{{ semestre.semestre }}</option>
			                  </select>
			                </div>
			                <div class="form-group">
			                  <label for="alumno_contacto_e_nombre">Nombre Contacto de Emergencia</label>
			                  <input type="text" class="form-control" id="alumno_contacto_e_nombre" v-model="clickedAlumno.alumno_contacto_e_nombre" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_contacto_e_telefono">Télefono Contacto de Emergencia</label>
			                  <input type="text" class="form-control" id="alumno_contacto_e_telefono" v-model="clickedAlumno.alumno_contacto_e_telefono" autocomplete="on">
			                </div>
			                <div class="form-group">
			                  <label for="alumno_contacto_e_parentesco">Parentesco Contacto de Emergencia</label>
			                  <input type="text" class="form-control" id="alumno_contacto_e_parentesco" v-model="clickedAlumno.alumno_contacto_e_parentesco" autocomplete="on">
			                </div>
	                  </div>
	                </div>
	              </div>-->
	             
	            </form>  
	            </div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-warning" @click="showingeditModal = false;">Cerrar</button>
							<button type="submit" class="btn btn-success" @click="showingeditModal = false; updateAlumno();">Guardar</button>
						</div>
					</div>
				</div>
			</div>
	

		<!-- Delete Editar -->
		<form data-toggle="validator" id="deleteAlumno" @submit.prevent="deleteAlumno">
			<div class="modal" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="deletemodalLabel" aria-hidden="true" v-if="showingdeleteModal" >
				<div class="modal-dialog" role="document">
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
	  	showingaddModal: false,
	  	showingeditModal: false,
	  	showingdeleteModal: false,
	  	errorMessage: "",
	  	successMessage: "",
	    alumnos: [],
	    usuarios: [],
	    users: "",
	    url: "",
	    eurl: "",
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
      paginate: ['alumnos'],
	  },

	  mounted: function () {
	  	console.log("Vue.js esta corriendo...");
	  	this.getAllAlumnos();
	  },

	  methods: {
	  	getAllAlumnos: function () {
	  		axios.get('<?= $axios_url ?>alumnos.php?accion=leer')
	  		.then(function (response) {
	  			console.log(response);

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  			} else {
	  				app.alumnos = response.data.alumnos;
	  				app.usuarios = response.data.usuarios;
	  			}
	  		})
	  	},

	  	addAlumno: function () {
	  		var formData = app.toFormData(app.newAlumno);
	  		axios.post('<?= $axios_url ?>alumnos.php?accion=agregar', formData)
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
            alumno_d_n_exterior: "",
            alumno_d_n_interior: "",
            alumno_d_colonia: "",
            alumno_d_municipio: "",
            alumno_d_estado: "",
            alumno_d_cp: "",
            alumno_d_pais: "",
            alumno_carrera: "",
            alumno_semestre: "",
            alumno_activo: "",
            usuario_Idtelegram: "",
            bitacora_usuario: "<?= $_SESSION['usuario_id'] ?>",
            usuario_telegramID: "",
            alumno_contacto_e_nombre: "",
            alumno_contacto_e_telefono: "",
        		alumno_contacto_e_parentesco: "",
          };

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  				app.notificacionE('top','center');
	  			} else {
	  				app.successMessage = response.data.message;
	          app.getAllAlumnos();
	  				app.notificacionS('top','center');
	  			}
	  		});
	  	},

	  	updateAlumno: function () {
	  		var formData = app.toFormData(app.clickedAlumno);
	  		axios.post('<?= $axios_url ?>alumnos.php?accion=actualizar', formData)
	  		.then(function (response) {
	  			console.log(response);
	  			app.clickedAlumno = {};

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  				app.notificacionE('top','center');
	  			} else {
	  				app.successMessage = response.data.message;
	          app.getAllAlumnos();
	  				app.notificacionS('top','center');
	  			}
	  		});
	  	},

	  	deleteAlumno: function () {
	  		var formData = app.toFormData(app.clickedAlumno);
	  		axios.post('<?= $axios_url ?>alumnos.php?accion=eliminar', formData)
	  		.then(function (response) {
	  			console.log(response);
	  			app.clickedAlumno = {};

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  				app.notificacionE('top','center');
	  			} else {
	  				app.successMessage = response.data.message;
	          app.getAllAlumnos();
	  				app.notificacionS('top','center');
	  			}
	  		})
	  	},

	  	cambiaFoto:function(){
	  		let formdata=new FormData();
	  		formdata.append("alumno_id",document.getElementById("alumno_id").value);
	  		formdata.append("alumno_matricula",document.getElementById("alumno_matricula").value);
	  		formdata.append("alumno_foto",document.getElementById("alumno_foto").files[0]);

	  		axios.post('<?= $axios_url ?>alumnos.php?accion=cambiar_foto', formdata)
	  		.then(function(response){
	  			console.log(response);

	  			if (response.data.error) {
	  				app.errorMessage = response.data.message;
	  				app.notificacionE('top','center');
	  			} else {
	  				app.successMessage = response.data.message;
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