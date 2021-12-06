<?php

    require 'DBManager.php';

    $producto = $_GET['nombre'];
    $puja = $_GET['puja'];
    $fecha = $_GET['fecha'];
    $cliente = $_GET['cliente'];

    $manager = new \DBManager();
    $json = $manager->add($producto,$puja,$fecha,$cliente);

    echo $json;

?>