<?php
include_once 'database-class.php';

if (!isset($_SESSION)) {session_start();}
if(isset($_SESSION['id_usuario'])){$id_usuario = $_SESSION['id_usuario'];}else{$id_usuario='' ;}
if(isset($_SESSION['primeiro_nome'])){$primeiro_nome = $_SESSION['primeiro_nome'] ;}else{$primeiro_nome ='';}
if(isset($_SESSION['nivel'])){$nivel = $_SESSION['nivel'] ;}else{$nivel ='';}



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
<script language="javascript" src="javascript/lembrar.js?<?php echo microtime()?>"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>

<body>

          <?php include_once 'top.php';?>

<div class="content">  

    
    <div class="content-login">

    <div class="login-div">
        <form >
            
            <p><i class="fas fa-lock-open"></i> LOGIN</p>
            <p>Informe seu e-mail e clique em "Lembrar senha"</p>
            <p>E-mail</p>
            <input type="text" value="" name="email" id="email" placeholder="email" class="input-default"  >
            
            <br>
        <input type="button" value=" LEMBRAR SENHA " class="button-default" onclick="lembrar()"></form>
        <div id="page-response">&nbsp;</div>
        
    </div>
     
 
    <div class="cadastre-div">
        
        <p>CADASTRE-SE</p>
        <p>        Para fazer publicações você precisa ter uma conta de acesso. É simples e rápido.</p>
        
        <input type="button" value=" CADASTRO " class="button-default" onclick="cadastro()">
        
    </div>
 
 
 
 
    </div>
    
   
 
</div>

    
   

    <?php include_once 'bottom.php';?>



</body>
</html>
