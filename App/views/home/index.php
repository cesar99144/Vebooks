<link href="<?php echo URL_BASE; ?>css/ListLivros.css" rel="stylesheet">

<?php 
//Carrega e define a quantidade livros que serão exibidos por página
 $pagination = new App\Pagination($data['registros'], isset($_GET['page'])? $_GET['page'] : 1, 10);
?>

</div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Categorias</h2><!-- Exibe as categorias de livros-->
                            <div class="panel-group category-products" id="accordian">
                                <?php foreach ($data['categorias'] as $note): ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordian" href="/notes/ver/<?php echo $note['idCategoria']; ?>">
                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                    <?php echo $note['nome']; ?>
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                         
                        </div><!--/Categorias-->

                    </div>
                </div>

<div class="col-sm-9 padding-right">
          <div class="features_items"><!--Listagem dos e-books-->
            <h2 class="title text-center">E-books</h2>


<?php 
  if(!empty($data['mensagem'])):

    foreach($data['mensagem'] as $m):
        echo $m."<br>";
    endforeach;

  endif;

?>

<div id="mensagem">
<?php

    //Mensagem de retorno caso não haja nenhum livro
    if(empty($pagination->resultado())):

      echo "<label id='textoMensagem'>Nenhum livro encontrado</label>";

    endif;

?>
</div>
      <!-- Inícia o loop de carregamentos dos e-books com base na paginação definida-->
      <?php foreach ($pagination->resultado() as $note): ?>

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
                        <h5><?php echo $note['descricao']; ?></h5>
                        <h2>$<?php echo $note['preco']; ?></h2>
                        <p><a href="/livros/exibirLivro/<?php echo $note['slug']; ?>"><?php echo $note['titulo']; ?></a></p>
                        <a href="/livros/exibirLivro/<?php echo $note['slug']; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Ver mais</a>
                      </div>
                    </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">

                    <?php if(isset($_SESSION['logado']) AND $_SESSION['level'] == 2): ?>
                       <!-- Exibe as opções com base no nível do usuário que está logado -->
                        <li><a target="_blank" href="/venda/FinalizarCompra/<?php echo $note['preco']; ?>/<?php echo $note['autor']; ?>/<?php echo $note['id']; ?>"></i>Comprar</a></li>
                        <li><a href="/clientes/adicionarListaDesejos/<?php echo $note['id']; ?>/<?php echo $note['autor'] ?>"><i class="fa fa-plus-square"></i>Lista de desejo</a></li>

                    <?php endif; ?>
                    
                  </ul>
                </div>
              </div>
            </div>

      <?php endforeach; ?>

          </div><!-- /Listagem dos e-books-->

          <?php
            //Exibe as quantidades de páginas

             $pagination->navigator();

          ?>
        </div>
      </div>
    </div>
  </section>