<?
require __DIR__ . '/../../src/models/sensores.php';
function funcionsensores($request){
    $objSensor= new Sensores();
    return $objSensor->insertarSensor($request);
}
function funciongetSensoreData($request){
    $objSensor= new Sensores();
    return $objSensor->getSensorData($request);
}
function funcionUpdate($request){
    $objSensor= new Sensores();
    return $objSensor->cambiaSensorValor($request);
}
