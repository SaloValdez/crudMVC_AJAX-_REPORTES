<?php
  class Conexion{
      public function conectar(){
        $host = "localhost";
        $dbname = "crud_php";
        $user = "root";
        $pass = "";

        $link = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        return $link;

      }


  }


 ?>
