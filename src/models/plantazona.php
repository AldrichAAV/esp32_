<?php
class plantazona
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
  public function UR($request){
    $req = json_decode($request->getbody());

    $sql = "SELECT * from registros order by idRegistro asc limit 1;";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);  
        $statement->execute();        
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function insertarPlantaZona($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO Planta_Zona (idPlanta,idZona) VALUES(:idPlanta,:idZona)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idPlanta", $req->idPlanta);
        $statement->bindparam("idZona", $req->idZona);
        $statement->execute();
        $response->mensaje=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  
}