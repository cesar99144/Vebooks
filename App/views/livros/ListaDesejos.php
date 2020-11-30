<link href="<?php echo URL_BASE; ?>css/ListLivros.css" rel="stylesheet">

<?php 
  
  if(!empty($data['mensagem'])):

  	foreach($data['mensagem'] as $m):
  		echo $m."<br>";
  	endforeach;

  endif;

?>

<div class="container">
  <h3>Lista de desejos cliente <strong><?php echo $_SESSION['userNome']; ?></strong></h3>
</div>
<br><br>


<?php foreach ($data as $note): ?>

<div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                      <img class="exibeImg" src="<?php echo URL_BASE; ?>/uploads/<?php echo $note['imagem']; ?>" alt="" />
                      <h2>$<?php echo $note['preco']; ?></h2>
                      <p><a href="/livros/abrirLivro/<?php echo $note['id']; ?>"><?php echo $note['titulo']; ?></a></p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver mais</a>
                    </div>
                    <div class="product-overlay">
                      <div class="overlay-content">
                        <p><?php echo $note['descricao']; ?></p>
                        <h2>$<?php echo $note['preco']; ?></h2>
                        <p><a href="/livros/abrirLivro/<?php echo $note['id']; ?>"><?php echo $note['titulo']; ?></a></p>
                        <a href="/livros/abrirLivro/<?php echo $note['id']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver mais</a>
                      </div>
                    </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">

                   <?php if(isset($_SESSION['logado']) AND $_SESSION['level'] == 2): ?>
                        <!-- <li><a target="_blank" href="/venda/gerarBoleto/<?php echo $note['preco']; ?>"></i>Comprar</a></li> -->
                        <li><a target="_blank" href="/venda/FinalizarCompra/<?php echo $note['preco']; ?>/<?php echo $note['idAutor']; ?>/<?php echo $note['id']; ?>"></i>Comprar</a></li>
                        <!-- <li><a href="/notes/editar/<?php echo $note['id']; ?>"></i>Remover</a></li> -->
                    <?php endif; ?>
                    
                  </ul>
                </div>
              </div>
            </div>

 <?php endforeach; ?>
          </div><!--features_items-->