<?php
 
use App\Core\Controller;
use App\Auth;

class Fornecedor extends Controller{

	public function buscarObrasDoEscritor($id = ''){

		Auth::checkLogin();

		$fornecedor = $this->model('FornecedorDao');
		$dados = $fornecedor->buscarObrasDoEscritor($id);

		$this->view('livros/ObrasDoEscritor', $dados = ['obras' => $dados]);

	}

	public function inativarLivro($id){

		$mensagem = array();

		  $livro = $this->model('Livro');
		  $livro->setAtivo('N');

		  $fornecedor = $this->model('FornecedorDao');

		  $livrosDao = $this->model('LivrosDao');
		  $mensagem[] = $livrosDao->inativarLivro($livro, $id);
		  $dados = $fornecedor->buscarObrasDoEscritor($_SESSION['userId']);


		$this->view('livros/ObrasDoEscritor', $dados = ['mensagem' => $mensagem, 'obras' => $dados]);
	}

	public function ativarLivro($id){

		$mensagem = array();

		  $livro = $this->model('Livro');
		  $livro->setAtivo('S');

		  $fornecedor = $this->model('FornecedorDao');

		  $livrosDao = $this->model('LivrosDao');
		  $mensagem[] = $livrosDao->ativarLivro($livro, $id);
		  $dados = $fornecedor->buscarObrasDoEscritor($_SESSION['userId']);


		$this->view('livros/ObrasDoEscritor', $dados = ['mensagem' => $mensagem, 'obras' => $dados]);
	}

}