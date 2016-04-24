<?php 

session_start();
if(!isset($_SESSION['nomeUsuario']) || isset($_SESSION['sair'])){
	session_destroy();
	header("Location: ../login/login.php");
}

$dsn = 'mysql:dbname=academico;host=127.0.0.1';
$user = $_SESSION['nomeUsuario'];
$password = $_SESSION['senha'];

try {
    $con = new PDO($dsn,$user,$password);
    $sql = "UPDATE notas SET n1=?,n2=?,n3=?,n4=? WHERE id_aluno=?";
    $res = $con->prepare($sql);

     $res->bindParam(1,$_POST['n1']);
	 $res->bindParam(2,$_POST['n2']);
	 $res->bindParam(3,$_POST['n3']);
	 $res->bindParam(4,$_POST['n4']);
	 $res->bindParam(5,$_POST['id']);
	 $res->execute();
	 $_SESSION['buscarTurma'] = true;
	 header("Location: ../index.php");
	
} catch (PDOException $e) {
    header("Location: ../login/login.php");
} 

?>