<?php

    require 'DBManager.php';

    $manager = new \DBManager();

    $json = $manager->subastasPterminar();
 
        


    echo $json;

?>