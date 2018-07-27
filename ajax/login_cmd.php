<?php
header ('Content-type: text/html; charset=iso-8859-1');
require_once '../database-class.php';

if (isset($_POST['email'])){$email = $_POST['email'];} else{ $email="";}
if (isset($_POST['senha'])){$senha = $_POST['senha'];} else{ $senha="";}

$email = $conex->mysqli->real_escape_string($email);
$senha = $conex->mysqli->real_escape_string($senha);




if ($email=="")
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Digite seu endereço de e-mail cadastrado!';";
echo "document.getElementById('email').focus();";
exit;
}


if ($senha=="")
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Digite sua senha!';";
echo "document.getElementById('senha').focus();";
exit;
}



$sql = "select id_usuario, nome, nivel from rede_usuarios where email ='".$email."' and senha =SHA1('".$senha."')   "; 

$result = mysqli_query($conex->mysqli,$sql);

if (mysqli_num_rows($result) != 1) 
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Ops, seu endereço de e-mail ou senha não conferem!';";
exit;
}

else
{

$dados = $result->fetch_assoc();    
$id_usuario = $dados['id_usuario'];
$nome = $dados['nome'];
$nivel = $dados['nivel'];
$nome = explode(" ", $nome);
$primeiro_nome = $nome[0];

if (!isset($_SESSION)) {session_start();}
$_SESSION['id_usuario'] = $id_usuario;
$_SESSION['primeiro_nome'] = $primeiro_nome;
$_SESSION['nivel'] = $nivel;

echo "location.href='index.php';";

}








?>





                