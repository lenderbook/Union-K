<?php
header ('Content-type: text/html; charset=iso-8859-1');
require_once '../database-class.php';


gravar();


function gravar()
{

global $conex;

if (isset($_POST['nome'])) {$nome =$_POST['nome'];}
if (isset($_POST['email'])) {$email =$_POST['email'];}
if (isset($_POST['senha2'])) {$senha2 =$_POST['senha2'];}
if (isset($_POST['senha'])) {$senha =$_POST['senha'];}

if ($nome == "")
{

echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Ops, você ainda não informou um nome para o cadastro!';";
echo "document.getElementById('nome').focus();";
exit;
}


if ($email == "")
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Digite um endereço de e-mail válido.';";
echo "document.getElementById('email').focus();";
exit;
}


if ($senha == "")
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Digite uma senha para sua conta.';";
echo "document.getElementById('senha').focus();";
exit;
}


if ($senha2 == "")
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Digite sua senha novamente.';";
echo "document.getElementById('senha2').focus();";
exit;
}


if ($senha != $senha2)
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Há algo errado com sua senha. Digite novamente.';";
echo "document.getElementById('senha').focus();";
exit;
}


$sql = "select id_usuario from rede_usuarios where email ='".$email."'"; 
$result = mysqli_query($conex->mysqli,$sql);
$qtde = mysqli_num_rows($result);

if ($qtde >  0){
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Olá, identificamos que o seu e-mail já se encontra cadastrado em nosso banco de dados. ';";
exit;		
	
}



$sql="Insert into rede_usuarios (nome, email, senha, nivel) values ('".$nome."','".$email."',SHA1('".$senha."'),'1')";
mysqli_query($conex->mysqli,$sql);

$sql = "select id_usuario from rede_usuarios where nome ='".$nome."' and email = '".$email."' "; 
$result = mysqli_query($conex->mysqli,$sql);
$dados = $result->fetch_assoc();
$id_usuario = $dados['id_usuario'];

if (!isset($_SESSION)) {session_start();}

$nome = explode(" ", $nome);
$primeiro_nome= $nome[0];

$_SESSION['id_usuario'] = $id_usuario;
$_SESSION['primeiro_nome'] = $primeiro_nome;

echo "location.href='index.php'";

}







?>





                