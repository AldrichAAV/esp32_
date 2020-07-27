<?
require __DIR__ . '/../../src/models/cultivos.php';
function funcionInsertarPlanta ($request){
    $objSensor= new Cultivos();
    return $objSensor->insertarPlanta($request);
}
function funcionConsultaDatos ($request){
    $objSensor= new Cultivos();
    return $objSensor->ConsultaDatos($request);
}
function funcionDeletePlanta ($request){
  $objSensor= new Cultivos();
  return $objSensor->deletePlanta($request);
}
function funcionUpdatePlanta ($request){
  $objSensor= new Cultivos();
  return $objSensor->updatePlanta($request);
}


