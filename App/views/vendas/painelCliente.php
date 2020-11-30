<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE; ?>css/ListUsuarios.css">

<?php 
  
  if(!empty($data['mensagem'])):

    foreach($data['mensagem'] as $m):
      echo $m."<br>";
    endforeach;

  endif;

?>

<div class="container">
  <h4>Compras realizadas por <strong><?php echo $_SESSION['userNome']; ?></strong></h4>
</div>

<div class="container">
<table>
  <tr>
    <th>Nome do livro</th>
    <th>Valor</th>
    <th>Gerar boleto</th>
  </tr>

  <?php foreach ($data as $vendas): ?>

  <tr>
    <td><?php echo $vendas['titulo']; ?></td>
    <td><?php echo $vendas['preco']; ?></td>
    <td><a target="_blank" href="/venda/gerarBoleto/<?php echo $vendas['preco']; ?>">Acessar</a></td>
  </tr>

  <?php endforeach; ?>
</table>
</div>