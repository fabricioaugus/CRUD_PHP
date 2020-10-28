<?php 
require 'connect.php';
?>
<html>
	<head>
		<title>LISTAR CAD</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body style="background-color:#93a3e8;">
		<div class="container" style="background-color:#FFF; margin-top:40px;">
			<div class="row">
				<div class="col-md-12">
					<h2 style="margin-top:20px;">LISTAR CADASTRO</h2>
					<a href = "add_cad.php"class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> ADICIONAR NOVO CADASTRO</a>
					<table width="100%" class="table table-hover table-striped table-condensed table-bordered" style="margin-top:20px;">
						<thead>
							<tr>	
								<th>NOME</th>
								<th>SOBRENOME</th>
								<th>TELEFONE</th>
								<th>CPF</th>
								<th>AÇÕES</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$stmt = $mysqli->prepare("SELECT `ID`, `NOME`, `SOBRENOME`, `TELEFONE`, `CPF` FROM `db_novo` ORDER BY `ID` ASC");
							$stmt->execute();
							$stmt->store_result();
							if( $stmt->num_rows > 0 ) {
								$stmt->bind_result($ID, $NOME, $SOBRENOME, $TELEFONE, $CPF);
								while( $stmt->fetch() ) {
							?>
							<tr>
								<td><?=$NOME?></td>
								<td><?=$SOBRENOME?></td>
								<td><?=$TELEFONE?></td>
								<td><?=$CPF?></td>
								<td align="center">
									<a href="editar_cad.php?ID=<?=$ID?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> EDITAR</a>
									<a href="deletar_cad.php?ID=<?=$ID?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash"></i> EXCLUIR</a> 
								</td>
							</tr>
							<?php } } else {?>
							<tr>
								<td colspan="5" align="center">NÃO HÁ CADASTRO</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
		
	</body>
</html>