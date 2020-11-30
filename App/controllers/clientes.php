<?php
 
use App\Core\Controller;
use App\Auth;

class Clientes extends Controller{

	public function adicionarListaDesejos($id, $autor){

		$mensagem = array();

		$livro = $this->model('Livro');
		$livro->setIdLivro($id);
		$livro->setIdCliente($_SESSION['userId']);
		$livro->setIdAutor($autor);

		$clientes = $this->model('ClientesDao');
		$mensagem[] = $clientes->adicionarListaDesejos($livro);

		$this->view('livros/feedback', $dados = ['mensagem' => $mensagem]);
	}

	public function buscarlistaDesejosCliente($id = ''){

		Auth::checkLogin();

		$clientes = $this->model('ClientesDao');
		$dados = $clientes->buscarlistaDesejosDoCliente($id);

		$this->view('livros/ListaDesejos', $dados);
	}

	public function listarCompras(){

		Auth::checkLogin();

		$cliente = $this->model('ClientesDao');
		$dados = $cliente->listarComprasCliente($_SESSION['userNome']);

		$this->view('vendas/painelCliente', $dados);
	}

}