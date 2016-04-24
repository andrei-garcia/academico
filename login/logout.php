<?php
session_start();
unset($_SESSION['nomeUsuario']);
unset($_SESSION['email']);
$_SESSION['sair'] = true;
header("Location: login.php");
?>