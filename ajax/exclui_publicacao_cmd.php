<?php
header ('Content-type: text/html; charset=iso-8859-1');
require_once '../database-class.php';

if (!isset($_SESSION)) {session_start();}
$id_usuario = $_SESSION['id_usuario'];

if(isset($_SESSION['nivel'])){$nivel = $_SESSION['nivel'] ;}else{$nivel ='';}


if (isset($_POST['id_publicacao'])) {$id_publicacao =$_POST['id_publicacao'];}


$sql="SELECT  * from rede_publicacoes where id_publicacao = '".$id_publicacao."'";
$result = mysqli_query($conex->mysqli,$sql);
$dados = $result->fetch_assoc();

$arquivo = $dados['arquivo'];
$id_usuario_publicacao = $dados['id_usuario'];

//Somente o dono da publicação pode alterá-la
if($id_usuario_publicacao != $id_usuario and $nivel =='1'){

echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Ops, somente o usuário que fez a publicação ou o administrador podem fazer alterações.';";
exit;
}


if ($arquivo!=''){
$file = UPLOAD_PATH. $arquivo;
unlink($file);
}

$sql="delete from rede_publicacoes  where id_publicacao = '".$id_publicacao."'";
mysqli_query($conex->mysqli,$sql);


echo "document.getElementById('page-response').className ='warning-success';";
echo "document.getElementById('page-response').innerHTML='Publicação excluída com sucesso!';";
echo "document.getElementById('div-edita-arquivo').className ='hidden';";
echo "document.getElementById('div-upload-arquivo').className ='';";
echo "document.getElementById('id_publicacao').value='';";
echo "document.getElementById('file_name').value='';";
echo "document.getElementById('titulo').value='';";
echo "document.getElementById('url').value='';";
echo "document.getElementById('descricao').value='';";





?>





                