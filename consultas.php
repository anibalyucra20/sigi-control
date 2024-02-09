<?php
include("include/conexion.php");
include("include/busquedas.php");
include("include/funciones.php");

$datos = $_POST['datos'];

//informacion de login
$ruc = $_POST['ruc'];
$dominio = $_POST['host'];
$token = $_POST['token'];
$tipo = $_POST['tipo'];
$sistema = $_POST['sistema']; //codigo de sistema

/*
definimos los tipos de funciones que se pueden aceptar


1.- funcion para ver lista de sistemas de cliente
2.-
3.-
4.-
5.-

1 .- funcion para calcular promedio de criterios de evaluacion
2 .- funcion para calcular el promedio de una evaluacion (se necesitara manejar ponderado)
3 .- funcion para calcular el promedio de las calificaciones y asi obtener el promedio final
4 .- funcion para ver lista de sistemas de cliente

*/

//verificamos datos de envio
$b_cliente = buscarClientesValidar($conexion, $ruc, $dominio);
$cont_cliente = mysqli_num_rows($b_cliente);
if ($cont_cliente > 0) {
    $b_cliente = buscarClientesValidar($conexion, $ruc, $dominio);
    $rb_cliente = mysqli_fetch_array($b_cliente);
    // verificamos si esta activo y coincide el token
    if ((password_verify($token, $rb_cliente['token']))) {
        // verificamos que tenga los permisos para utilizar la funcion solicitada
        $b_sistema = buscarSistemasByCodigo($conexion, $sistema);
        $rb_sistema = mysqli_fetch_array($b_sistema);
        $b_sistema_cliente = buscarSistemasClientes($conexion, $rb_cliente['id'], $rb_sistema['id']);
        $cont_sis_cliente = mysqli_num_rows($b_sistema_cliente);
        if ($cont_sis_cliente > 0) {
            // validamos que tipo de funcion se requiere
            switch ($tipo) {
                case 1:
                    $respuesta = verSistemasCliente($conexion, $rb_cliente['id']);
                    break;
                case 2:
                    $respuesta = calcular_criterios_evaluacion($conexion);
                    break;
                case 3:
                    $respuesta = calcular_evaluacion($conexion, $datos);
                    break;
                case 4:
                    $respuesta = calcular_calificacion($conexion, $datos);
                    break;


                default:
                    $respuesta = "funcion incorrecta";
                    break;
            }
        } else {
            $respuesta = "sin permiso";
        }
    } else {
        $respuesta = "Usuario no válido";
    }
} else {
    $respuesta = "Usuario no existe";
}
echo $respuesta;
