<?php

    require 'DBManager.php';

    $categoria = $_POST['categoria'];

    $manager = new \DBManager();
    $json = $manager->searchCategoria($categoria);

    echo $json;

?>