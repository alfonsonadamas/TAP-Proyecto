<?php

    require 'DBManager.php';

    $email = $_GET['email'];

    $manager = new \DBManager();

    $json = $manager->find($email);
 
        


    echo $json;

?>