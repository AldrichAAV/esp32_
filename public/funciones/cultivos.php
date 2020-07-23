<?
require __DIR__ . '/../../src/models/cultivos.php';
function funcionInsertarPlanta ($request){
    $objSensor= new Cultivos();
    return $objSensor->insertarPlanta($request);
}
//function funcionInsertarRegistro ($request){
  //  $objSensor= new Cultivos();
    //return $objSensor->insertarRegistro($request);
//}
//function funcionInsertarZona ($request){
    //$objSensor= new Cultivos();
  //  return $objSensor->insertarZona($request);
//}
//function funcionInsertarAntena ($request){
  //  $objSensor= new Cultivos();
    //return $objSensor->insertarAntena($request);
//}
//function funcionInsertarPlantaZona ($request){
  //  $objSensor= new Cultivos();
    //return $objSensor->insertarPlantaZona($request);
//}
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
