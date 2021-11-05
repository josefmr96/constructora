<div id="modalObras" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                <input type="hidden" id="idObra" name="idObra">

                    
                    <div class="row">
                    <div class="col-lg-4">
                            <div class="form-group">
                        <label class="form-label" for="nombreObra">Obra</label>
                        <input type="text" class="form-control" id="nombreObra" name="nombreObra" placeholder="Nombre de la Obra" required>
                    </div>
                        </div>

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
                    <div class="form-group">
                        <label class="form-label" for="comentario">Comentario</label>
                        <input type="text" class="form-control" id="comentario" name="comentario" placeholder="Descripción" required>
                    </div>      
                    </div>
                  
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                    </div>
                    <div class="row">
                    <div class="col-lg-4">
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
                    </div>
                    <div class="col-lg-4">
                    <fieldset class="form-group">
									<label class="form-label" for="fk_localidad">Localidad</label>
									<select class="select2"   form-control id="fk_localidad" name="fk_localidad">
                                        
									</select>
                                    <input type="hidden" value="" name="localidadElse" id="localidadElse">
								</fieldset>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                        <label class="form-label" for="codigo_postal">Código Postal</label>
                        <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Descripción" required>
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