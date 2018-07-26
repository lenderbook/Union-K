<?php
header ('Content-type: text/html; charset=iso-8859-1');
require_once '../database-class.php';

if (!isset($_SESSION)) {session_start();}
$id_usuario = $_SESSION['id_usuario'];



gravar();


function gravar()
{

global $conex;
global $id_usuario;

if (isset($_POST['id_publicacao'])) {$id_publicacao =$_POST['id_publicacao'];}
if (isset($_POST['id_publicacao_tipo'])) {$id_publicacao_tipo =$_POST['id_publicacao_tipo'];}
if (isset($_POST['titulo'])) {$titulo =$_POST['titulo'];}
if (isset($_POST['descricao'])) {$descricao =$_POST['descricao'];}
if (isset($_POST['url'])) {$url =$_POST['url'];}
if (isset($_POST['file_name'])) {$file_name =$_POST['file_name'];}


//Pegar tamanho do arquivo se existir o arquivo

if($file_name !=''){

$file = UPLOAD_PATH. $file_name;
if (file_exists( $file )){
$tamanho = filesize($file);
}
else{
    $tamanho ='';
}
}
else{
    $tamanho ='';
}


if ($titulo == "")
{

echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Ops, você ainda não informou um título para a publicação!';";
echo "document.getElementById('titulo').focus();";
exit;
}


if ($descricao == "")
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Escreva uma descrição para a publicação.';";
echo "document.getElementById('descricao').focus();";
exit;
}





$sql="update rede_publicacoes set titulo ='".$titulo."', descricao ='".$descricao."', url ='".$url."',id_publicacao_tipo ='".$id_publicacao_tipo."', arquivo='".$file_name."', tamanho ='".$tamanho."' where id_publicacao ='".$id_publicacao."'";
mysqli_query($conex->mysqli,$sql);

echo "document.getElementById('page-response').className ='warning-success';";
echo "document.getElementById('page-response').innerHTML='Conteúdo alterado com sucesso! ';";



}







?>





                