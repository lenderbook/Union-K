 var upload_status = '0';
 
 
 function publicar(){
             
     
       if (upload_status =='1'){
           
document.getElementById('page-response').className ='warning-information';
document.getElementById('page-response').innerHTML='Ops, aguarde o envio do arquivo anexo...';
       }
       else{
       
       
        document.getElementById("page-response").innerHTML=' Aguarde, estamos realizando a publicação...';
        xmlhttp.open("POST", "ajax/publicacao_cmd.php",true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
        xmlhttp.onreadystatechange = function() {
          if(xmlhttp.readyState == 4) { 
          document.getElementById("page-response").innerHTML='';
       // document.getElementById("page-response").innerHTML=xmlhttp.responseText;
                   eval(xmlhttp.responseText);
}
};
 
 campos ="id_publicacao_tipo="+escape(document.getElementById("id_publicacao_tipo").value);
 campos =campos+"&titulo="+escape(document.getElementById("titulo").value);
  campos =campos+"&url="+escape(document.getElementById("url").value);
 campos =campos+"&descricao="+escape(document.getElementById("descricao").value);
 campos =campos+"&file_name="+escape(document.getElementById("file_name").value);
 xmlhttp.send(campos);

}

 }

    
    
    function inicia_upload(file){
        
        document.getElementById('arquivo1').innerHTML = 'Aguarde...  ';
        upload(event);
    }
    
    
    
    
    //Upload imagem


function upload(e) 
{
e.preventDefault();

upload_status = '1';



var files = document.getElementById('file1').files;

var formData = new FormData();


// Loop through each of the selected files.
for (var i = 0; i < files.length; i++) {
  var file = files[i];
formData.append('file1', file, file.name);
}

var xhr = new XMLHttpRequest();


xhr.upload.addEventListener('progress', function(e){

    document.getElementById('progress_bar').innerHTML = parseInt((e.loaded / e.total) *100) +'%';
    
    
    

} );

//xhr.upload.addEventListener('load', function(e){alert('tranferencia ok'); } );
//xhr.upload.addEventListener('error', function(e){alert('falha na transferencia'); } );
//xhr.upload.addEventListener('abort', function(e){alert('transferencia cancelada'); } );


xhr.onload = function () 
{

if (xhr.status === 200) 
{
document.getElementById('progress_bar').innerHTML='';

upload_status = '0';
    
   


eval(xhr.responseText);
} 
};



xhr.open('POST', 'ajax/upload_cmd.php', true);
xhr.send(formData);

}



