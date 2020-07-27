<?
require __DIR__ . '/../../src/models/registro.php';
function funcionInsertarRegistro ($request){
    $objSensor= new registro();
    return $objSensor->insertarRegistro($request); }
    function funcionselectplantas ($request){
        $objSensor= new registro();
        return $objSensor->selectplanta($request);
      }
