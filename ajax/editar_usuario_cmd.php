<?php
header ('Content-type: text/html; charset=iso-8859-1');
require_once '../database-class.php';



//Somente o administrador com nível 2 pode ver esta página
if (!isset($_SESSION)) {session_start();}
if(isset($_SESSION['nivel'])){$nivel = $_SESSION['nivel'] ;}else{$nivel ='';}
if($nivel !='2'){
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Ops, você tem permissão para este procedimento!';";

}


if (isset($_POST['cmd'])) {$cmd =$_POST['cmd'];}
if ($cmd =='gravar'){gravar();}
if ($cmd =='excluir'){ excluir();}


function gravar()
{

global $conex;

if (isset($_POST['id_usuario'])) {$id_usuario =$_POST['id_usuario'];}
if (isset($_POST['nome'])) {$nome =$_POST['nome'];}
if (isset($_POST['email'])) {$email =$_POST['email'];}
if (isset($_POST['nivel'])) {$nivel =$_POST['nivel'];}
if (isset($_POST['senha2'])) {$senha2 =$_POST['senha2'];}
if (isset($_POST['senha'])) {$senha =$_POST['senha'];}
if (isset($_POST['lembrete_senha'])) {$lembrete_senha =$_POST['lembrete_senha'];}

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

if ($nivel == "")
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Selecione o tipo de acesso Usuário ou Administrador.';";
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

if ($lembrete_senha == "")
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Digite uma palavra ou termo que te ajude a lembrar sua senha.';";
echo "document.getElementById('lembrete_senha').focus();";
exit;
}



$sql="update rede_usuarios set nome ='".$nome."', email ='".$email."', senha =SHA1('".$senha."'), nivel ='".$nivel."', lembrete_senha = '".$lembrete_senha."' where id_usuario = '".$id_usuario."'";
mysqli_query($conex->mysqli,$sql);

echo "document.getElementById('page-response').className ='warning-success';";
echo "document.getElementById('page-response').innerHTML='Ok, registro alterado com sucesso.';";



}



function excluir()
{

global $conex;

if (isset($_POST['id_usuario'])) {$id_usuario =$_POST['id_usuario'];}

$sql="delete from rede_usuarios where id_usuario = '".$id_usuario."'";
mysqli_query($conex->mysqli,$sql);

echo "document.getElementById('page-response').className ='warning-success';";
echo "document.getElementById('page-response').innerHTML='Ok, usuário excluído com sucesso.';";
echo "document.getElementById('id_usuario').value='';";
echo "document.getElementById('nome').value='';";
echo "document.getElementById('email').value='';";
echo "document.getElementById('senha').value='';";
echo "document.getElementById('idsenha2').value='';";


}




?>





                