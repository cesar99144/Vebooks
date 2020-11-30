<?php

use App\Core\Controller;
use App\Auth;

class Home extends Controller{

	public function index($nome = ''){

		$livrosDao = $this->model('LivrosDao');
		$dados = $livrosDao->listarTodosLivros();
		$dadoos = $livrosDao->buscaCategorias();

		$this->view('home/index', $dados = ['registros' => $dados, 'categorias' => $dadoos]);

	}

	public function login(){

		$mensagem = array();

		if(isset($_POST['entrar'])):

			if((empty($_POST['email'])) or (empty($_POST['senha']))):
			   $mensagem[] = "O campo email e senha são obrigatórios";
			else:
			   $email = $_POST['email'];
			   $senha = $_POST['senha'];
			   //$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
			   $mensagem[] = Auth::Login($email, $senha);
			endif;
		endif;

		$this->view('home/login', $dados = ['mensagem' => $mensagem]);
	}

	public function logout(){

		Auth::logout();
	}

}