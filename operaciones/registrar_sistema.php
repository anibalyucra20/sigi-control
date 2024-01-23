<?php
include "../include/conexion.php";
include "../include/busquedas.php";
include "../include/funciones.php";

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

	$insertar = "INSERT INTO sistemas (codigo,nombre,descripcion) VALUES ('$codigo','$nombre','$descripcion')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../sistemas'
    			</script>";
	}else{
		echo "<script>
			alert('Error al registrar, por favor verifique sus datos');
			window.history.back();
				</script>
			";
	};

mysqli_close($conexion);
