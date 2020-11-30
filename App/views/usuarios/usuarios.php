<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE; ?>css/ListUsuarios.css">

<?php 
  
  if(!empty($data['mensagem'])):

  	foreach($data['mensagem'] as $m):
  		echo $m."<br>";
  	endforeach;

  endif;

?>

<div class="container">
<table>
  <tr>
    <th>Nome</th>
    <th>Email</th>
    <th>Perfil</th>
  </tr>
  <?php foreach ($data as $user): ?>

	<tr>
	  <td><?php echo $user['nome']; ?></td>
	  <td><?php echo $user['email']; ?></td>
	  <td><?php echo $user['perfil']; ?></td>
  </tr>

  <?php endforeach; ?>
  
</table>
</div>