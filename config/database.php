<?php
    class Database{
        private $hostname = "localhost";
        private $database = "cursosbd";
        private $username = "root";
        private $password = "NaVa123*-*"; 
        private $charset = "UTF8";  
        private $port = "3304";

        function conectar(){
            try{
                $conexion = "mysql:host=" . $this -> hostname . "; dbname=" . $this -> database . "; port=" . $this -> port;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false
                ];

                $pdo = new PDO($conexion, $this->username, $this->password, $options);
            
                return $pdo;
        }catch(PDOException $e){
            echo 'Error conexion: '. $e->getMessage();
            exit;
        }
    }
    }
?>