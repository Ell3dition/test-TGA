<?php

class conexionBD {


   static public function cBD()
   {
       //BASE DE DATOS DE PRUEBA
       $dbname = "TEST_TGA";
       $user = 'root';
       $pass = '';
       $host = 'localhost';


     

       try {
           $bd = new PDO("mysql:host=$host:3306;dbname=$dbname", $user, $pass);
           $bd->exec("set names utf8");
           $bd->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
           $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
           return $bd;
       } catch (PDOException $e) {

           echo 'Fallo la conexión ' . $e->getMessage();
       }
   }


}