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
	</head>
	<body>
	  <div class="conteudo">		
		<p><a href="form-add.php"> Adicionar Cliente</a></p>
		<h2>Lista de Clientes</h2>
		<!--<p>Total de usuários: <?php echo $total ?></p>
		<?php if($total> 0):?> -->
		<table width="100%" border="1" class="tabela">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Data do Cadastro</th>
				</tr>
			</thead>
 			<tbody>
 				<?php while($cliente = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
 					<tr>
 						<td><?php echo $cliente['nomeCliente'] ?></td>
						<td><?php echo $cliente['email'] ?></td>
						<td><?php echo $cliente['dataCadastro'] ?></td>
						<td>
							<a href="form-edit.php?id=<?php echo $cliente[’nomeCliente’]?> ">Editar</a>
							<a href="delete.php?id=<?php echo $cliente[’nomeCliente’]?> "onclick=" return confirm(’Tem certeza que deseja excluir?’);">Excluir</a>
						</td>
					</tr>
				<?php endwhile;?>
			</tbody>
		</table>
		<?php else: ?>
			<p>Nenhum usuário registrado</p>
		<?php endif; ?>
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
	  </div>
	</body>
</html>
