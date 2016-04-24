<?php 
session_start();

 if(!isset($_SESSION['nomeUsuario']) || isset($_SESSION['sair'])){
 	session_destroy();
 	header("Location: login/login.php");
 } 

$dsn = 'mysql:dbname=academico;host=127.0.0.1';
$user = 'andrei';
$password = 'academico';

try {
    $con = new PDO($dsn,$user,$password);
    $sql = "SELECT alunos.id as id_aluno,notas.id,alunos.nome as nome,n1,n2,n3,n4 
    		FROM notas
			left join alunos on 
				alunos.id = notas.id_aluno
			left join disciplinas on
				disciplinas.id = notas.id_disciplina";

	$res = $con->query($sql);

	if($res->rowCount()){
		//nao tem nada tratar aqui
	}	
	

} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>

<table class="table">
	<thead>
		<th>Aluno</th>
		<th>N1</th>
		<th>N2</th>
		<th>N3</th>
		<th>N4</th>
		<th>Editar Notas</th>
	</thead>
	<tbody>
		<?php while($row = $res->fetch(PDO::FETCH_OBJ)): ?>
			<tr>
				<td><?= $row->nome ?></td>
				<td><?= $row->n1 ?></td>
				<td><?= $row->n2 ?></td>
				<td><?= $row->n3?></td>
				<td><?= $row->n4 ?></td>
				<td>
					<span class="glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="modal" data-target=<?= ".".$row->id ?>>
						
					</span>

						<?php $id = "class='modal fade {$row->id}'" ?>
						<div <?= $id ?> tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
						  <div class="modal-dialog modal-sm">
						    <div class="modal-content">
							    <div class="modal-header">
					        		<h4 class="modal-title" id="exampleModalLabel"><?= $row->nome ?></h4>
					      		</div>
						    	<div class="modal-body">
							      <form method="post" action="turmas/atualizaNotas.php">
							      		<input type="hidden" name='id' value=<?= $row->id_aluno ?>>
						      		  <div class="form-group">
									    <label for="n1">N1</label>
									    <input type="text" class="form-control" id="n1" name="n1" value=<?= $row->n1 ?>>
									  </div>
									  <div class="form-group">
									    <label for="n2">N2</label>
									    <input type="text" class="form-control" id="n2" name="n2" value=<?= $row->n2 ?>>
									 </div>
									<div class="form-group">   
									    <label for="n3">N3</label>
									    <input type="text" class="form-control" id="n3" name="n3" value=<?= $row->n3 ?>>
									  </div>
									  <div class="form-group">
									    <label for="n4">N4</label>
									    <input type="text" class="form-control" id="n4" name="n4" value=<?= $row->n4 ?>>
									  </div>
									  <button type="submit" class="btn btn-default">Atualizar Notas</button>
									  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									</form>
								</div>
						    </div>
						  </div>
						</div>
				</td>
			</tr>
		<?php endwhile ?>
	</tbody>
</table>
