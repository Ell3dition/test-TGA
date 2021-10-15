<?php

    require_once "conexionBD.php";

    

    class AppM extends conexionBD{

        static public function getHobbyM(){

            $pdo = conexionBD::cBD()->prepare("SELECT ID_HOBBY AS ID , NOMBRE_HOBBY AS NOMBRE FROM HOBBIES");
            $pdo -> execute();
            $respuesta =  $pdo -> fetchAll();
            $pdo = null;
            return $respuesta;
        }

        static public function guardarM($datos){

           
            $pdo = conexionBD::cBD()->prepare("INSERT INTO ENCUESTAS (NOMBRE_ENCUESTADO, TIEMPO, HOBBY_ENCUESTADO_FK, GENERO_ENCUESTADO_FK)
             VALUES (:nombre,:tiempo, :hobby, :genero )");
            $pdo-> bindParam(":nombre", $datos["Nombre"], PDO::PARAM_STR );
            $pdo-> bindParam(":genero", $datos["Genero"], PDO::PARAM_INT );
            $pdo-> bindParam(":hobby", $datos["Hobby"], PDO::PARAM_INT );
            $pdo-> bindParam(":tiempo", $datos["Tiempo"], PDO::PARAM_INT);
            
            $pdo -> execute();
          
            $contador = $pdo -> rowCount();
            $pdo = null;
            if($contador>0){
                return array("Estado" => true, "Motivo" => "Datos guardados satisfactoriamente");
            }else{

                return array("Estado" => false, "Motivo" => "hubo un problema al intentar guardar, si el problema persiste contácte al soporte ");
            }

           
           
        }

        static public function getResultadosM($query){

            $pdo = conexionBD::cBD()->prepare($query);
            $pdo -> execute();
            $respuesta =  $pdo -> fetchAll();
            $pdo = null;
            return $respuesta;
        }

       


}


