<?php
class registro
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
  public function selectplanta($request){
    $req = json_decode($request->getbody());

    $sql = "SELECT * FROM planta";
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
  
}
