
function logout() {
	var posting = $.post("/academico/login/logout.php");
	 posting.done(function(data) {
	    location.reload();
  });
}

function buscaTurmas(turma){
	$.get( "turmas/"+turma, function( data ) {
	  $( ".main" ).html( data );
	});
}

function carregaPerfil(){
	$.get( "perfil/perfil.php", function( data ) {
	  $( ".main" ).html( data );
	});
}
