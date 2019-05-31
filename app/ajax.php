<?php
header('Access-Control-Allow-Origin: *'); 
require __DIR__ . '../../vendor/autoload.php';
//require_once dirname(dirname(__FILE__)) . "/vendor/autoload.php";

use PicoPlaca\Controllers\ConsultaController;

/*
*
* Ajax Factory
*
*
*/

if(isset($_REQUEST)){
    
    $fn = $_REQUEST["fn"];
    
    $picoplaca = new ConsultaController();
    
    /*
    * Get Consulta Pico y Placa 
    * 
    * @data JSON
    * return JSON status
    *
    */
    if($fn == 'consulta'){
        $picoplaca->consultarPlaca($_POST['placa'],$_POST['dia'],$_POST['hora']);
    }

}