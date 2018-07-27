 function cadastro(){
             
     
       
        document.getElementById("page-response").innerHTML=' Aguarde, estamos realizando o seu cadastro...';
        xmlhttp.open("POST", "ajax/cadastro_cmd.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
        xmlhttp.onreadystatechange = function() {
          if(xmlhttp.readyState == 4) { 
          document.getElementById("page-response").innerHTML='';
       // document.getElementById("page-response").innerHTML=xmlhttp.responseText;
                   eval(xmlhttp.responseText);
}
};
 
 campos ="nome="+escape(document.getElementById("nome").value);
 campos =campos+"&email="+escape(document.getElementById("email").value);
  campos =campos+"&senha="+escape(document.getElementById("senha").value);
 campos =campos+"&senha2="+escape(document.getElementById("senha2").value);
 campos =campos+"&lembrete_senha="+escape(document.getElementById("lembrete_senha").value);
 xmlhttp.send(campos);

    
    

}



    