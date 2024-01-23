<!--MODAL EDITAR-->
<div class="modal fade edit_<?php echo $rb_sistemas['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="center">Editar Datos de Sistema</h4>
            </div>
            <div class="modal-body">
                <!--INICIO CONTENIDO DE MODAL-->
                <div class="x_panel">


                    <div class="x_content">
                        <br />
                        <form role="form" action="operaciones/actualizar_sistema.php" class="form-horizontal form-label-left input_mask" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $rb_sistemas['id']; ?>">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Código : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="codigo" required="" value="<?php echo $rb_sistemas['codigo']; ?>">
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="nombre" required="" value="<?php echo $rb_sistemas['nombre']; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Descripción : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <textarea class="form-control" name="descripcion" id="" cols="30" rows="10"><?php echo $rb_sistemas['descripcion']; ?></textarea>
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