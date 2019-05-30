<?php
header('Access-Control-Allow-Origin: *'); 
require $_SERVER['DOCUMENT_ROOT'] . "/app/vendor/autoload.php";

/*
*
* Ajax Factory
*
*
*/
//require $_SERVER['DOCUMENT_ROOT'] . "/youneed_frontend/vendor/autoload.php";

use Controllers\PioPlacaConytroller;

if(isset($_REQUEST)){
    
    $fn = $_REQUEST["fn"];
    
    $picoplaca = new PioPlacaConytroller();
    
    /*
    * Get Api Servicios 
    * 
    * @data JSON
    * return Bolean
    *
    */
    if($fn == 'consulta'){
        $picoplaca->consultarPlaca($_POST['placa'],$_POST['dia'],$_POST['hora']);
    }

}