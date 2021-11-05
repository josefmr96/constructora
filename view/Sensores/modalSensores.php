<div id="modalSensores" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <input type="hidden" id="idSensor" name="idSensor">

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

                    <div class="form-group">
                        <label class="form-label" for="numero_serie">Número de Serie</label>
                        <input type="text" class="form-control" id="numero_serie" name="numero_serie" placeholder="numero de serie" required>
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