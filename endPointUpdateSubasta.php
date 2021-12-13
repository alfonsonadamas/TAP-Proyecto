<?php

    require 'DBManager.php';

    $id = $_GET['id'];
    $puja = $_GET['puja'];

    $manager = new \DBManager();
    $json = $manager->updatePuja($id,$puja);

    echo $json;

?>