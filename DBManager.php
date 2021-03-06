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

            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;

            $c = 0;


            var_dump($json = json_encode($resultados, JSON_UNESCAPED_UNICODE));

        }

        function showAll_Productos(){
            $link = $this->open();

            $sql = "SELECT * FROM articulo";

            // Se ejecuta la consulta y se espera un arreglo como respuesta
            $resultArray = mysqli_query($link, $sql);

            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }

            $this->close($link);

            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;

            $c = 0;


            return json_encode($resultados);

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

        public function addCliente($nombre,$apellidoP,$apellidoM,$contrasena,$email) {
            try {
                $link = $this->open();
    
                $sql = "INSERT INTO cliente(nombre,apellidoP,apellidoM,contrase??a,email) 
                        VALUES('$nombre','$apellidoP','$apellidoM','$contrasena','$email')";
    
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
    
            $sql = "SELECT * FROM cliente WHERE email= '$id'";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function search($s){
            $link = $this->open();
    
            $sql = "SELECT * FROM articulo WHERE nombre_articulo LIKE '%$s%'";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function desc(){
            $link = $this->open();
    
            $sql = "SELECT * FROM articulo ORDER BY puja_actual DESC";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function asc(){
            $link = $this->open();
    
            $sql = "SELECT * FROM articulo ORDER BY puja_actual ASC";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function update($id,$nombre,$apellidoP,$apellidoM,$contrasena,$email) {
            try {
                $link = $this->open();
    
                $sql = "UPDATE cliente SET nombre = '$nombre', apellidoP = '$apellidoP', apellidoM = '$apellidoM', contrase??a = '$contrasena', email = '$email' WHERE id = $id";
    
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

        public function cliente_articulo($id){
            $link = $this->open();
    
            $sql = "SELECT * FROM `cliente_articulo` INNER JOIN articulo ON cliente_articulo.id_articulo_1 = articulo.id_articulo INNER JOIN cliente ON cliente_articulo.id_cliente = cliente.id WHERE id_articulo = $id";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function cliente($id){
            $link = $this->open();
    
            $sql = "SELECT * FROM `cliente_articulo` INNER JOIN articulo ON cliente_articulo.id_articulo_1 = articulo.id_articulo INNER JOIN cliente ON cliente_articulo.id_cliente = cliente.id WHERE id = $id";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function subasta($idc,$ida){
            try {
                $link = $this->open();
    
                $sql = "INSERT INTO cliente_articulo(id_cliente,id_articulo) VALUES($idc,$ida)";
    
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

        public function updatePuja($puja,$id,$idcliente){
            try {
                $link = $this->open();
    
                $sql = "UPDATE articulo SET puja_actual=$puja, cliente_actual=$idcliente WHERE id_articulo = $id";
    
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

        public function updatePujaFinal($id,$idcliente,$status){
            try {
                $link = $this->open();
    
                $sql = "UPDATE articulo SET cliente_actual=$idcliente, status=$status WHERE id_articulo = $id";
    
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

        public function selectCliente($id_art){
            $link = $this->open();
    
            $sql = "SELECT * FROM articulo INNER JOIN cliente ON articulo.cliente_actual = cliente.id WHERE id_articulo = $id_art";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function selectArt($id_cli){
            $link = $this->open();
    
            $sql = "SELECT * FROM articulo INNER JOIN cliente ON articulo.cliente_actual = cliente.id WHERE id = $id_cli";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function selectPerdidas($id_cli){
            $link = $this->open();
    
            $sql = "SELECT * FROM articulo INNER JOIN cliente ON articulo.cliente_actual = cliente.id WHERE fecha_fin < CURRENT_DATE AND id = $id_cli";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function subastasPterminar(){
            $link = $this->open();
    
            $sql = "SELECT * FROM articulo WHERE fecha_fin > CURRENT_DATE";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function subastasTerminadas($id_art){
            $link = $this->open();
    
            $sql = "SELECT * FROM articulo INNER JOIN cliente ON articulo.cliente_actual = cliente.id WHERE fecha_fin > CURRENT_DATE AND id_articulo = $id_art";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

        public function searchCategoria($categoria){
            $link = $this->open();
    
            $sql = "SELECT * FROM articulo WHERE categoria = '$categoria'";

            $resultArray = mysqli_query($link, $sql);
    
            // Los resultados se agregan a un arreglo
            $resultados = array();
            while( ($fetch = mysqli_fetch_array($resultArray, MYSQLI_ASSOC)) != NULL) {
                array_push($resultados, $fetch);
            }
    
            $this->close($link);
    
            // $regresa = new \stdClass();
            // $regresa->code = 200;
            // $regresa->resultados = $resultados;
    
            return json_encode($resultados);
        }

    }


?>