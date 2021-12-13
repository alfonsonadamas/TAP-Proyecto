<?php
    require 'DBManager.php';

    $manager = new \DBManager();

    $json = $manager ->desc();


    echo $json;




?>