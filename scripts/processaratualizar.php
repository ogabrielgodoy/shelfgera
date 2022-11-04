<?php require_once('../config/dbconectar.php');
session_start();

//filtro
$post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$id=strip_tags($post['id']);
$nome=strip_tags($post['nome']);
$sku=strip_tags($post['sku']);
$autor=strip_tags($post['autor']);
$genero=strip_tags($post['genero']);
$estoque=strip_tags($post['estoque']);
$status="ativo";

$arquivo=$_FILES['arquivo'];

//puxar a foto antiga
if($arquivo['name']){

 //se der erro na hora do envio
 if ($arquivo['error']){
    $_SESSION['msg_erro']="Erro ao enviar arquivo!";
    var_dump($arquivo);
    header('location:../listarprodutos.php');
    exit;
}

//se o arquivo for maior q 2mb
if ($arquivo['size'] > 2097152){
    $_SESSION['msg_erro']="Arquivo enviado muito grande. Máx: 2MB";
    header('location:../listarprodutos.php');
    exit;
}

        $pasta = "../arquivos/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();

//strtolower deixa tudo minusculo e extrai a extensão do arquivo
$extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

//se for diferente de jpg, ou png
if ($extensao != "jpg" && $extensao != 'png' && $extensao != 'webp'){
    $_SESSION['msg_erro']="Tipo de arquivo não aceito! Ele precisa ser JPG, PNG ou WEBP";
    header('location:../listarprodutos.php');
    exit;
}

$envio=move_uploaded_file($arquivo["tmp_name"], $pasta . $novoNomeDoArquivo . "." . $extensao);

//retorna o valor true se deu certo var_dump($envio);

//se deu certo
if($envio){
    $imagemlivro=$novoNomeDoArquivo . "." . $extensao;
}else{
    $_SESSION['msg_erro']="Algo deu errado! Envie novamente sua foto. Ela precisa ser no formato: JPG, PNG ou WEBP, e no máx 2MB.";
    header('location:../listarprodutos.php');
}

$sql = "UPDATE tblivros SET `nomelivro` = '$nome', `skulivro` = '$sku', `autorlivro` = '$autor', `imagemlivro` = '$imagemlivro', `generolivro` = '$genero', `estoquelivro` = '$estoque' WHERE `tblivros`.`idlivro` = $id;";
mysqli_query($conn,$sql);
$_SESSION['msg_certo']="Produto atualizado!";
header('location:../listarprodutos.php');


}else{
    $sql = "SELECT * FROM `tblivros` WHERE idlivro = $id;";
	$resultado = mysqli_query($conn,$sql);
	$result = mysqli_fetch_array($resultado);
    $imagemlivro=$result['imagemlivro'];

    
    $sql = "UPDATE tblivros SET `nomelivro` = '$nome', `skulivro` = '$sku', `autorlivro` = '$autor', `imagemlivro` = '$imagemlivro', `generolivro` = '$genero', `estoquelivro` = '$estoque' WHERE `tblivros`.`idlivro` = $id;";
    mysqli_query($conn,$sql);
    $_SESSION['msg_certo']="Produto atualizado!";
    header('location:../listarprodutos.php');
}

?>