<?php

namespace Controllers;

/**
*
* PicoPlacaController 
* StackBuilders Testing APP
*
* author: Chris Regalado
* 
*/

class PicoPlacaController extends BaseController{

    function init(){
        
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
    function consultarPlaca($placa, $dia, $_hora){
        
        //Result Array set
        $result = ["status" => "error", "msg" => ""];

        //Getting Digit ID 
        $digito = substr($_placa, 1, -1);

        //Setting requested Hour to testing
        $hora = date($_hora);

        //Checking hourly 
        if(!$this->betweenHours($hora, '7:00', '9:30') && !$this->betweenHours($hora, '7:00', '9:30')){
            $result = ["status" => "0", "msg" => "La hora ingresada está fuera del horario de Pico y Placa, su auto puede circular"];
            echo json_encode($result);
            exit();
        }

        //Checking Digits operation days
        if(($digito == 1 || $digito == 2) && $dia == 1){
            $result = ["status" => "success", "msg" => "Su Auto tiene Pico y Placa en el día y hora seleccionadas"];
            echo json_encode($result);
            exit();
        }else if(($digito == 3 || $digito == 4) && $dia == 2){
            $result = ["status" => "success", "msg" => "Su Auto tiene Pico y Placa en el día y hora seleccionadas"];
            echo json_encode($result);
            exit();
        }else if(($digito == 5 || $digito == 6) && $dia == 3){
            $result = ["status" => "success", "msg" => "Su Auto tiene Pico y Placa en el día y hora seleccionadas"];
            echo json_encode($result);
            exit();
        }else if(($digito == 7 || $digito == 8) && $dia == 4){
            $result = ["status" => "success", "msg" => "Su Auto tiene Pico y Placa en el día y hora seleccionadas"];
            echo json_encode($result);
            exit();
        }else if(($digito == 9 || $digito == 0) && $dia == 5){
            $result = ["status" => "success", "msg" => "Su Auto tiene Pico y Placa en el día y hora seleccionadas"];
            echo json_encode($result);
            exit();
        }else{
            $result = ["status" => "warning", "msg" => "Su Auto tiene Pico y Placa en el día y hora seleccionadas"];
            echo json_encode($result);
            exit();
        }

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
        $hour = date($_hour);
        $starHour = date('H:i', strtotime($_starHour));
        $endHour = date('H:i', strtotime($_endHour));
        if (($hour > $starHour) && ($hour < $endHour)){
            return true;
        }else{
            return false;
        }
    }

}