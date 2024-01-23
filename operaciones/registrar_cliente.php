<?php
include "../include/conexion.php";
include "../include/busquedas.php";
include "../include/funciones.php";

$ruc = $_POST['ruc'];
$razon_social = $_POST['razon_social'];
$dominio = $_POST['dominio'];

$llave = generar_llave();
$token = password_hash($llave, PASSWORD_DEFAULT);


	$insertar = "INSERT INTO clientes (ruc,razon_social,dominio,estado,token) VALUES ('$ruc','$razon_social','$dominio',1,'$llave')";
	$ejecutar_insetar = mysqli_query($conexion, $insertar);
	if ($ejecutar_insetar) {
			echo "<script>
                alert('Registro Existoso');
                window.location= '../clientes'
    			</script>";
	}else{
		echo "<script>
			alert('Error al registrar, por favor verifique sus datos');
			window.history.back();
				</script>
			";
	};

mysqli_close($conexion);
