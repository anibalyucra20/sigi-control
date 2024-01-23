<?php
include "../include/conexion.php";
include "../include/busquedas.php";
include "../include/funciones.php";


$id = $_POST['id'];
$ruc = $_POST['ruc'];
$razon_social = $_POST['razon_social'];
$dominio = $_POST['dominio'];
$estado = $_POST['estado'];

$consulta = "UPDATE clientes SET ruc='$ruc', razon_social='$razon_social', dominio='$dominio', estado='$estado' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			
			window.location= '../clientes'
		</script>
	";
}else {
	echo "<script>
			alert('Error al Actualizar Registro, por favor verifique sus datos');
			window.history.back();
		</script>
	";
}




mysqli_close($conexion);



