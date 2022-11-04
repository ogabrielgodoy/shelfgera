<?php
session_start();
require_once('../config/dbconectar.php');

if($_POST['entrar']){
	
	$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);	//converter usando filtro
	
	$nome=strip_tags($post['nome']);
	$senha=strip_tags($post['senha']);


//Validação nome
$user_valido=false;
$sql = "SELECT * FROM tbuser WHERE nomeuser = '$nome' LIMIT 1";
$resultado= mysqli_query($conn,$sql);

if(mysqli_num_rows($resultado) == 1){
	$user_valido=true;
}else{
	$_SESSION['msg_erro'] = "Senha ou Nome inválidos!";
	header('location:../form-login.php');
	exit;
}

if($user_valido){//Validação senha
$senha_valida=false;
$sql = "SELECT * FROM tbuser WHERE senhauser = '$senha' LIMIT 1";
$resultado= mysqli_query($conn,$sql);

if(mysqli_num_rows($resultado) == 1){
	$senha_valida=true;
}else{
	$_SESSION['msg_erro'] = "Senha ou Nome inválidos!";
	header('location:../form-login.php');
	exit;
	}
		}	

//validado
if($user_valido && $senha_valida){
	
	$sql = "SELECT * FROM tbuser WHERE nomeuser = '$nome'";
	$resultado= mysqli_query($conn,$sql);
	$string=mysqli_fetch_array($resultado);
	$_SESSION['iduser']=$string['iduser'];
	$_SESSION['nomeuser']=$string['nomeuser'];
	$_SESSION['rauser']=$string['rauser'];
	$_SESSION['cpfuser']=$string['cpfuser'];
	$_SESSION['datauser']=$string['datauser'];
	$_SESSION['serieuser']=$string['serieuser'];
	$_SESSION['cargouser']=$string['cargouser'];
	$_SESSION['statususer']=$string['statususer'];
	header('location:../paineluser.php');
}

}else{
	$_SESSION['msg_erro'] = "Faça login!";
	header('location:../form-login.php');
}






// $sql= "SELECT * FROM tbusers WHERE nomeuser = '$nome'";
// $resultado=mysqli_query($conn,$sql);

// if(mysqli_num_rows($resultado) != 0){
// 	$sql= "SELECT * FROM tbusers WHERE senhauser = '$senha'";
// 	$resultado=mysqli_query($conn,$sql);
// 	if(mysqli_num_rows($resultado) != 0){

// 		$string = mysqli_fetch_array($resultado);
// 		$_SESSION['iduser']=$string['iduser'];
// 		$_SESSION['nomeuser']=$string['nomeuser'];
// 		$_SESSION['nomecompletouser']=$string['nomecompletouser'];
// 		$_SESSION['senhauser']=$string['senhauser'];
// 		$_SESSION['cargouser']=$string['cargouser'];
// 		$_SESSION['statususer']=$string['statususer'];
// 		//header('location:paineluser.php');

// 	}else{
// 		//header('location:page-login.php');
// 		$_SESSION['msg_erro'] = "Senha ou Email inválidos!";
// 	}

// }else{
// 	//header('location:page-login.php');
// 	$_SESSION['msg_erro'] = "Senha ou Email inválidos!";
// }
?>