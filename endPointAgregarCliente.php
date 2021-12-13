<?php

    require 'DBManager.php';

    $nombre = $_GET['nombre'];
    $apellidoP = $_GET['apellidoP'];
    $apellidoM = $_GET['apellidoM'];
    $correo = $_GET['correo'];
    $contrasena = $_GET['contrasena'];

    $manager = new \DBManager();
    $json = $manager->addCliente($nombre,$apellidoP,$apellidoM,$contrasena,$correo);

    echo $json;

?>