<link href="<?php echo URL_BASE; ?>css/ListLivros.css" rel="stylesheet">

<div class="container">
  <h3>Todas as obras publicadas por <strong><?php echo $_SESSION['userNome']; ?></strong></h3>
</div><br><br>

<?php 
  
  if(!empty($data['mensagem'])):

    foreach($data['mensagem'] as $m):
        echo $m."<br>";
    endforeach;

  endif;

?>


<?php foreach ($data['obras'] as $note): ?>

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

                   <?php if(isset($_SESSION['logado']) AND $_SESSION['level'] == 3): ?>

                        <li><a href="/livros/atualizarLivro/<?php echo $note['id']; ?>"></i>Editar</a></li>

                        <?php if(isset($_SESSION['logado']) AND $note['ativo'] == 'S'): ?>

                          <li><a href="/fornecedor/inativarLivro/<?php echo $note['id']; ?>"><i class="fa fa-plus-square"></i>Inativar</a></li>

                        <?php else: ?>

                          <li><a href="/fornecedor/ativarLivro/<?php echo $note['id']; ?>"><i class="fa fa-plus-square"></i>Ativar</a></li>

                        <?php endif; ?>

                    <?php endif; ?>
                    
                  </ul>
                </div>
              </div>
            </div>

 <?php endforeach; ?>
          </div><!--features_items-->