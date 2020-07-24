<?php
class zonas
{
  private $con;

  function __construct()
  {
    $db = new DbConnect;
    $this->con = $db->connect();
  }
  function __destruct()
  {
    $this->con = null;
  }

  public function insertarZona($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO ZonaCultivo(longitud,NomZona,Latitud) VALUES(:longitud,
    :NomZona,:Latitud)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("longitud", $req->longitud);
        $statement->bindparam("NomZona", $req->NomZona);
        $statement->bindparam("Latitud", $req->Latitud);
        $statement->execute();
        //$response="Zona registrada con exito";
        $lastInsertId = $this->con->lastInsertId();
        $response->mensaje="Zona registrada con exito, el ID de la Zona es $lastInsertId";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function deleteZona($request){
    $req = json_decode($request->getbody());
    $sql = "DELETE FROM ZonaCultivo WHERE idZona=:idZona";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idZona", $req->idZona);
        $statement->execute();
        $response->mensaje="Se elimino exitosamente la Zona";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage(); }
    return json_encode($response);  }
}