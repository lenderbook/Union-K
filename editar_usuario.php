<?php
include_once 'database-class.php';

if (!isset($_SESSION)) {session_start();}
if(isset($_SESSION['id_usuario'])){$id_usuario = $_SESSION['id_usuario'];}else{$id_usuario='' ;}
if(isset($_SESSION['primeiro_nome'])){$primeiro_nome = $_SESSION['primeiro_nome'] ;}else{$primeiro_nome ='';}
if(isset($_SESSION['nivel'])){$nivel = $_SESSION['nivel'] ;}else{$nivel ='';}

//Somente o administrador com nível 2 pode ver esta página

if(isset($_SESSION['nivel'])){$nivel = $_SESSION['nivel'] ;}else{$nivel ='';}
if($nivel !='2'){
    header('location:index.php');
}


if(isset($_GET['id_usuario'])){$id_usuario = $_GET['id_usuario'];}else{$id_usuario='' ;}
$id_usuario = $conex->mysqli->real_escape_string($id_usuario);


$sql="SELECT  * from rede_usuarios where id_usuario = '".$id_usuario."'";
$result = mysqli_query($conex->mysqli,$sql);
$dados = $result->fetch_assoc();

$nome = $dados['nome'];
$email = $dados['email'];
$senha = $dados['senha'];
$nivel_usuario = $dados['nivel'];
$lembrete_senha = $dados['lembrete_senha'];

switch ($nivel_usuario) {
case '1': $nivel_usuario_txt ='Usuário';break;
case '2': $nivel_usuario_txt ='Administrador';break;
}


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title> Lenderbook - Rede</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="theme-color" content="#A2BE7A">
<link rel=stylesheet href="css/main.css?<?php echo microtime();?>" type="text/css">
<script language="javascript" src="javascript/ajax.js"></script>
<script language="javascript" src="javascript/editar_usuario.js?<?php echo microtime()?>"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>

<body>

          <?php include_once 'top.php';?>

<div class="content">  

    
    <div class="content-login">

    <div class="login-div">
        <form >
            <input type="hidden" value="<?php echo $id_usuario?>" name="id_usuario" id="id_usuario"  >
            
            <p><i class="fas fa-user-alt"></i> EDIÇÃO DE USUÁRIO</p>
            <p>Informe seus dados e clique em " Alterar ".</p>
            
            <p>*Nome</p>
            <input type="text" value="<?php echo $nome?>" name="nome" id="nome" placeholder="Seu nome" class="input-default"  size="50" >
            
            
            
            <p>*E-mail</p>
            <input type="text" value="<?php echo $email?>" name="email" id="email" placeholder="email" class="input-default" size="50"  >
            
            
            <p>Tipo de usuário</p>
            <select  name="nivel" id="nivel" class="input-default" >
                <option selected value="<?php echo $nivel_usuario?>"><?php echo $nivel_usuario_txt?></option>
                <option value="1">Usuário</option>
                <option value="2">Administrador</option>
                            </select>
            
            
            <p>*Senha</p>
            <input type="password" value="" name="senha" id="senha" placeholder="senha" class="input-default"  >
            
            <p>*Confirme sua senha</p>
            <input type="password" value="" name="senha2" id="senha2" placeholder="Confirme sua senha" class="input-default"  >
            
            <br> 
            
              <p>Lembrete de senha</p>
            <input type="text" value="<?php echo $lembrete_senha?>" name="lembrete_senha" id="lembrete_senha" placeholder="Para ajudar a lembrar " class="input-default"  >
            
            <br> 
            
        <input type="button" value=" ALTERAR " class="button-default" onclick="editar()"></form>
        
        <p><i class="far fa-trash-alt"></i> Para excluir este usuário,<a href="javascript:;" onclick="excluir()"> clique aqui.</a></p>
        <div id="page-response"></div>
    </div>
     
 

 
 
 
 
    </div>
    
   
 
</div>

    
   

    <?php include_once 'bottom.php';?>



</body>
</html>
