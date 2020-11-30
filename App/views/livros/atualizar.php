<link href="<?php echo URL_BASE; ?>css/editarLivro.css" rel="stylesheet">

<?php 
  
  if(!empty($data['mensagem'])):

  	foreach($data['mensagem'] as $m):
  		echo $m."<br>";
  	endforeach;

  endif;

?>

<div class="container">
	<h3>Editar e-book</h3>
	<form action="/livros/atualizarLivro/<?php echo $data['registros']['id']; ?>" method="POST">
		
		<label>Titulo: </label><br>
		<input type="text" id="titulo" name="titulo" value="<?php echo $data['registros']['titulo']; ?>" name="titulo"><br>
		<label>Descrição: </label><br>
		<textarea class="texto" name="texto"><?php echo $data['registros']['descricao']; ?></textarea><br>
		<input type="submit" name="atualizar" id="atualizar" value="Atualizar" name="">
	</form>
</div>