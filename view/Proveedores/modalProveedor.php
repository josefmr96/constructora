<div id="modalProveedor" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                <input type="hidden" id="idDireccion" name="idDireccion">

                    <div class="form-group">
                        <label class="form-label" for="nombreProveedor">Nombre del Proveedor</label>
                        <input type="text" class="form-control" id="nombreProveedor" name="nombreProveedor" placeholder="Empresa" required>
                    </div>
                    <div class="row">
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Número de Teléfono" required>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="correo">Correo</label>
                        <input type="text" class="form-control" id="correo" name="correo" placeholder="ejemplo@ejemplo.com" required>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="cuil">CUIL</label>
                        <input type="text" class="form-control" id="cuil" name="cuil" placeholder="Número de cuil" required>
                    </div>
                    </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                    </div>

             
								<fieldset class="form-group">
									<label class="form-label" for="fk_provincia">Provincia</label>
									<select class="select2"  form-control id="fk_provincia" name="fk_provincia">
										<option value="" id="fk_provincia" name="fk_provincia" selected></option>
										<?php foreach ($aDomicilio as $domicilio) :
											$idDomicilio = $domicilio[0]
										?>
											<option value="<?php echo $idDomicilio; ?>"><?php echo $domicilio[1]; ?></option>

										<?php endforeach; ?>
										<input type="hidden" value="<?php echo $idDomicilio; ?>" id="otro">
									</select>
								</fieldset>
					

                    <div class="form-group">
                    <fieldset class="form-group">
									<label class="form-label" for="fk_localidad">Localidad</label>
									<select class="select2"   form-control id="fk_localidad" name="fk_localidad">
                                        
									</select>
                                    <input type="hidden" value="" name="localidadElse" id="localidadElse">
								</fieldset>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="codigo_postal">Codigó Postal</label>
                        <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder=".." required>
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