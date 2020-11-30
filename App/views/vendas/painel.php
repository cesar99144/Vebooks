<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE; ?>css/ListUsuarios.css">

<?php 
  
  if(!empty($data['mensagem'])):

    foreach($data['mensagem'] as $m):
      echo $m."<br>";
    endforeach;

  endif;

?>

<div class="container">
  <h4>Vendas realizadas por <strong><?php echo $_SESSION['userNome']; ?></strong></h4>
</div>

<div class="container">
<table>
  <tr>
    <th>Nome do livro</th>
    <th>Valor</th>
    <th>Cliente</th>
  </tr>

  <?php foreach ($data as $vendas): ?>

  <tr>
    <td><?php echo $vendas['titulo']; ?></td>
    <td><?php echo $vendas['preco']; ?></td>
    <td><?php echo $vendas['Cliente']; ?></td>
  </tr>

  <?php endforeach; ?>
</table>
</div>