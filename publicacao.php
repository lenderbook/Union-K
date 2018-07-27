<?php
include_once 'database-class.php';

if (!isset($_SESSION)) {session_start();}
if(isset($_SESSION['id_usuario'])){$id_usuario = $_SESSION['id_usuario'];}else{$id_usuario='' ;}
if(isset($_SESSION['primeiro_nome'])){$primeiro_nome = $_SESSION['primeiro_nome'] ;}else{$primeiro_nome ='';}
if(isset($_SESSION['nivel'])){$nivel = $_SESSION['nivel'] ;}else{$nivel ='';}

//Se usuário não estiver logado
if($id_usuario ==''){header('Location:login.php');}


if(isset($_GET['t'])){$id_publicacao_tipo = $_GET['t'];}else{$id_publicacao_tipo='' ;}
$id_publicacao_tipo = $conex->mysqli->real_escape_string($id_publicacao_tipo);


$sql="SELECT  * from rede_publicacao_tipo where id_publicacao_tipo = '".$id_publicacao_tipo."'";
$result = mysqli_query($conex->mysqli,$sql);
$dados = $result->fetch_assoc();
$tipo = $dados['tipo'];



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
<script language="javascript" src="javascript/publicacao.js?<?php echo microtime()?>"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>

<body>

          <?php include_once 'top.php';?>

<div class="content">  

    
    <div class="content-login">

    <div class="login-div">
        <form >
            <input type="hidden" value="<?php echo $id_publicacao_tipo?>" name="id_publicacao_tipo" id="id_publicacao_tipo" >
            <input type="hidden" value="" name="id_publicacao" id="id_publicacao" >
            <input type="hidden" value="" name="file_name" id="file_name" >
            
            
            
            
            <p><i class="fas fa-cloud-upload-alt"></i> PUBLICAÇÃO - <?php echo $tipo?></p>
            <p>Informe os campos abaixo e clique em " PUBLICAR ".</p>
            
            <p>*Título da publicação</p>
            <input type="text" value="" name="titulo" id="titulo" placeholder="Título" class="input-default"  size="60" maxlength="100" >
            
            
              <p>URL</p>
            <input type="text" value="" name="url" id="url" placeholder="URL " class="input-default"  size="60"  >
            
            
            
            <p>*Descrição</p>
            <textarea  name="descricao" id="descricao" placeholder="Descrição da publicação" class="textarea-default" rows="4" cols="80"  ></textarea>
            
          
              <p>Arquivo</p>
              
              <p><a href="javascript:;" onclick="document.getElementById('file1').click();"><i class="fas fa-paperclip"></i> Anexar arquivo</a> (Max 2Mb)</p>
              
            <input type="file" onchange="inicia_upload(this.files[0].name)" id="file1" > 
            
            
            <span id="arquivo1">&nbsp; </span><span id="progress_bar"></span>
            


         
            
            <p> 
                <input type="button" value=" PUBLICAR " class="button-default" onclick="publicar()"></p>
        </form>
        <div id="page-response"></div>
    </div>
     
 

 
 
 
 
    </div>
    
   
 
</div>

    
   

    <?php include_once 'bottom.php';?>



</body>
</html>
