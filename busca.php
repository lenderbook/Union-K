<?php
include_once 'database-class.php';

if (!isset($_SESSION)) {session_start();}
if(isset($_SESSION['id_usuario'])){$id_usuario = $_SESSION['id_usuario'];}else{$id_usuario='' ;}
if(isset($_SESSION['primeiro_nome'])){$primeiro_nome = $_SESSION['primeiro_nome'] ;}else{$primeiro_nome ='';}



if(isset($_GET['busca'])){$busca = $_GET['busca'];}else{$busca='' ;}
$busca = $conex->mysqli->real_escape_string($busca);





$pagina =explode("/", $_SERVER['PHP_SELF']);
$pagina = end( $pagina);
if(isset($_GET['sort'])) { $sort = $_GET['sort']; } else { $sort = "id_publicacao desc"; }
if(isset($_GET['p'])) {$p = $_GET['p'];} //pagina atual
if(isset($p)) { $p = $p; } else { $p = 1; }
$qnt = 5;
$inicio = ($p*$qnt) - $qnt;
$sql_select = "SELECT id_publicacao, id_publicacao_tipo, id_usuario, titulo, descricao, tamanho, url, contador, arquivo, data  FROM rede_publicacoes where  titulo like '%".$busca."%' or descricao like '%".$busca."%' or url like '%".$busca."%' or arquivo like '%".$busca."%' or data  like '%".$busca."%' order by ".$sort." LIMIT $inicio, $qnt"; 
$sql_query = mysqli_query($conex->mysqli,$sql_select);

$sql_select_all = "SELECT id_publicacao, id_publicacao_tipo, id_usuario, titulo, descricao, tamanho, url, contador, arquivo, data FROM rede_publicacoes where  titulo like '%".$busca."%' or descricao like '%".$busca."%' or url like '%".$busca."%' or arquivo like '%".$busca."%' or data like '%".$busca."%'  "; 
$sql_query_all = mysqli_query($conex->mysqli,$sql_select_all);
$total_registros = mysqli_num_rows($sql_query_all); 
$pags = ceil($total_registros/$qnt); 
$max_links = 5; 



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
<script language="javascript" src="javascript/main.js?<?php echo microtime()?>"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

</head>

<body>

          <?php include_once 'top.php';?>

<div class="content">  
    
     <div class="busca-campo">
        <form action="busca.php" method="get">
            <input type="text" value="<?php echo $busca?>" name="busca" placeholder="PESQUISAR" class="input-default"  >
             
        <input type="submit" value=" PESQUISAR " class="button-default" ></form>
    </div>
    

    
 <div class="busca-resultado">
     
     <p>Resultado da busca por "<b><?php echo $busca?></b>". (<?php echo $total_registros?>) registro(s) encontrado(s). </p>
     
     
     
     <?php while ($dados = $sql_query->fetch_assoc()){?>
     
     
        
     <div class="block-search"><p> <span class="title-search"><?php echo $dados['titulo']?></span> <br> <?php echo $dados['descricao']?> <br>
             <?php if($dados['url']!=''){?><a href='<?php echo $dados['url']?>' target='blank'><i class="fas fa-link"></i> <?php echo $dados['url'];}?></a>
             
             <?php if($dados['arquivo']!=''){?>Arquivo: <?php echo $dados['arquivo']?> / Tamanho: <?php echo $dados['tamanho'];?> bytes <br> <a href="arquivos/<?php echo $dados['arquivo']?>" target="_blank"><i class="fas fa-cloud-download-alt"></i> Download</a><?php }?>  <i id="vi<?php echo $dados['id_publicacao']?>" class="far fa-eye <?php if($dados['contador'] >0){echo "green";}else {echo "grey";}?>"></i>  <a href="javascript:;" onclick="set_vi('<?php echo $dados['id_publicacao']?>')"> Vi</a>
         </p>
             <p class='bottom-search'>
<?php
$sql_tipo ="SELECT tipo from rede_publicacao_tipo where id_publicacao_tipo ='".$dados['id_publicacao_tipo']."'";
$sql_tipo = mysqli_query($conex->mysqli,$sql_tipo);
$dados_tipo = $sql_tipo->fetch_assoc();
echo '['.$dados_tipo['tipo'].'] ';

?>
 <?php echo date('d/m/Y H:i', strtotime($dados['data']))?>  <?php if($dados['id_usuario'] == $id_usuario){?> <a href="editar.php?id_publicacao=<?php echo $dados['id_publicacao']?>">editar</a><?php }?>   </p></div>
    
    
      <?php }?>
            
    
         <div class="page-paging">
<?php
echo "<a href=".$pagina."?p=1&sort=".$sort."&busca=".$busca."><img title=' < Primeira página ' class='border-0' src='images/first.jpg'> </a> ";
for($i = $p-$max_links; $i <= $p-1; $i++) { 
if($i <=0) {} else { echo "<a href='".$pagina."?p=".$i."&sort=".$sort."&busca=".$busca."' >".$i."</a> "; } } 
echo $p." "; 
for($i = $p+1; $i <= $p+$max_links; $i++) {  if($i > $pags) { }  else { echo "<a href='".$pagina."?p=".$i."&sort=".$sort."&busca=".$busca."'>".$i."</a> "; } } 
echo "<a href='".$pagina."?p=".$pags."&sort=".$sort."&busca=".$busca."' ><img class='border-0' alt=' < Primeira página ' src='images/last.jpg'>  </a> ";
?>

</div>    

        
        
    </div>
    
   
 
</div>

    
   

    <?php include_once 'bottom.php';?>



</body>
</html>
