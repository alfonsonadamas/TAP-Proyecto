<?php
    require 'DBManager.php';

    $manager = new \DBManager();

    $json = $manager ->asc();


    echo $json;




?>