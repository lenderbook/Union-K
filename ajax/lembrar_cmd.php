<?php
header ('Content-type: text/html; charset=iso-8859-1');
require_once '../database-class.php';

if (isset($_POST['email'])){$email = $_POST['email'];} else{ $email="";}


$email = $conex->mysqli->real_escape_string($email);





if ($email=="")
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Digite seu endere�o de e-mail cadastrado!';";
echo "document.getElementById('email').focus();";
exit;
}


$sql = "select lembrete_senha from rede_usuarios where email ='".$email."'    "; 

$result = mysqli_query($conex->mysqli,$sql);


if (mysqli_num_rows($result) != 1) 
{
echo "document.getElementById('page-response').className ='warning-error';";
echo "document.getElementById('page-response').innerHTML='Ops, seu endere�o de e-mail n�o confere!';";
exit;
}

else
{
$dados = $result->fetch_assoc();
$lembrete_senha = $dados['lembrete_senha'];
   

echo "document.getElementById('page-response').className ='warning-success';";
echo "document.getElementById('page-response').innerHTML='Ol�, o seu lembrete de senha � <b>$lembrete_senha</b>. Caso n�o lembre sua senha, fa�a um novo cadastro.';";


}








?>





                