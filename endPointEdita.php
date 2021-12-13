<?php

    require 'DBManager.php';

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $manager = new \DBManager();
    $json = $manager->update($id,$nombre,$apellidoP,$apellidoM,$contrasena,$correo);

    echo $json;

?>