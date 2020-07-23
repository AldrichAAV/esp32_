<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__ .'/../vendor/phpmailer/phpmailer/src/Exception.php';
require __DIR__ .'/../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require __DIR__ .'/../vendor/phpmailer/phpmailer/src/SMTP.php';

require __DIR__ . '/../vendor/autoload.php';

session_start();

// Instantiate the app
$settings = require __DIR__ . '/../src/settings.php';
$app = new \Slim\App($settings);

// Set up dependencies
require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

/////////////////////////////////////////////////////////////
//-----------Security--------------------------
////////////////////////////////////////////////
//------Conexión con la base de datos----------
require_once __DIR__ . '/../includes/DbConnect.php';
////////////////////////////////////////////////

include 'funciones/cultivos.php';
include 'funciones/registro.php';
include 'funciones/zonas.php';
include 'funciones/antenas.php';
include 'funciones/plantazona.php';

// Run app
$app->run();

/*
CREATE DATABASE Sembradio;
USE Sembradio;
create table planta(idPlanta int not null auto_increment,NomPlanta varchar(45),primary key(idPlanta));
create table registros(idRegistro int not null auto_increment,idPlanta int not null,PH float,TempAgua float,Hmedad float,fecha date,primary key (idRegistro,idPlanta));
alter table registros add constraint fk_idPlanta foreign key (idPlanta) references planta(idPlanta)on delete cascade;
create table ZonaCultivo(idZona int not null auto_increment,longitud float,NomZona varchar(45),Latitud float,primary key(idZona));
create table Planta_Zona(idPlanta int not null, idZona int not null,primary Key (idPlanta,idZona));
alter table Planta_Zona add constraint fk_idPlant foreign key (idPlanta) references planta(idPlanta)on delete cascade;
alter table Planta_Zona add constraint fk_idZona foreign key (idZona) references ZonaCultivo(idZona)on delete cascade;
create table Antenas (idAntena int not null auto_increment,idZona int not null,Recepcion varchar(45),primary key(idAntena,idZona));
alter table Antenas add constraint fk_idZona2 foreign key (idZona) references ZonaCultivo(idZona)on delete cascade;
  select * from planta;
  -- delete from planta where idPlanta>0;
  select * from registros;
  select * from ZonaCultivo;
  select * from Planta_Zona;
  select * from Antenas;
  drop database Sembradio;

    SELECT NomPlanta,PH,Hmedad,TempAgua,NomZona FROM (Planta_Zona natural join planta natural join registros) 
    natural join ZonaCultivo WHERE NomPlanta="cebollin" and idZona=1;
    UPDATE registros SET PH=1,TempAgua=1,Hmedad=1,fecha=0-0-0 WHERE idPlanta=3;
*/