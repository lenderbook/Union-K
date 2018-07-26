<?php
header ('Content-type: text/html; charset=iso-8859-1');
include '../database-class.php';
//include 'compress_img_cmd.php';


if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['id_usuario'])) 
{
session_destroy(); 
exit;
}

$id_usuario = $_SESSION['id_usuario'];

  
 
if (!isset($_FILES['file1'])) 
{print "document.getElementById('arquivo1').innerHTML='Selecione um arquivo'";
exit;}



$uploaddir = UPLOAD_PATH;

$uploadfile = $uploaddir . $_FILES['file1']['name'];

$stamp = date('dmYHis');

$nome_inicial = $_FILES['file1']['name'];

$nomearquivo = $id_usuario."_".$stamp."_".$_FILES['file1']['name'];

$nomearquivo = str_replace(' ','_', $nomearquivo);
$nomearquivo = str_replace('%','_', $nomearquivo);
$nomearquivo = str_replace('@','_', $nomearquivo);



$extensao = strrchr($nomearquivo, '.');
$extensao = strtolower($extensao);

  if(!strstr('.jpg;.jpeg;.gif;.png;.pdf;.mp4;.wav;.avi;.doc;.docx;.xls;.xlsx;.bmp;.tif;.mp3;.txt', $extensao))
    {
echo "document.getElementById('arquivo1').innerHTML='Ops, este arquivo não tem uma extensão permitida!';";
exit;
  }



$tamanho = $_FILES['file1']['size'];
if ($tamanho > 2000000)//4 mega
{
print "document.getElementById('arquivo1').innerHTML= 'O arquivo é muito grande!';";
exit;
}




if (move_uploaded_file($_FILES['file1']['tmp_name'], $uploaddir . $nomearquivo)) {

print "document.getElementById('arquivo1').innerHTML='<i class=\"far fa-check-circle\"></i>  $nome_inicial';";
print "document.getElementById('file_name').value='$nomearquivo';";

} 
else 
{
    echo "document.getElementById('arquivo1').innerHTML='Não foi possível fazer o envio deste arquivo.'" ;
}




?>
