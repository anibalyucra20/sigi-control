<?php
include "../include/conexion.php";
include "../include/busquedas.php";
include "../include/funciones.php";


$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$consulta = "UPDATE sistemas SET codigo='$codigo', nombre='$nombre', descripcion='$descripcion' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			
			window.location= '../sistemas'
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



