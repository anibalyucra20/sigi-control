<?php
include "../include/conexion.php";
include "../include/busquedas.php";
include "../include/funciones.php";


$id = $_POST['id'];
$dni = $_POST['dni'];
$nomap = $_POST['nomap'];
$correo = $_POST['correo'];
$estado = $_POST['estado'];

$consulta = "UPDATE usuarios SET dni='$dni', apellidos_nombres='$nomap', correo='$correo', estado='$estado' WHERE id=$id";
$ejec_consulta = mysqli_query($conexion, $consulta);
if ($ejec_consulta) {
	echo "<script>
			
			window.location= '../usuarios'
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



