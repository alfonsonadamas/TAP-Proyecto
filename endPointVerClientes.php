<?php
    require 'DBManager.php';

    $manager = new \DBManager();

    $json = $manager ->showAll();


    echo $json;




?>