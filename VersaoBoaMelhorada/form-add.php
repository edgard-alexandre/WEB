<?php
	require 'init.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Envio de dados</title>
		<meta charset="utf-8">
		<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="jquery.maskedinput.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>	
		<div class="topo">
			<ul class = "menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php">Clientes</a></li>
				<li><a href="index.php">Fornecedores</a></a></li>
				<li><a href="index.php">Sobre</a></li>
			</ul>
		</div>
		<div class="logo">
			<img src="logo.png" class= "imagelogo" width= "100">
		</div>	
		<form method="post" name="formCadastro" action="add.php" enctype="multipart/form-data">
			<h3 id="cliente">Cadastro de Clientes</h3>
			<h3 id="cliente1">Cadastro de Clientes</h3>
			<table class="tabelaClientes" width="100%">
				<tr>
					<th width="18%"> Nome </th>
					<td width="82%"><input type="text" name="txtNome"></td>
				</tr>	
				<tr>
					<th> Email </th>
					<td><input type="email" name="txtEmail"></td>
				</tr>
				<tr>
					<th> Data Cadastro </th>
					<td><input id="data" type="text" name="txtData"></td>
                    <script language="text/javascript">
		            		$("#data").mask("99/99/9999");
		        	</script>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="btnEnviar" value="Cadastrar">
						<input type="reset" name="btnLimpar" value="Limpar"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
