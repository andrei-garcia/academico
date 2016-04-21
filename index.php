<?php 
session_start();

 if(!isset($_SESSION['nomeUsuario']) || isset($_SESSION['sair'])){
 	session_destroy();
 	header("Location: login/login.php");
 }
 
?>

<!DOCTYPE html>
<html lang="pt">
	<head>
	 	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Acadêmico</title>
		<link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<script src="js/funcoes.js"></script>
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
		  		<div class="container-fluid  navbarTopo">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Menuu</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="index.php"><img src="imagens/logoIndex.png" id="imgIndex" class="img-responsive"></a>
				    </div>

    				<!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				    	<p class="navbar-text"><strong>Sistema Acadêmico</strong></p>
					      <?php if (isset($_SESSION['nomeUsuario'])): ?>
								<button style="margin-right: 5px" type="button" onclick="logout();" class="btn btn-danger navbar-btn navbar-right">Sair</button>	
								<p class="navbar-text pull-right texto-sucesso"><?= "Bem-Vindo : ".$_SESSION['descricao'] ?></p>
							
						 <?php endif; ?>
    				</div><!-- /.navbar-collapse -->
  				</div><!-- /.container-fluid -->
			</nav>
			<div class="container-fluid" style="margin-top:54px;">
				<div class="row">
					<div class="col-sm-3 col-md-2 divMenu" style='min-height:100%'>
			         	<ul class="nav nav-pills nav-stacked nav-pills-stacked-example">
			         	<li role="presentation"><a href="index.php">Início</a></li>
					      <li role="presentation"><a onclick="carregaPerfil()">Meu Perfil</a></li>
					      <li role="presentation" class="dropdown">
						    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						      Turmas 2016/1 <span class="caret"></span>
						    </a>
						    <ul class="dropdown-menu">
						      <li><a onclick="buscaTurmas('2016.1.php')">Programação orientada a objetos 2016/1</a></li>
						    </ul>
						  </li>
					    </ul>
		        	</div>
		        	<div class="col-sm-9  col-md-10 main" style='min-height:100%'>
		        			<h1>Bem-vindo ao sistema acadêmico</h1>
		        			<div class="panel panel-warning pull-left" style="width:50%;margin-top: 30px"> 
		        				<div class="panel-heading"> 
		        					<h3 class="panel-title">Lembretes</h3> 
		        				</div> 
		        				<div class="panel-body"> 
		        					A lista abaixo ajuda na organização da agenda semanal ou mensal.
		        				</div> 
		        				 <!-- List group -->
								  <ul class="list-group">
								    <li class="list-group-item">Atualizar notas turma 2016/1</li>
								    <li class="list-group-item">Marcar reunião com cordenador do curso.</li>
								    <li class="list-group-item">Orientar alunos.</li>
								    <li class="list-group-item">Atendimento todos os dias as 16h.</li>
								    <li class="list-group-item">Jogar bola hoje.</li>
								  </ul>
	        				</div>
		        			<div class="pull-right" style="width:25%;margin-top: 30px">
		        				<div class="alert alert-success" role="alert">Notícias</div>
		        				<p>Recentemento os professores receberam um aumento
		        				de 50% no salário.</p>
		        				<hr style="border-color: #A5BED4">
		        				<p>Novo edital de abertura de concurso para 
		        				o IFRS está diponível. Acessar <a href="http://www.ifrs.edu.br/site/">http://www.ifrs.edu.br/site/</a>
		        				para conferir.</p>
		        				<hr style="border-color: #A5BED4">
		        				<p>O jogos do IFRS vão abrir as inscrições.</p>
		        			</div>
		        	</div>
				</div>
			</div>
			<footer class="footer">
		      <div class="container">
		        <p class="text-center text-muted" style="margin-top: 20px">Desenvolvido por Andrei Garcia.</p>
		      </div>
		    </footer>
		   
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		 <script type="text/javascript">
	    	$(document).ready(function(){
				 var altura_tela = $(window).height();
				 $(".divMenu").height(altura_tela-118);
				 $(".main").height(altura_tela-118);
				 $( window ).resize(function() {   
				   var altura_tela = $(window).height();
				   $(".divMenu").height(altura_tela-118);
				   $(".main").height(altura_tela-118);
				 });
			}); 
	    </script>
	</body>
</html>