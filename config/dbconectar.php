<?php


//esconder erros do php
error_reporting(0);
ini_set(“display_errors”, 0 );


//localhost
// $hostname="localhost";
// $username="root";
// $password="";
// $dbnome="dbbiblioteca";

//produção
$hostname="localhost";
$username="user";
$password="senha";
$dbnome="dbnome";


$conn=mysqli_connect($hostname,$username,$password,$dbnome);


if(!$conn){
    echo "<h1><b>Erro na conexão com banco de dados! Entre em contato com o administrador do sistema. </b></h1>";
    header('location:404.php');
}



?>
