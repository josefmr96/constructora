<div id="modalAlarmas" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <input type="hidden" id="idAlarma" name="idAlarma">
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
									<label class="form-label" for="nombreProveedor">Proveedor</label>
									<select class="select2"  form-control id="nombreProveedor" name="nombreProveedor">
										<option value="" id="nombreProveedor" name="nombreProveedor" selected>Seleccionar</option>
                                        <?php foreach ($aProveedor as $proveedo) :
										?>
											<option value="<?php echo $proveedo["idProveedor"]; ?>"><?php echo $proveedo["nombreProveedor"]; ?></option>

										<?php endforeach; ?>
                                    </select>
								</fieldset>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="correo">Correo</label>
                        <input type="text" class="form-control" id="correo" name="correo" placeholder="correo" required>
                    </div>      
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                        <fieldset class="form-group">
									<label class="form-label" for="operador">Operador</label>
									<select class="select2"  form-control id="operador" name="operador">
										<option value="" id="operador" name="operador" selected>Seleccionar</option>
                                        <?php foreach ($aOperador as $operado) :
										?>
											<option value="<?php echo $operado["idOperador"]; ?>"><?php echo $operado["operador"]; ?></option>

										<?php endforeach; ?>
									</select>
								</fieldset>
                        </div> <div class="col-lg-4">
                        <fieldset class="form-group">
									<label class="form-label" for="umbral">Umbral</label>
									<select class="select2"  form-control id="umbral" name="umbral">
										<option value="" id="umbral" name="umbral" selected>Seleccionar</option>
                                        <?php foreach ($aUmbral as $umbra) :
										?>
											<option value="<?php echo $umbra["idUmbral"]; ?>"><?php echo $umbra["umbral"]; ?></option>

										<?php endforeach; ?>
									</select>
								</fieldset>   
                             
                        </div>
                      
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Número de descripcion" required>
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