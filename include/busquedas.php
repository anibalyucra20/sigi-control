<?php

function buscarClientes($conexion)
{
    $sql = "SELECT * FROM clientes";
    return mysqli_query($conexion, $sql);
}
function buscarClientesValidar($conexion,$ruc,$dominio)
{
    $sql = "SELECT * FROM clientes WHERE ruc='$ruc' AND dominio='$dominio'";
    return mysqli_query($conexion, $sql);
}



function buscarUsuarios($conexion)
{
    $sql = "SELECT * FROM usuarios";
    return mysqli_query($conexion, $sql);
}




function buscarSistemas($conexion)
{
    $sql = "SELECT * FROM sistemas";
    return mysqli_query($conexion, $sql);
}
function buscarSistemasById($conexion, $id)
{
    $sql = "SELECT * FROM sistemas WHERE id='$id'";
    return mysqli_query($conexion, $sql);
}
function buscarSistemasByCodigo($conexion, $codigo)
{
    $sql = "SELECT * FROM sistemas WHERE codigo='$codigo'";
    return mysqli_query($conexion, $sql);
}



function buscarSistemasClientes($conexion, $id_cliente, $id_sistema)
{
    $sql = "SELECT * FROM sistemas_clientes WHERE id_cliente='$id_cliente' AND id_sistema='$id_sistema'";
    return mysqli_query($conexion, $sql);
}


?>