<?php

    require 'DBManager.php';

    $s = $_GET['s'];

    $manager = new \DBManager();

    $json = $manager->selectArt($s);
 
        


    echo $json;

?>