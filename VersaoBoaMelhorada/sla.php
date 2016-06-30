<div class="conteudo">
   <p class = "sla"><a href="form-add.php"> Adicionar Cliente</a></p>
   <h2>Lista de Clientes</h2>
   <table width="80%" border="1" class="tabela">
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
            <td><?php echo dateConvert($cliente['dataCadastro'])?></td>
            <td>
               <a href="form-edit.php?id=<?php echo $cliente[’nomeCliente’]?> ">Editar</a>
               <a href="delete.php?id=<?php echo $cliente[’nomeCliente’]?> "onclick=" return confirm(’Tem certeza que deseja excluir?’);">Excluir</a>
            </td>
         </tr>
         <?php endwhile;?>
      </tbody>
   </table>
</div>
