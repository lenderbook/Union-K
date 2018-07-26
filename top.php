  <div class="top">
      <div class="top-center">
          <div class="top-menu">
              
              <a href="index.php"><i class="fas fa-home"></i>  Home </a> &nbsp;&nbsp;&nbsp;
              
          <?php if($id_usuario=='')    {?>
              <a href="login.php"><i class="fas fa-lock-open"></i>  Entrar</a> 
          <?php } else{?>
              Olá, <b><i><?php echo $primeiro_nome?></i></b>! &nbsp;&nbsp;&nbsp;<a href="sair.php"><i class="fas fa-lock"></i>  Sair</a> 
              
          <?php }?>
          
          </div>
    
          <div><a href="index.php"><img src="images/logo_site.jpg" class="logo"></a></div>
          
          
        </div>
</div>