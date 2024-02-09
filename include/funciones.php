<?php
function generar_llave()
{
    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ./!}{[]+=-_><,?!@#$%^&*()\|';
    function generate_string($input, $strength)
    {
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
    $llave = generate_string($permitted_chars, 30);
    return $llave;
}



function calcular_criterios_evaluacion()
{
}

function calcular_evaluacion()
{
}

function calcular_calificacion()
{
}

function verSistemasCliente($conexion, $id_cliente)
{
    $array = array();
    $consulta = "SELECT * FROM sistemas_clientes WHERE id_cliente = '$id_cliente'";
    $ejecutar = mysqli_query($conexion, $consulta);
    while ($respuesta = mysqli_fetch_array($ejecutar)) {
        $id_sistems = $respuesta['id_sistema'];
        $b_sistema = "SELECT * FROM sistemas WHERE id='$id_sistems'";
        $ejec_b = mysqli_query($conexion, $b_sistema);
        $r_b_sistema = mysqli_fetch_array($ejec_b);
        array_push($array, $r_b_sistema['codigo']);
    }
    return codificar($array);
}



function decodificar($datos)
{
    $datos = base64_decode($datos);
    $datos = unserialize($datos);
    return $datos;
}


function codificar($datos)
{
    $datos = serialize($datos);
    $datos = base64_encode($datos);
    $datos = urlencode($datos);
    return $datos;
}


