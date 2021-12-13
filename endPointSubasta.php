<?php

    require 'DBManager.php';

    $idc = $_GET['ida'];
    $ida = $_GET['idc'];

    $manager = new \DBManager();
    $json = $manager->subasta($idc,$ida);

    echo $json;

?>