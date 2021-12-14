<?php

    require 'DBManager.php';

    $id = $_GET['id'];
    $status = $_GET["s"];
    $id_cliente = $_GET["id_cliente"];

    $manager = new \DBManager();
    $json = $manager->updatePujaFinal($id,$id_cliente,$status);

    echo $json;

?>