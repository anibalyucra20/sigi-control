<?php
include "../include/conexion.php";
include "../include/busquedas.php";
include "../include/funciones.php";
$id_cliente = $_POST['id'];

$b_sistemas = buscarSistemas($conexion);
while ($rb_sistemas = mysqli_fetch_array($b_sistemas)) {
    $b_sistema_cliente = buscarSistemasClientes($conexion, $id_cliente, $rb_sistemas['id']);
    $cont_sistema = mysqli_num_rows($b_sistema_cliente);
    $rb_sistema_cliente = mysqli_fetch_array($b_sistema_cliente);
    $id_sistema_cliente = $rb_sistema_cliente['id'];
    $id_sistema = $rb_sistemas['id'];

    $sistema = $_POST['sistema_' . $rb_sistemas['id'] . '_' . $id_cliente];

    if ($cont_sistema > 0 && $sistema == 0) {
        // eliminar sistema cliente 
        $consulta = "DELETE FROM sistemas_clientes WHERE id='$id_sistema_cliente'";
        $ejec_consulta = mysqli_query($conexion, $consulta);
    }
    if ($cont_sistema == 0 && $sistema == 1) {
        // agregar sistema cliente
        $consulta = "INSERT INTO sistemas_clientes (id_cliente,id_sistema) VALUES ('$id_cliente','$id_sistema')";
        $ejec_consulta = mysqli_query($conexion, $consulta);
    }
}
    echo "<script>
			
			window.location= '../clientes'
		</script>
	";




mysqli_close($conexion);
