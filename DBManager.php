<?php
    class DBManager{

        private $db;
        private $host;
        private $user;
        private $pass;
        private $port;

        
        function __construct(){
            $this-> db = 'subasta';
            $this-> host = 'localhost';
            $this-> user = 'root';
            $this-> pass = '';
            $this-> port = 3304;
        }

        function open(){
            $link = mysqli_connect(
                $this-> host,
                $this-> user,
                $this-> pass,
                $this-> db,
                $this-> port
            ) or die('Error Conecting DB');


            return $link;
        }

        private function close($link) {
            mysqli_close($link);
        }

        function showAll(){
            $link = $this->open();

            $sql = "SELECT * FROM cliente";

            // Se ejecuta la consulta y se espera un arreglo como respuesta
            $resultArray = mysqli_query($link, $sql);

            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }

            $this->close($link);

            $regresa = new \stdClass();
            $regresa->code = 200;
            $regresa->resultados = $resultados;

            $c = 0;


            var_dump($json = json_encode($resultados));
            
            

            
        }

    }


?>