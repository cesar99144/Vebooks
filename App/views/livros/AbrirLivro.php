<link href="<?php echo URL_BASE; ?>css/adicionarLivro.css" rel="stylesheet">

<!--Abre um livro escolhido pelo usuário-->
<div class="container">
	<h1><?php echo $data['titulo']; ?></h1>
	<p><?php echo $data['descricao']; ?></p><br>
	<img id="preview-img" src="<?php echo URL_BASE; ?>/uploads/<?php echo $data['imagem']; ?>" alt="" /><br><br>

	<?php if(isset($_SESSION['logado']) AND $_SESSION['level'] == 2): ?>
		<!--Verifica se o usuário está logado e é cliente para poder liberar a opção de comprar ou por na lista de desejos-->
		<button>Comprar</button><button>Lista de desejos</button>
	<?php endif; ?>
</div>