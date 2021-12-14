<?php

    require 'DBManager.php';

    $s = $_GET['s'];

    $manager = new \DBManager();

    $json = $manager->selectCliente($s);
 
        


    echo $json;

?>