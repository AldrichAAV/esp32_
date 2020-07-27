<?php
class postconsulta
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
