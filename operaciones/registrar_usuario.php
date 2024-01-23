<?php
include "../include/conexion.php";
include "../include/busquedas.php";
include "../include/funciones.php";

$dni = $_POST['dni'];
$apnom = $_POST['apnom'];
$correo = $_POST['correo'];

$password = password_hash($dni, PASSWORD_DEFAULT);

	$insertar = "INSERT INTO usuarios (dni,apellidos_nombres,correo,estado,password,reset_password,token_password) VALUES ('$dni','$apnom','$correo',1,'$password',0,'')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../usuarios'
    			</script>";
	}else{
		echo "<script>
			alert('Error al registrar, por favor verifique sus datos');
			window.history.back();
				</script>
			";
	};

mysqli_close($conexion);
