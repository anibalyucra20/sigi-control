<?php
include("include/conexion.php");
include("include/busquedas.php");
include("include/funciones.php");

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="es-ES">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Usuarios <?php include("include/header_title.php"); ?></title>
    <!--icono en el titulo-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Bootstrap -->
    <link href="plantilla/Gentella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="plantilla/Gentella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="plantilla/Gentella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../Gentella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="plantilla/Gentella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="plantilla/Gentella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="plantilla/Gentella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="plantilla/Gentella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="plantilla/Gentella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="plantilla/Gentella/build/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!--menu-->
            <?php
            include("include/menu.php"); ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="">
                                    <h2 align="center">Usuarios </h2>
                                    <button class="btn btn-success" data-toggle="modal" data-target=".registrar"><i class="fa fa-plus-square"></i> Nuevo</button>

                                    <!--MODAL REGISTRAR-->
                                    <div class="modal fade registrar" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel" align="center">Registrar Usuario</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <!--INICIO CONTENIDO DE MODAL-->
                                                    <div class="x_panel">
                                                        <div class="" align="center">
                                                            <h2></h2>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="x_content">
                                                            <br />
                                                            <form role="form" action="operaciones/registrar_usuario.php" class="form-horizontal form-label-left input_mask" method="POST">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">DNI : </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="text" class="form-control" name="dni" required="required" maxlength="11">
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Apellidos y Nombres : </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="text" class="form-control" name="apnom" required="required" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" maxlength="100">
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">correo : </label>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                                                        <input type="text" class="form-control" name="correo" required="required" maxlength="100">
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                <div align="center">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
                                    <!-- FIN MODAL REGISTRAR-->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />

                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>DNI</th>
                                                <th>Usuario</th>
                                                <th>Correo</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cont = 0;
                                            $b_usuarios = buscarUsuarios($conexion);
                                            while ($rb_usuarios = mysqli_fetch_array($b_usuarios)) {
                                                $cont++;

                                            ?>
                                                <tr>
                                                    <td><?php echo $cont; ?></td>
                                                    <td><?php echo $rb_usuarios['dni']; ?></td>
                                                    <td><?php echo $rb_usuarios['apellidos_nombres']; ?></td>
                                                    <td><?php echo $rb_usuarios['correo']; ?></td>
                                                    <td><?php
                                                        if ($rb_usuarios['estado'] == 1) {
                                                            echo "Activo";
                                                        } else {
                                                            echo "Inactivo";
                                                        }
                                                        ?></td>
                                                    <td>
                                                        <button class="btn btn-success" data-toggle="modal" data-target=".edit_<?php echo $rb_usuarios['id']; ?>"><i class="fa fa-pencil-square-o"></i> Editar</button>
                                                    </td>
                                                    </td>
                                                </tr>
                                            <?php
                                                include('acciones/acciones_usuario.php');
                                            };
                                            ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <?php
            include("include/footer.php");
            ?>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="plantilla/Gentella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plantilla/Gentella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="plantilla/Gentella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="plantilla/Gentella/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="plantilla/Gentella/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="plantilla/Gentella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="plantilla/Gentella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="plantilla/Gentella/vendors/jszip/dist/jszip.min.js"></script>
    <script src="plantilla/Gentella/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="plantilla/Gentella/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="plantilla/Gentella/build/js/custom.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });

        });
    </script>
    <?php mysqli_close($conexion); ?>
</body>

</html>