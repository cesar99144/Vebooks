<link href="<?php echo URL_BASE; ?>css/adicionarLivro.css" rel="stylesheet">

<?php 
  
  if(!empty($data['mensagem'])):

  	foreach($data['mensagem'] as $m):
  		echo $m."<br>";
  	endforeach;

  endif;

?>

<!--Formulario para cadastro de e-books-->
<div style="display: flex;" class="principal">
	
	<div class="container">
		<form action="/livros/adicionar" method="POST" enctype="multipart/form-data">
		    <label for="input_text">Título notícia</label><br>
		    <input id="input_text" type="text" name="titulo" data-length="10" required><br>
		    <label for="textarea2">Texto</label><br>
		    <textarea id="textarea2" style="width: 400px;" name="texto" data-length="120"  required></textarea><br>
		    <span>Imagem</span><br>
		    <input type="file" name="foo" id="upload" onchange="previewImagem()" value="" required><br>
		    <label for="input_text">Preço do e-book</label><br>
		    <input type="number" name="preco"><br><br>
		    <select name="categoria">
		    	<option value="1">Direito</option>
		    	<option value="2">Gerais</option>
		    </select>
			
		    <button  name="cadastrar">Cadastrar livro</button>
		</form>
	</div>

	<div class="container">
		 <img id="preview-img"><br>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	
	//Para vizualizar a capa do e-book antes de publicar
	function previewImagem(){
				var imagem = document.querySelector('input[name=foo]').files[0];
				//var preview = document.querySelector('preview-img');
				var preview = document.getElementById('preview-img');
				
				var reader = new FileReader();
				
				reader.onloadend = function () {
					preview.src = reader.result;
				}
				
				if(imagem){
					reader.readAsDataURL(imagem);
				}else{
					preview.src = "";
				}
			}

</script>