<link rel="stylesheet" href="css/bootstrap.min.css">
<?php 

require 'connect.php';

// Prepare statement 
$stmt = $mysqli->prepare("DELETE FROM `db_novo` WHERE `ID`=?");

// bind param
$stmt->bind_param("i", $_GET['ID']);

if( $stmt->execute() ) {
	echo "<div class='alert alert-success'> VOCÊ DELETOU O CADASTRO SELECIONADO <a href='index.php'>VOLTAR LISTA</a></div>";
}  else {
	echo "<div class='alert alert-danger'>ERRO AO DELETAR, TENTE NOVAMENTE .</div>";
}

// clsoe prepare statement
$stmt->close();

// close connection
$mysqli->close();