<?php
include_once 'database-class.php';

if (!isset($_SESSION)) {session_start();}
if(isset($_SESSION['id_usuario'])){$id_usuario = $_SESSION['id_usuario'];}else{$id_usuario='' ;}
if(isset($_SESSION['primeiro_nome'])){$primeiro_nome = $_SESSION['primeiro_nome'] ;}else{$primeiro_nome ='';}
if(isset($_SESSION['nivel'])){$nivel = $_SESSION['nivel'] ;}else{$nivel ='';}

$sql_contador = "update rede_contador set contador = contador+1 where id_contador ='1'"; 
mysqli_query($conex->mysqli,$sql_contador);



$sql_select = "SELECT id_publicacao, id_publicacao_tipo, id_usuario, titulo, descricao, tamanho, url, contador, arquivo, data  FROM rede_publicacoes  order by id_publicacao desc limit 5"; 
$sql_query = mysqli_query($conex->mysqli,$sql_select);

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
<script language="javascript" src="javascript/main.js?<?php echo microtime()?>"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>

<body>

          <?php include_once 'top.php';?>

<div class="content">  


    <div class="busca-campo">
        <form action="busca.php" method="get">
            <input type="text" value="" name="busca" placeholder="PESQUISAR" class="input-default"  >
             
        <input type="submit" value=" PESQUISAR " class="button-default"></form>
    </div>
     
 
    
 
 
 <div class="main-links"> 
     
     <div class="main-circle">INCLUA
         <div class="link1-circle" onclick="publica('1')">VÍDEOS</div>
         <div class="link2-circle" onclick="publica('2')">IMAGENS</div>
         <div class="link3-circle" onclick="publica('3')">SONS</div>
         <div class="link4-circle" onclick="publica('6')">ARQUIVOS</div>
         <div class="link5-circle" onclick="publica('5')">TEXTO</div>
         <div class="link6-circle" onclick="publica('4')">LINKS</div>
     </div>
     
     
 </div>
 
    
    <div class="busca-resultado">
        
   
           
     
     
     <?php
     $cont =0;
     while ( $dados = $sql_query->fetch_assoc()){ $cont++;?>
     
     
        
     <div class="block-search"><p> <span class="title-search"> <?php if($cont==5){echo "5K";}?>    <?php echo $dados['titulo']?></span> <br> <?php echo $dados['descricao']?> <br>
             <?php if($dados['url']!=''){?><a href='<?php echo $dados['url']?>' target='blank'> <i class="fas fa-link"></i> <?php echo $dados['url'];}?></a>
             
             <?php if($dados['arquivo']!=''){?>Arquivo: <?php echo $dados['arquivo']?> / Tamanho: <?php echo $dados['tamanho'];?> bytes <br> <a href="arquivos/<?php echo $dados['arquivo']?>" target="_blank"><i class="fas fa-cloud-download-alt"></i> Download</a><?php }?> <i id="vi<?php echo $dados['id_publicacao']?>" class="far fa-eye <?php if($dados['contador'] >0){echo "green";}else {echo "grey";}?>"></i>  <a href="javascript:;" onclick="set_vi('<?php echo $dados['id_publicacao']?>')"> Vi</a>            
         </p>
             <p class='bottom-search'>
                 
                 <?php
$sql_tipo ="SELECT tipo from rede_publicacao_tipo where id_publicacao_tipo ='".$dados['id_publicacao_tipo']."'";
$sql_tipo = mysqli_query($conex->mysqli,$sql_tipo);
$dados_tipo = $sql_tipo->fetch_assoc();
echo '['.$dados_tipo['tipo'].'] ';

?>
                 <?php echo $dados['data']?>  <?php if($dados['id_usuario'] == $id_usuario or $nivel =='2'){?> <a href="editar.php?id_publicacao=<?php echo $dados['id_publicacao']?>">editar</a><?php }?> </p></div>
    
    
      <?php }?>

        
        
    </div>
 
</div>

    
   

    <?php include_once 'bottom.php';?>



</body>
</html>
