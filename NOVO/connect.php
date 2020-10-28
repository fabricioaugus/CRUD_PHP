<?php

DEFINE('HOST', 'localhost');
DEFINE('USERNAME', 'root');
DEFINE('PASSWORD', '');
DEFINE('DATABASE', 'mysql_pessoa');

// Create connection string
$mysqli = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);

// Check connection
if ( $mysqli->connect_error ) {
	die( "FALHA NA CONEXÃO" . $mysqli->connect_error );
}

mysqli_report( MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT );
$mysqli->set_charset("utf8_unicode_ci");