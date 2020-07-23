<?
require __DIR__ . '/../../src/models/zonas.php';

function funcionInsertarZona ($request){
    $objSensor= new zonas();
    return $objSensor->insertarZona($request);
}
function funcionDeleteZona ($request){
    $objSensor= new zonas();
    return $objSensor->deleteZona($request);
}