<?php 

require 'connect.php';


if( isset($_POST['btnSubmit']) ) {

	
	$NOME = $mysqli->real_escape_string( $_POST['NOME'] );
	$SOBRENOME = $mysqli->real_escape_string( $_POST['SOBRENOME'] );
	$TELEFONE = $mysqli->real_escape_string( $_POST['TELEFONE'] );
	$CPF = $mysqli->real_escape_string( $_POST['CPF'] );

	$stmt = $mysqli->prepare("UPDATE `db_novo` SET `NOME`=?, `SOBRENOME`=?, `TELEFONE`=?, `CPF`=? WHERE `ID`=?");

	$stmt->bind_param( "ssssi", $NOME, $SOBRENOME, $TELEFONE, $CPF, $_GET['ID'] );

	if( $stmt->execute() ) {
		$alert_message = "DADOS ATUALIZAR COM SUCESSO.";
	} else {
		$alert_message = "ERRO NO ATUALIZAR";
	}

	$stmt->close();

}

?>
<html>
	<head>
		<title>EDITAR CADASTRO</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<table width="70%" cellpadding="2" cellspacing="2" align="center" style="margin-top:20px;">
			<tr>
				<td align="center"><h2>EDITAR CADASTRO</h2></td>
			</tr>
			<tr>
				<td>
					<?php 
					if( isset( $alert_message ) AND !empty( $alert_message )) {
						echo "<div class='alert alert-success'>".$alert_message."</div>";
					}
					?>

					<?php 
					$stmt = $mysqli->prepare("SELECT `NOME`, `SOBRENOME`, `TELEFONE`, `CPF` FROM `db_novo` WHERE `ID` = ?");
					$stmt->bind_param("i", $_GET['ID']);
					$stmt->execute();
					$stmt->store_result();
					if( $stmt->num_rows == 1 ) {
						$stmt->bind_result($NOME, $SOBRENOME, $TELEFONE, $CPF);
						$stmt->fetch();
					?>
					<form method="post">
						<table width="60%" cellpadding="5" cellspacing="5" align="center">
						<tr>
							<td style="width:30%">ATUALIZAR NOME</td>
							<td><input required class="form-control" type="text" name="NOME" style="width:100%;" placeholder="NOVO NOME" value="<?=$NOME?>"></td>
						</tr>
						<tr>
							<td style="width:30%">ATUALIZAR SOBRENOME:</td>
							<td><input required class="form-control" type="text" name="SOBRENOME" style="width:100%;" placeholder="NOVO SOBRENOME" value="<?=$SOBRENOME?>"></td>
						</tr>
						<tr>
							<td style="width:30%">ATUALIZAR TELEFONE:</td>
							<td><input required class="form-control" type="text" name="TELEFONE" style="width:100%;" placeholder="" value="<?=$TELEFONE?>"></td>
						</tr>
						<tr>
							<td style="width:30%">ATUALIZAR CPF:</td>
							<td><input required class="form-control" type="text" name="CPF" style="width:100%;" placeholder="NOVO CPF" value="<?=$CPF?>"></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<button type="submit" name="btnSubmit" class="btn btn-primary">ENVIAR NOVOS DADOS</button>
								<a href="index.php" class="btn btn-info">VOLTAR LISTA</a>
							</td>
						</tr>
						</table>
					</form>
					<?php } else {
						echo "Invalid employee";
					} ?>
				</td>
			</tr>
		</table>
	</body>
</html>