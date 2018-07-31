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




$sql = "select id_publicacao from rede_publicacoes where titulo ='".$titulo."' and descricao = '".$descricao."' and id_usuario ='".$id_usuario."'"; 
$result = mysqli_query($conex->mysqli,$sql);
$qtde = mysqli_num_rows($result);


if ($qtde >  0){
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Olá, parece que você já fez esta publicação antes. ';";
exit;		
	
}



$sql_tipo ="SELECT tipo from rede_publicacao_tipo where id_publicacao_tipo ='".$id_publicacao_tipo."'";
$sql_tipo = mysqli_query($conex->mysqli,$sql_tipo);
$dados_tipo = $sql_tipo->fetch_assoc();
$tipo =$dados_tipo['tipo'];


$data = date('d/m/Y H:i:s');

$sql="Insert into rede_publicacoes (titulo, descricao, url, id_usuario, contador, id_publicacao_tipo, arquivo, tamanho, data, tipo ) values ('".$titulo."','".$descricao."','".$url."','".$id_usuario."','0','".$id_publicacao_tipo."','".$file_name."','".$tamanho."','".$data."','".$tipo."' )";
mysqli_query($conex->mysqli,$sql);


$sql = "select id_publicacao from rede_publicacoes where titulo ='".$titulo."' and descricao = '".$descricao."' and id_usuario ='".$id_usuario."' "; 
$result = mysqli_query($conex->mysqli,$sql);
$dados = $result->fetch_assoc();
$id_publicacao = $dados['id_publicacao'];

echo "document.getElementById('id_publicacao').value ='$id_publicacao';";
echo "document.getElementById('page-response').className ='warning-success';";
echo "document.getElementById('page-response').innerHTML='Conteúdo publicado com sucesso! ';";



}







?>





                