<?php 
//echo "oii";
//header('Location: http://www.google.com/');
//exit;

session_start();

if(isset($_SESSION['nomeUsuario'])){
	header("Location: ../");
}

if(empty($_POST['usuario']) || empty($_POST['senha'])){
	$_SESSION['msg'] = "É preciso informa o usuário e a senha.";
	header("Location: login.php");
}

/* Connect to an ODBC database using driver invocation */
$dsn = 'mysql:dbname=academico;host=127.0.0.1';
$user = $_POST['usuario'];
$password = $_POST['senha'];
$login = false;
$nomeUsuario = "";
$email = "";
try {
    $con = new PDO($dsn,$user,$password);
    $sql = "SELECT email,senha,nomeUsuario,concat_ws(' ',nome,sobrenome) as descricao FROM usuarios WHERE email = ? or nomeUsuario = ? ";
	$res = $con->prepare($sql);
	$res->bindParam(1,$_POST['usuario']);
	$res->bindParam(2,$_POST['usuario']);
	$res->execute();

	if($res->rowCount() > 0){
		$row = $res->fetch(PDO::FETCH_OBJ);
		if($row->senha === $_POST['senha']){
			$login = true;
			$nomeUsuario = $row->nomeUsuario;
			$email = $row->email;
			$descricao = $row->descricao;
			$senha = $row->senha;
		}
	}
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    //exit();
}

if($login){
	$_SESSION['email'] = $email;
	$_SESSION['descricao'] = $descricao;
	$_SESSION['nomeUsuario'] = $nomeUsuario;
	$_SESSION['senha'] = $senha;
	header("Location: ../");
}else{
	$_SESSION['msg'] = "Senha ou usuário incorretos.";
	header("Location: login.php");
}


?>