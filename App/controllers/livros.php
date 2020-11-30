<?php

use App\Core\Controller;
use App\Auth;

class Livros extends Controller{

	public function adicionar(){

		Auth::checkLogin();

		$mensagem = array();

		if(isset($_POST['cadastrar'])):

			if(empty($_POST['titulo'])):

				$mensagem[] = "O campo título não pode ser em branco";

			elseif(empty($_POST['texto'])):

				$mensagem[] = "O campo texto não pode ser em branco";

			else:

				//Upload arquivos
					$storage = new \Upload\Storage\FileSystem('uploads');
					$file = new \Upload\File('foo', $storage);

					// Optionally you can rename the file on upload
					$new_filename = uniqid();
					$file->setName($new_filename);

					// Validate file upload
					// MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
					$file->addValidations(array(
					    // Ensure file is of type "image/png"
					    new \Upload\Validation\Mimetype('image/png'),

					    //You can also add multi mimetype validation
					    //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))

					    // Ensure file is no larger than 5M (use "B", "K", M", or "G")
					    new \Upload\Validation\Size('5M')
					));

					// Access data about the file that has been uploaded
					$data = array(
					    'name'       => $file->getNameWithExtension(),
					    'extension'  => $file->getExtension(),
					    'mime'       => $file->getMimetype(),
					    'size'       => $file->getSize(),
					    'md5'        => $file->getMd5(),
					    'dimensions' => $file->getDimensions()
					);

					// Try to upload file
					try {
					    // Success!
					    $file->upload();
					    $mensagem[] = "Upload feito com sucesso";

					    //Após salvar a imagem os dados são armazenados


					    $livrosDao = $this->model('LivrosDao');

					    $slug = $livrosDao->GeradorSlug($_POST['titulo']);

					    $livro = $this->model('Livro');
						$livro->setTitulo($_POST['titulo']);
						$livro->setTexto($_POST['texto']);
						$livro->setImagem($data['name']);
						$livro->setPreco($_POST['preco']);
						$livro->setAutor($_SESSION['userId']);
						$livro->setCategoria($_POST['categoria']);
						$livro->setAtivo('S');
						$livro->setSlug($slug); 

		           		$mensagem[] = $livrosDao->adicionarLivro($livro);

					} catch (\Exception $e) {
					    // Fail!
					    $errors = $file->getErrors();
					    $mensagem[] = implode("<br>", $errors);
					}

			endif;

		endif;

		$this->view('livros/adicionar', $dados = ['mensagem' => $mensagem]);
	}

	public function exibirLivro($id = ''){

		$livrosDao = $this->model('LivrosDao');
		$dados = $livrosDao->AbrirLivro($id);

		$this->view('livros/abrirLivro', $dados);
	}


     public function vendas(){

     	Auth::checkLogin();
     	Auth::checkLoginFornecedor();

     	$this->view('vendas/painel');

     }

     public function buscar(){

		$busca = isset($_POST['search']) ? $_POST['search'] : $_SESSION['search'];
		$_SESSION['search'] = $busca;

		$livrosDao = $this->model('LivrosDao');
		$dados = $livrosDao->buscarLivroPesquisa($busca);
		$dadoos = $livrosDao->buscaCategorias ();

		$this->view('home/index', $dados = ['registros' => $dados, 'categorias' => $dadoos]);
	}

	public function atualizarLivro($id){

		$mensagem = array();

		if(isset($_POST['atualizar'])):

		  $livro = $this->model('Livro');
		  $livro->setTitulo($_POST['titulo']);
		  $livro->setTexto($_POST['texto']);

		  $livrosDao = $this->model('LivrosDao');
		  $mensagem[] = $livrosDao->atualizarLivro($livro, $id);

		endif;

		$livrosDao = $this->model('LivrosDao');

		$dados = $livrosDao->findId($id);

        $this->view('livros/atualizar', $dados = ['mensagem' => $mensagem, 'registros' => $dados]);
	}


}