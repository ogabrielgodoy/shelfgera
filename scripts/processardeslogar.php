<?php
session_start();

unset($_SESSION['iduser']);
unset($_SESSION['nomeuser']);
unset($_SESSION['rauser']);
unset($_SESSION['cpfuser']);
unset($_SESSION['datauser']);
unset($_SESSION['serieuser']);
unset($_SESSION['cargouser']);
unset($_SESSION['statususer']);


$_SESSION['msg_certo'] = "Deslogado com sucesso!";
header('location:../form-login.php');

?>