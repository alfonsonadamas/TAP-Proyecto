<?php

    require 'DBManager.php';

    $id = $_GET['id'];

    $manager = new \DBManager();

    $json = $manager->find($id);
 
        


    echo $json;

?>