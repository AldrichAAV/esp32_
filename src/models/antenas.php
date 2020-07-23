<?php
class antenas
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
  public function insertarAntena($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO Antenas(idZona,Recepcion) VALUES(:idZona,
    :Recepcion)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idZona", $req->idZona);
        $statement->bindparam("Recepcion", $req->Recepcion);
        $statement->execute();
        $response="Antena registrada con exito";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function deleteAntena($request){
    $req = json_decode($request->getbody());
    $sql = "DELETE FROM Antenas WHERE idAntena=:idAntena";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idAntena", $req->idAntena);
        $statement->execute();
        $response->$result="Se elimino exitosamente la Antena";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage(); }
    return json_encode($response);  }

    public function updateAntena($request){
      $req = json_decode($request->getbody());
      $sql = "UPDATE Antenas SET idZona=:idZona,Recepcion=:Recepcion WHERE idAntena=:idAntena";
      $response=new stdClass();
        try {
          $statement = $this->con->prepare($sql);
          $statement->bindparam("idAntena", $req->idAntena);
          $statement->bindparam("idZona", $req->idZona);
          $statement->bindparam("Recepcion", $req->Recepcion);
          $statement->execute();
          $response=$req;
        } catch (Exception $e) {
          $response->mensaje = $e->getMessage(); }
      return json_encode($response);  }
}
