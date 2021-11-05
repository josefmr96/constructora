<div id="modalHormigon" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                <input type="hidden" id="idHormigon" name="idHormigon">

                    <div class="form-group">
                        <label class="form-label" for="tipo_hormigon">Tipo de Hormigón</label>
                        <input type="text" class="form-control" id="tipo_hormigon" name="tipo_hormigon" placeholder="" required>
                    </div>
                    <div class="row">
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="tipo_asentamiento">Tipo de Asentamiento</label>
                        <input type="text" class="form-control" id="tipo_asentamiento" name="tipo_asentamiento" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="ordenada_origen">Ordenada de Origen </label>
                        <input type="text" class="form-control" id="ordenada_origen" name="ordenada_origen" placeholder="" required>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="pendiente">Pendiente</label>
                        <input type="text" class="form-control" id="pendiente" name="pendiente" placeholder="" required>
                    </div>
                    </div>
                    </div>
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
                        <label class="form-label" for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" required>
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