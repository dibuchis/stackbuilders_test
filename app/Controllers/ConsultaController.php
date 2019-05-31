<?php

namespace PicoPlaca\Controllers;

/**
*
* PicoPlacaController 
* StackBuilders Testing APP
*
* author: Chris Regalado
* 
*/

class ConsultaController extends BaseController{

    public function init(){        
    }
    public function __construct(){
    }

    /*
    *
    * ConsultarPlaca
    *
    * return JSON status
    * @placa string
    * @dia int
    * @hora string
    *
    */
    function consultarPlaca($placa, $dia, $hora){
        
        $dia = (int) $dia;
        //Result Array set
        $result = ["status" => "error", "msg" => ""];

        //Getting Digit ID 
        $digito = (int) substr($placa, -1, 1);

        if($placa == '' || $dia == '' || $hora == '')
            exit(json_encode([
                "status" => "error",
                "title" => "Error", 
                "msg" => "Por favor llene todos los campos", "data" => $digito . "-" . $dia . "-" . $hora
            ]));

        //Checking hourly (INCREASE +1 FINAL HOUR AND DECREASE START HOUR -1 IF WANT INNER FULL TOP RANGE)
        if(!$this->betweenHours($hora, '7:00', '9:30') && !$this->betweenHours($hora, '16:00', '19:30')){
            $result = [
                "status" => "success", 
                "title" => "Estado", 
                "msg" => "Su Auto puede circular", 
                "data" => $digito . "-" . $dia . "-" . $hora
            ];
            echo json_encode($result);
            exit();
        }

        //Checking Digits operation days
        if(($digito == 1 || $digito == 2) && $dia == 1){
            $result = ["status" => "warning", "title" => "Alerta", "msg" => "NO puede Circular"];
            echo json_encode($result);
            exit();
        }else if(($digito == 3 || $digito == 4) && $dia == 2){
            $result = ["status" => "warning", "title" => "Alerta", "msg" => "NO puede Circular"];
            echo json_encode($result);
            exit();
        }else if(($digito == 5 || $digito == 6) && $dia == 3){
            $result = ["status" => "warning", "title" => "Alerta", "msg" => "NO puede Circular"];
            echo json_encode($result);
            exit();
        }else if(($digito == 7 || $digito == 8) && $dia == 4){
            $result = ["status" => "warning", "title" => "Alerta", "msg" => "NO puede Circular"];
            echo json_encode($result);
            exit();
        }else if(($digito == 9 || $digito == 0) && $dia == 5){
            $result = ["status" => "warning", "title" => "Alerta", "msg" => "NO puede Circular"];
            echo json_encode($result);
            exit();
        }else{
            $result = [
                "status" => "success", 
                "title" => "Estado", 
                "msg" => "Su Auto puede circular", 
                "data" => $digito . "-" . $dia . "-" . $hora
            ];
            echo json_encode($result);
            exit();
        }

        echo json_encode($result);
        exit();

    }

    /*
    *
    * betweenHours
    *
    * private function to determine if hour is between a range
    *
    * return bool
    * @_hour string
    * @_starHour string
    * @_endHour string
    *
    */
    private function betweenHours(String $_hour, String $_starHour, String $_endHour){
        $hour = date('H:i',strtotime($_hour));
        $starHour = date('H:i', strtotime($_starHour));
        $endHour = date('H:i', strtotime($_endHour));
        if (($hour > $starHour) && ($hour < $endHour)){
            return true;
        }else{
            return false;
        }
    }

}