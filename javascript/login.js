 function cadastro(){
             
      location.href='cadastro.php';    
   
    }
    
    
function login(){
    document.getElementById("page-response").innerHTML=' Entrando...';
        xmlhttp.open("POST", "ajax/login_cmd.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
        xmlhttp.onreadystatechange = function() {
          if(xmlhttp.readyState == 4) { 
          document.getElementById("page-response").innerHTML='';
        document.getElementById("page-response").innerHTML=xmlhttp.responseText;
                   eval(xmlhttp.responseText);
}
};
 
 campos ="email="+escape(document.getElementById("email").value);
 campos =campos+"&senha="+escape(document.getElementById("senha").value);
 xmlhttp.send(campos);
    
}



    