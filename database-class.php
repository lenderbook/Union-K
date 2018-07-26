<?php
require_once 'config.php';

class Conex
{
public $mysqli;

//Conectar ao banco
public  function connect()
{
  $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PSW, DB_DATABASE);
 if ( $this->mysqli->connect_errno > 0) {die("Falha ao conectar: ['".$this->mysqli->connect_errno . "' - '" . $this->mysqli->connect_error."']");}
  $this->mysqli->set_charset("latin1");
}

//Disconectar
public  function disconnect()
{$this->mysqli->close();	
}

}

$conex = new Conex;
$conex->connect();



?>