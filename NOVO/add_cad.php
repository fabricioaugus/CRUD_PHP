<?php
require 'connect.php';

	//CLICAR PAR ENVIAR
if( isset($_POST['btnSubmit']) ) {

	
	$NOME = $mysqli->real_escape_string( $_POST['NOME'] );
	$SOBRENOME = $mysqli->real_escape_string( $_POST['SOBRENOME'] );
	$TELEFONE = $mysqli->real_escape_string( $_POST['TELEFONE'] );
	$CPF = $mysqli->real_escape_string( $_POST['CPF'] );

	
	$stmt = $mysqli->prepare("INSERT INTO `db_novo` (`NOME`, `SOBRENOME`, `TELEFONE`, `CPF`) VALUES(?, ?, ?, ?)");

	$stmt->bind_param( "ssss", $NOME, $SOBRENOME, $TELEFONE, $CPF );

	if( $stmt->execute() ) {
		$alert_message = "SALVANDO O CADASTRO ";
	} else {
		$alert_message = "HÁ ERRO NÃO TENTAR NOVAMENTE ";
	}

	//FECHAR STMT
	$stmt->close();

	// FECHAR A CONEXÃO COM BANCO DE DADOS 
	$mysqli->close();

}


?>
<html>
	<head>
		<title>ADICIONAR NOVO CADASTRO</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<table width="70%" cellpadding="2" cellspacing="2" align="center" style="margin-top:20px;">
			<tr>
				<td align="center"><h2>ADICIONAR NOVO CADASTRO</h2></td>
			</tr>
			<tr>
				<td>
					<?php 
					if( isset( $alert_message ) AND !empty( $alert_message )) {
						echo "<div class='alert alert-success'>".$alert_message."</div>";
					}
					?>
					<form method="post">
						<table width="60%" cellpadding="5" cellspacing="5" align="center">
						<tr>
							<td style="width:30%">NOME:</td>
							<td><input required type="text" class="form-control" name="NOME" style="width:100%;" placeholder="nome"></td>
						</tr>
						<tr>
							<td style="width:30%">SOBRENOME:</td>
							<td><input required type="text" class="form-control" name="SOBRENOME" style="width:100%;" placeholder="sobrenome"></td>
						</tr>
						<tr>
							<td style="width:30%">TELEFONE:</td>
							<td><input required type="text" class="form-control" name="TELEFONE" style="width:100%;" placeholder="telefone"></td>
						</tr>
						<tr>
							<td style="width:30%">CPF:</td>
							<td><input required type="text" class="form-control" name="CPF" style="width:100%;" placeholder="cpf"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button type="submit" name="btnSubmit" class="btn btn-primary">Enviar</button>
								<a href="index.php" class="btn btn-info">voltar para lista</a>
							</td>
						</tr>
						</table>
					</form>
				</td>
			</tr>
		</table>
	</body>
</html>