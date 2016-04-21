<?php 
session_start();
 if(isset($_SESSION['usuarioNome'])){
 	header("Location: ../");
 }
 session_destroy();
?>

<!DOCTYPE html>
<html lang="pt">
	<head>
	 	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Academico</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<link rel="stylesheet" href="../css/stylo.css">
	</head>
	<body>
		<div class="container containerLogin">
			<div class="divMeioLogin center-block">
				<div class="formLogin">
					<div class="imagemLogin">
						<img src="../imagens/loginLogo.png" class="img-responsive">
					</div>
					<form method="post" action="autenticacao.php">
					  <div class="form-group">
					    <input type="text" class="form-control" name="usuario" placeholder="Usúario" required>
			  		   </div>
					  <div class="form-group">
					    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
					  </div>
					  <button type="submit" class="btn btn-success">Entrar</button>
					</form>
				</div>
			</div>
		</div>
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>