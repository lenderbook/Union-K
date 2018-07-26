 function publica(tipo_publicacao){
        
        location.href='publicacao.php?t='+tipo_publicacao;
        
    
   
    
  
    }
    
    
    function set_vi(id_publicacao){
        
        document.getElementById("vi"+id_publicacao).classList.remove('grey');
        document.getElementById("vi"+id_publicacao).classList.add('green');
        xmlhttp.open("POST", "ajax/set_vi_cmd.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
        xmlhttp.onreadystatechange = function() {
          if(xmlhttp.readyState == 4) { 
         // document.getElementById("page-response").innerHTML='';
       // document.getElementById("page-response").innerHTML=xmlhttp.responseText;
                   eval(xmlhttp.responseText);
}
};
 
 campos ="id_publicacao="+escape(id_publicacao);
 xmlhttp.send(campos);

    }