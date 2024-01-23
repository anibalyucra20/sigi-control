<!--MODAL EDITAR-->
<div class="modal fade edit_<?php echo $rb_usuarios['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="center">Editar Datos de Usuario</h4>
            </div>
            <div class="modal-body">
                <!--INICIO CONTENIDO DE MODAL-->
                <div class="x_panel">


                    <div class="x_content">
                        <br />
                        <form role="form" action="operaciones/actualizar_usuario.php" class="form-horizontal form-label-left input_mask" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $rb_usuarios['id']; ?>">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">DNI : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="dni" required="" value="<?php echo $rb_usuarios['dni']; ?>">
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos y Nombres : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="nomap" required="" value="<?php echo $rb_usuarios['apellidos_nombres']; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Correo : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="correo" required="" value="<?php echo $rb_usuarios['correo']; ?>">
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="estado" class="form-control" required="">
                                        <option></option>
                                        <option value="1" <?php if($rb_usuarios['estado']==1){ echo "selected";} ?>>Activo</option>
                                        <option value="0" <?php if($rb_usuarios['estado']==0){ echo "selected";} ?>>Inactivo</option>
                                    </select>
                                    <br>
                                </div>
                            </div>
                            <div align="center">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button class="btn btn-primary" type="reset">Deshacer Cambios</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--FIN DE CONTENIDO DE MODAL-->
            </div>
        </div>
    </div>
</div>