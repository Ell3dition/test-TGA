<?php

require_once '../Models/appM.php';

class AppC
{

    function getHobbyC()
    {
        $respuesta = AppM::getHobbyM();
        echo json_encode($respuesta);
    }

    function guardarC()
    {
        //VALIDACIONES

        if ($_POST["nombre"] == "") {
            echo json_encode(array("Estado" => false, "Motivo" => "El Nombre es un campo obligatorio"));
            return;
        } else if (!preg_match('/^[a-zA-ZsáéíóúñÁÉÍÓÚÑ ]+$/', $_POST["nombre"])) {
            echo json_encode(array("Estado" => false, "Motivo" => "El nombre no puede contener caracteres especiales"));
            return;
        }

        if ($_POST["hobby"] == "100") {
            echo json_encode(array("Estado" => false, "Motivo" => "Debe Seleccionar un hobby válido"));
            return;
        }

        if ($_POST["hobby"] == "0") {
            $datos = array("Nombre" => $_POST["nombre"], "Genero" => $_POST["genero"], "Hobby" => "0", "Tiempo" => null);
            //GUARDAR SIN DATOS DE TIEMPO DEDICADO AL HOBBY
            $respuesta = AppM::guardarM($datos);
            echo json_encode($respuesta);
        } else {

            if ($_POST["tiempo"] < 1) {
                echo json_encode(array("Estado" => false, "Motivo" => "Debe seleccionar un tiempo válido"));
                return;
            } else  if ($_POST["tiempo"] == "") {
                echo json_encode(array("Estado" => false, "Motivo" => "El tiempo es un campo obligatorio"));
                return;
            } else {

                //GUARDAR CON DATOS DE TIEMPO DEDICADO AL HOBBY
                $datos = array("Nombre" => $_POST["nombre"], "Genero" => $_POST["genero"], "Hobby" => $_POST["hobby"], "Tiempo" => $_POST["tiempo"]);
                $respuesta = AppM::guardarM($datos);
                echo json_encode($respuesta);
            }
        }




        // $respuesta = AppM::getHobbyM();
        // echo json_encode($respuesta);
    }

    function getResultadosC()
    {

        if ($_POST["tipo"] == "NameOfTheRespondents") {

            $query = "SELECT NOMBRE_ENCUESTADO AS LABEL, COUNT(*) AS CANTIDAD FROM ENCUESTAS 
            GROUP BY NOMBRE_ENCUESTADO;";

            $respuesta = AppM::getResultadosM($query);
            echo json_encode($respuesta);

        } else if ($_POST["tipo"] == "MenAndWomen") {

            $query = "SELECT NOMBRE_GENERO AS LABEL, COUNT(*) AS CANTIDAD FROM ENCUESTAS AS E
            INNER JOIN GENERO AS G ON G.ID_GENERO = E.GENERO_ENCUESTADO_FK
            GROUP BY NOMBRE_GENERO;";

            $respuesta = AppM::getResultadosM($query);
            echo json_encode($respuesta);

        } else if ($_POST["tipo"] == "PeopleByHobby") {

            $query = "SELECT NOMBRE_HOBBY AS LABEL, COUNT(*) AS CANTIDAD FROM ENCUESTAS AS E
            INNER JOIN HOBBIES AS H ON H.ID_HOBBY = E.HOBBY_ENCUESTADO_FK
            GROUP BY NOMBRE_HOBBY;";

            $respuesta = AppM::getResultadosM($query);
            echo json_encode($respuesta);

        } else if ($_POST["tipo"] == "PeopleByNumberOfHours") {

            $query = "SELECT TIEMPO AS LABEL, COUNT(*) AS CANTIDAD FROM ENCUESTAS 
            GROUP BY TIEMPO;";
            
            $respuesta = AppM::getResultadosM($query);
            echo json_encode($respuesta);
        }else if ($_POST["tipo"] == "resultsTable") {

            $query = "SELECT E.NOMBRE_ENCUESTADO AS NOMBRE, E.TIEMPO , G.NOMBRE_GENERO AS GENERO, H.NOMBRE_HOBBY AS HOBBY   FROM ENCUESTAS AS E
            INNER JOIN GENERO AS G ON G.ID_GENERO = E.GENERO_ENCUESTADO_FK
            INNER JOIN HOBBIES AS H ON H.ID_HOBBY = E.HOBBY_ENCUESTADO_FK";
            
            $respuesta = AppM::getResultadosM($query);
            echo json_encode($respuesta);
        }
    }
}


if ($_POST["accion"] == "getHobby") {

    $getHobby = new AppC;
    $getHobby->getHobbyC();
} else if ($_POST["accion"] == "guardar") {

    $guardar = new AppC;
    $guardar->guardarC();
} else if ($_POST["accion"] == "charts") {

    $resultados = new AppC;
    $resultados->getResultadosC();
}
