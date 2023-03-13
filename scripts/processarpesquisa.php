<?php
session_start();
require_once('../config/dbconectar.php');


$post=filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

$pesquisa= strip_tags($post['pesq']);

//nome livro
$sql= "SELECT * FROM tblivros WHERE nomelivro = '$pesquisa'";
$resultado=mysqli_query($conn,$sql);

if(mysqli_num_rows($resultado) == 1){
        $_SESSION['pesq']= $pesquisa;
       header('location:../mostrarpesquisa.php');
}else{

    //sku livro
    $sql= "SELECT * FROM tblivros WHERE skulivro = '$pesquisa'";
    $resultado=mysqli_query($conn,$sql);

    if(mysqli_num_rows($resultado) == 1){
        $_SESSION['pesq']= $pesquisa;
        header('location:../mostrarpesquisa.php');
        
    }

}


if(mysqli_num_rows($resultado) == 0){

    $_SESSION['msg_atencao'] = 'Não foi encontrado nenhum livro com este nome!';
    header('location:../listarprodutos.php');
}

?>




