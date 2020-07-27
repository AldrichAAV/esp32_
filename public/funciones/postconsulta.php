<?
require __DIR__ . '/../../src/models/postconsulta.php';

function funcionConsultaDatos ($request){
    $objSensor= new postconsulta();
    return $objSensor->ConsultaDatos($request);
}
