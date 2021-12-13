<?php
    require 'DBManager.php';

    $manager = new \DBManager();

    $json = $manager ->showAll_Productos();


    echo $json;




?>