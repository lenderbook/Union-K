 function editar(){
               
       
        document.getElementById("page-response").innerHTML=' Aguarde, estamos realizando o seu cadastro...';
        xmlhttp.open("POST", "ajax/editar_usuario_cmd.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
        xmlhttp.onreadystatechange = function() {
          if(xmlhttp.readyState == 4) { 
          document.getElementById("page-response").innerHTML='';
       // document.getElementById("page-response").innerHTML=xmlhttp.responseText;
                   eval(xmlhttp.responseText);
}
};
 
 campos ="cmd="+escape('gravar');
 campos = campos+"&nome="+escape(document.getElementById("nome").value);
 campos =campos+"&id_usuario="+escape(document.getElementById("id_usuario").value);
 campos =campos+"&nivel="+escape(document.getElementById("nivel").value);
 campos =campos+"&email="+escape(document.getElementById("email").value);
  campos =campos+"&senha="+escape(document.getElementById("senha").value);
 campos =campos+"&senha2="+escape(document.getElementById("senha2").value);
 campos =campos+"&lembrete_senha="+escape(document.getElementById("lembrete_senha").value);
 xmlhttp.send(campos);

    
    

}



function excluir(){
               
       
        document.getElementById("page-response").innerHTML=' Aguarde, estamos realizando o seu cadastro...';
        xmlhttp.open("POST", "ajax/editar_usuario_cmd.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
        xmlhttp.onreadystatechange = function() {
          if(xmlhttp.readyState == 4) { 
          document.getElementById("page-response").innerHTML='';
       // document.getElementById("page-response").innerHTML=xmlhttp.responseText;
                   eval(xmlhttp.responseText);
}
};
 
 campos ="cmd="+escape('excluir');
  campos =campos+"&id_usuario="+escape(document.getElementById("id_usuario").value);
 xmlhttp.send(campos);

    
    

}


    