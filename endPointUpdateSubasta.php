<?php

    require 'DBManager.php';

    $id = $_GET['id'];
    $puja = $_GET['puja'];
    $id_cliente = $_GET["id_cliente"];

    $manager = new \DBManager();
    $json = $manager->updatePuja($puja,$id,$id_cliente);

    echo $json;

?>