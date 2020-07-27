<?
require __DIR__ . '/../../src/models/plantazona.php';

function funcionInsertarPlantaZona ($request){
    $objSensor= new plantazona();
    return $objSensor->insertarPlantaZona($request);
}
function funcionUR ($request){
    $objSensor= new plantazona();
    return $objSensor->UR($request);
}