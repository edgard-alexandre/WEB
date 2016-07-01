<?php
    require_once 'init.php';
    // abre a conexão
    $PDO = db_connect();
     /* SQL para contar o total de registros */
    $sql_count = "SELECT COUNT(*) AS total FROM clientes ORDER BY nomeCliente ASC";
    // SQL para selecionar os registros
    $sql = "SELECT idCliente, nomeCliente, email, dataCadastro FROM clientes ORDER BY nomeCliente ASC";
    // conta o total de registros
    $stmt_count = $PDO->prepare($sql_count);
    $stmt_count->execute();
    $total = $stmt_count->fetchColumn();
    // seleciona os registros
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>  

<div class="conteudo">  
   <p class = "sla"><a href="form-add.php"> Adicionar Cliente</a></p>
   <h2 class = "ldC">Lista de Clientes</h2>
	<h2 class = "ldC2">Lista de Clientes</h2>
<br><br><br><br><br><br><br>
	<p>Total de usuários: <?php echo $total ?></p>
        <?php if($total > 0): ?>

   <table width="80%" border="1" class="tabela">
      <thead>
         <tr>
            <th class="n">Nome</th>
            <th class="n">Email</th>
            <th class="n">Data do Cadastro</th>
         </tr>
      </thead>
      <tbody>
        <?php while($cliente = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
		<tr>
            <td><?php echo $cliente['nomeCliente'] ?></td>
            <td><?php echo $cliente['email'] ?></td>
            <td><?php echo dateConvert($cliente['dataCadastro']) ?></td>
            <td>
               <a href="form-edit.php?id=<?php echo $cliente[’nomeCliente’]?> ">Editar</a>
               <a href="delete.php?id=<?php echo $cliente[’nomeCliente’]?> "onclick=" return confirm(’Tem certeza que deseja excluir?’);">Excluir</a>
            </td>
         </tr>
         <?php endwhile; ?>
      </tbody>
   </table>
<?php else: ?>
        <p> Nenhum usuário registrado</p>
        <?php endif; ?>
</div>
