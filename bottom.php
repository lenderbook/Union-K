<div id="rodape">
    
    <?php 
    
    if(isset($_SESSION['nivel'])){$nivel = $_SESSION['nivel'] ;}else{$nivel ='';}
    
    if($nivel == '2'){
      
$sql_contador="SELECT  contador from rede_contador where id_contador = '1'";
$result_contador = mysqli_query($conex->mysqli,$sql_contador);
$dados_contador = $result_contador->fetch_assoc();
$contador = $dados_contador['contador'];
    
    ?>
    <div>Contador de impress�es : <?php echo $contador?></div>    
    
    <?php }?>
    
<div class="rodape">
    
        <div class="logos-rodape"><img src="images/logo_lenderbook.png"></div>
       

</div>
    
    
</div>