<?php

    require 'DBManager.php';

    $id = $_GET['id'];

    $manager = new \DBManager();

    $json = $manager->cliente($id);
 
        


    echo $json;

?>