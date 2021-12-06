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


            var_dump($json = json_encode($resultados, JSON_UNESCAPED_UNICODE));

        }

        public function addProducto($producto,$puja,$fecha,$cliente) {
            try {
                $link = $this->open();
    
                $sql = "INSERT INTO articulo(nombre,puja_actual,fecha_fin,id_cliente_ganador) 
                        VALUES('$producto',$puja,$fecha,$cliente)";
    
                $resultArray = mysqli_query($link, $sql);
    
                $this->close($link);
    
                $regresa = new \stdClass();
                $regresa->code = 200;
                $regresa->resultados = 'Ok';
    
                return json_encode($regresa);
    
            } catch(Exception $e) {
                $regresa = new \stdClass();
                $regresa->code = 500;
                $regresa->resultados = 'Bad';
    
                return json_encode($regresa);
            }
        }

        public function addCliente($nombre,$apellidoP,$apellidoM,$contraseña,$email) {
            try {
                $link = $this->open();
    
                $sql = "INSERT INTO cliente(nombre,apellidoP,apellidoM,contraseña,email) 
                        VALUES('$nombre',$apellidoP,$apellidoM,$contraseña,$email)";
    
                $resultArray = mysqli_query($link, $sql);
    
                $this->close($link);
    
                $regresa = new \stdClass();
                $regresa->code = 200;
                $regresa->resultados = 'Ok';
    
                return json_encode($regresa);
    
            } catch(Exception $e) {
                $regresa = new \stdClass();
                $regresa->code = 500;
                $regresa->resultados = 'Bad';
    
                return json_encode($regresa);
            }
        }

        public function find($id) {
            $link = $this->open();
    
            $sql = "SELECT * FROM cliente WHERE id=".$id;
            
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
    
            return json_encode($regresa);
        }

    }


?>