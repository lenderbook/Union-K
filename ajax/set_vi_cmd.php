<?php
header ('Content-type: text/html; charset=iso-8859-1');
require_once '../database-class.php';



if (isset($_POST['id_publicacao'])) {$id_publicacao =$_POST['id_publicacao'];}
$id_publicacao = $conex->mysqli->real_escape_string($id_publicacao);

$sql = "update rede_publicacoes set contador = contador+1 where id_publicacao  ='".$id_publicacao."'  "; 
mysqli_query($conex->mysqli,$sql);



?>





                