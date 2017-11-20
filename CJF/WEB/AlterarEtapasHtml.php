<?php  

	ini_set('default_charset','UTF-8');

	$strNomeServer = "localhost";
	$strNomeUsuario = "root";
	$strSenha = null;
	$strDBnome = "Educatio";

	//Cria conexão
	$conn = new mysqli($strNomeServer, $strNomeUsuario, $strSenha);
	//Verifica conexão
	if ($conn->connect_error) {
   		die("Falha na conexão: " . $conn->connect_error."<br>");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Manutenção de Etapas - Alterar</title>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link href="https://fonts.googleapis.com/css?family=Abel|Inconsolata" rel="stylesheet">

	<!-- CSS do Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/bootstrap.css" rel="stylesheet"/>

	<!-- CSS do grupo -->
	<link href="CJF-web-estilos.css" rel="stylesheet" type="text/css" >

	<!-- Arquivos js -->
	<script src="js/popper.js"></script>
	<script src="js/jquery-3.2.1.js" type="text/javascript"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>

	<!-- Fontes e icones -->
	<link href="css/nucleo-icons.css" rel="stylesheet">		
</head>
<body>
	<div class="section landing-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto">
					<h2 class="text-center">Alteração de etapa</h2>
					<form method='post' action='AlterarEtapas.php' class="contact-form">
						<div class="col-md-6">
							<label class="fonteTexto">Digite o Id da etapa que deseja alterar:</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="nc-icon nc-check-2"></i>
								</span>
								<input type='textarea' class="form-control" name='etapa' placeholder="Id da etapa" required='required' id='txt_consulta'>
							</div>
							<table class='table table-hover' id="tabela">
								<?php
								//Tabela de Pesquisa
								$strSQL = $conn->query("SELECT idOrdem FROM `Educatio`.`etapas`");
								while($arrLinha = $strSQL->fetch_assoc()) {
									echo "<tr value='".$arrLinha['idOrdem']."' onclick('document.getElementById('txt_consulta').value = document.getElementById(this).innerHTML')><th>".$arrLinha['idOrdem']."</th></tr>";
								}
								echo "</table>";
								?>
								<!-- Filtro da Tabela -->
								<script>
					 				$('input#txt_consulta').quicksearch('table#tabela tbody tr');
								</script>
									
								<!-- Função de clique na tabela -->
								<script>
									$(document.getElementById("tabela")).ready(function() {
										$('tr').click(function () { 
											document.getElementById("txt_consulta").value = $(this).attr("value");
										});
									});
								</script>
							<label class="fonteTexto">Digite o novo valor da etapa</label>
							<div class="input-group">
								<span class="input-group-addon">
									<i class="nc-icon nc-check-2"></i>
								</span>
								<input type='textarea' class="form-control" name='valor' placeholder="Novo valor" required='required'>
							</div>
							<input class="btn btn-info btn-round" type='submit' value='Alterar'>
						</div>
					</form>
				</div>
			</div>
		</div>				
	</div>
</body>
</html>


