<?php
	require_once 'funcoes.php';
	
	define('DB-HOST', 'localhost');
	define('DB-USER', 'root');
	define('DB-PASS', 'root');
	define('DB-NAME', 'BD_CEFETMG');

	init_set('display_error, true');
	error_reporting(E-ALL);

	date_default_timezone_set(America/Sao_Paulo);

?>
