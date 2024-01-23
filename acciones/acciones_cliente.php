<!--MODAL EDITAR-->
<div class="modal fade edit_<?php echo $rb_clientes['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="center">Editar Datos de Cliente</h4>
            </div>
            <div class="modal-body">
                <!--INICIO CONTENIDO DE MODAL-->
                <div class="x_panel">


                    <div class="x_content">
                        <br />
                        <form role="form" action="operaciones/actualizar_cliente.php" class="form-horizontal form-label-left input_mask" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $rb_clientes['id']; ?>">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">RUC : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="ruc" required="" value="<?php echo $rb_clientes['ruc']; ?>">
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Razón Social : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="razon_social" required="" value="<?php echo $rb_clientes['razon_social']; ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Dominio : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" class="form-control" name="dominio" required="" value="<?php echo $rb_clientes['dominio']; ?>">
                                    <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select name="estado" class="form-control" required="">
                                        <option></option>
                                        <option value="1" <?php if ($rb_clientes['estado'] == 1) {
                                                                echo "selected";
                                                            } ?>>Activo</option>
                                        <option value="0" <?php if ($rb_clientes['estado'] == 0) {
                                                                echo "selected";
                                                            } ?>>Inactivo</option>
                                    </select>
                                    <br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Token : </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <?php $token = password_hash($rb_clientes['token'], PASSWORD_DEFAULT);  ?>
                                    <input type="text" class="form-control" value="<?php echo $token; ?>" readonly>
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

<!-- FIN MODAL EDITAR -->



<!--MODAL VER-->
<div class="modal fade ver_<?php echo $rb_clientes['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" align="center">Sistemas asignados a Cliente</h4>
            </div>
            <div class="modal-body">
                <!--INICIO CONTENIDO DE MODAL-->
                <div class="x_panel">


                    <div class="x_content">
                        <br />
                        <form role="form" action="operaciones/actualizar_sistemas_cliente.php" class="form-horizontal form-label-left input_mask" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $rb_clientes['id']; ?>">
                            <?php

                            $b_sistemas = buscarSistemas($conexion);
                            while ($rb_sistemas = mysqli_fetch_array($b_sistemas)) {
                                $b_sistema_cliente = buscarSistemasClientes($conexion, $rb_clientes['id'], $rb_sistemas['id']);
                                $cont_sistema = mysqli_num_rows($b_sistema_cliente);
                                $rb_sistema_cliente = mysqli_fetch_array($b_sistema_cliente);
                            ?>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12"><?php echo $rb_sistemas['nombre']; ?> : </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <select name="sistema_<?php echo $rb_sistemas['id'] . "_" . $rb_clientes['id']; ?>" class="form-control" required="">
                                            <option value="1" <?php if ($cont_sistema > 0) {
                                                                    echo "selected";
                                                                } ?>>Activo</option>
                                            <option value="0" <?php if ($cont_sistema == 0) {
                                                                    echo "selected";
                                                                } ?>>Inactivo</option>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                            <?php
                            }


                            ?>

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

<!-- FIN MODAL VER -->