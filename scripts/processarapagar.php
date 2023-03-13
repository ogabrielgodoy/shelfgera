<?php
require_once('../config/dbconectar.php');
$pasta = "../arquivos/";

session_start();

$form= strip_tags($_POST['id']);
$id=filter_var($form, FILTER_SANITIZE_STRING);

$sql="SELECT * FROM tblivros WHERE idlivro = '$id' LIMIT 1";
$resultado=mysqli_query($conn,$sql);

$result=mysqli_fetch_array($resultado);

$arq=$pasta.''.$result['imagemlivro'];

if($result['imagemlivro'] === 'semcapa.jpg'){
    
}else{

if($result['imagemlivro'] != NULL){
    unlink($arq);
}
    }

$sql = "DELETE FROM tblivros WHERE idlivro = '$id' LIMIT 1";
mysqli_query($conn,$sql);
$_SESSION['msg_apagar'] = "Apagado com sucesso!";
header('location:../listarprodutos.php');


?>