<?php
class Cultivos
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

  public function insertarPlanta($request)
  {
    $req = json_decode($request->getbody());
    $sql = "INSERT INTO planta(nomplanta) VALUES(:nomplanta)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("nomplanta", $req->nomplanta);
        $statement->execute();
        //$response="Planta registrada con exito";
        $lastInsertId = $this->con->lastInsertId();
        $response->mensaje="Planta registrada con exito, el ID de la planta es $lastInsertId";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function insertarRegistro($request)
  {
    $req = json_decode($request->getbody());

    $sql = "INSERT INTO registros(idPlanta,PH,TempAgua,Hmedad,fecha) VALUES(:idPlanta,:PH,:TempAgua,:Hmedad,:fecha)";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idPlanta", $req->idPlanta);
        $statement->bindparam("PH", $req->PH);
        $statement->bindparam("TempAgua", $req->TempAgua);
        $statement->bindparam("Hmedad", $req->Hmedad);
        $statement->bindparam("fecha", $req->fecha);
        $statement->execute();
        //$response="Registro de datos exitoso";
        $lastInsertId = $this->con->lastInsertId();
        $response->mensaje="Registro exitoso, el ID del registro es $lastInsertId";
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
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
        $response->mensaje="Antena registrada con exito";
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
  public function ConsultaDatos($request)
  {
    $req = json_decode($request->getbody());

    $sql = "SELECT PH,Hmedad,TempAgua,fecha FROM (Planta_Zona natural join planta natural join registros) 
     WHERE NomPlanta=:NomPlanta and idZona=:idZona";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("NomPlanta", $req->NomPlanta);
        $statement->bindparam("idZona", $req->idZona);      
        $statement->execute();        
        $response->Nombre=$req->NomPlanta;
        $response->result=$statement->fetchall(PDO::FETCH_OBJ);
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage();
      }

    return json_encode($response);
  }
  public function updatePlanta($request){
    $req = json_decode($request->getbody());
    $sql = "UPDATE registros SET PH=:PH,TempAgua=:TempAgua,Hmedad=:Hmedad,fecha=:fecha WHERE idPlanta=:idPlanta";
    $response=new stdClass();
      try {
        $statement = $this->con->prepare($sql);
        $statement->bindparam("idPlanta", $req->idPlanta);
        $statement->bindparam("PH", $req->PH);
        $statement->bindparam("TempAgua", $req->TempAgua);
        $statement->bindparam("Hmedad", $req->Hmedad);
        $statement->bindparam("fecha", $req->fecha);
        $statement->execute();
        $response->mensaje=$req;
      } catch (Exception $e) {
        $response->mensaje = $e->getMessage(); }
    return json_encode($response);  }

    public function deletePlanta($request){
      $req = json_decode($request->getbody());
      $sql = "DELETE FROM planta WHERE idPlanta=:idPlanta";
      $response=new stdClass();
        try {
          $statement = $this->con->prepare($sql);
          $statement->bindparam("idPlanta", $req->idPlanta);
          $statement->execute();
          $response->$result="Se elimino exitosamente la Planta";
        } catch (Exception $e) {
          $response->mensaje = $e->getMessage(); }
      return json_encode($response);  }
}
