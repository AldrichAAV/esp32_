<?
require __DIR__ . '/../../src/models/antenas.php';

function funcionInsertarAntena ($request){
    $objSensor= new antenas();
    return $objSensor->insertarAntena($request);
}
function funcionDeleteAntena ($request){
    $objSensor= new antenas();
    return $objSensor->deleteAntena($request);
}
function funcionUpdateAntena ($request){
    $objSensor= new antenas();
    return $objSensor->updateAntena($request);
}