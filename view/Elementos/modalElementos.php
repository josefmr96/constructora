<div id="modalElementos" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdltitulo"></h4>
            </div>
            <form method="post" id="usuario_form">
                <div class="modal-body">

                <input type="hidden" id="idElemento" name="idElemento">
                    <div class="row">
                    <div class="col-lg-4">
                    <fieldset class="form-group">
									<label class="form-label" for="nombreEmpresa">Empresa</label>
									<select class="select2"  form-control id="nombreEmpresa" name="nombreEmpresa">
										<option value="" id="nombreEmpresa" name="nombreEmpresa" selected>Seleccionar</option>
										<?php foreach ($aEmpresa as $empres) :
										?>
											<option value="<?php echo $empres["idEmpresa"]; ?>"><?php echo $empres["nombreEmpresa"]; ?></option>

										<?php endforeach; ?>
                                    </select>
								</fieldset>
                        </div>

                    <div class="col-lg-4">
                       
                   
                                <fieldset class="form-group">
									<label class="form-label" for="fk_obra">Obra</label>
									<select class="select2"   form-control id="fk_obra" name="fk_obra">
                                        
									</select>
                                    <input type="hidden" value="" name="obraElse" id="obraElse">
								</fieldset>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="elemento">Elemento</label>
                        <input type="text" class="form-control" id="elemento" name="elemento" placeholder="Elemento" required>
                    </div>      
                    </div>
                  
                    </div>
                
                    <div class="row">
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="numero_remito">Número de Remito</label>
                        <input type="text" class="form-control" id="numero_remito" name="numero_remito" placeholder="R°.." required>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <fieldset class="form-group">
									<label class="form-label" for="hormigon">Hormigon</label>
									<select class="select2"  form-control id="hormigon" name="hormigon">
										<option value="" id="hormigon" name="hormigon" selected>Seleccionar</option>
										<?php foreach ($aHormigon as $hormi) :
										?>
											<option value="<?php echo $hormi["idHormigon"]; ?>"><?php echo $hormi["tipo_hormigon"]; ?></option>

										<?php endforeach; ?>
                                    </select>
								</fieldset>
                        </div>
                    <div class="col-lg-4">
                    <fieldset class="form-group">
									<label class="form-label" for="alarmas">Alarmas</label>
									<select class="select2"  form-control id="alarmas" name="alarmas">
										<option value="" id="alarmas" name="alarmas" selected>Seleccionar</option>
										<?php foreach ($aAlarma as $alarma) :
										?>
											<option value="<?php echo $alarma["idAlarma"]; ?>"><?php echo $alarma["descripcion"]; ?></option>

										<?php endforeach; ?>
                                    </select>
								</fieldset>
                    </div> 
                   
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <fieldset class="form-group">
									<label class="form-label" for="dispositivos">Dispositivo</label>
									<select class="select2"  form-control id="dispositivos" name="dispositivos">
										<option value="" id="dispositivos" name="dispositivos" selected>Seleccionar</option>
										<?php foreach ($aDispositivo as $dispositivo) :
										?>
											<option value="<?php echo $dispositivo["idDispositivo"]; ?>"><?php echo $dispositivo["dispositivo"]; ?></option>

										<?php endforeach; ?>
                                    </select>
								</fieldset>
                            </div>  
                            <div class="col-lg-4">
                       
                   
                       <fieldset class="form-group">
                           <label class="form-label" for="fk_sensor">Sensor</label>
                           <select class="select2"   form-control id="fk_sensor" name="fk_sensor">
                               
                           </select>
                           <input type="hidden" value="" name="sensorElse" id="sensorElse">
                       </fieldset>
           </div>
           <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="fecha_hormigonado">fecha de Hormigonado</label>
                        <input type="date" class="form-control" id="fecha_hormigonado" name="fecha_hormigonado"  required>
                    </div>  
                    

                        <input type="text" hidden  id="obraInput" name="obraInput"  required>
                     
                    
                        <input type="text" hidden id="empresaInput" name="empresaInput"  required>
                
                       
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="hora">Hora</label>
                        <input type="time" class="form-control" id="hora" name="hora"  required>
                    </div> 
                    </div>
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>