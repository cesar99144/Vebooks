<?php
 
use App\Core\Controller;
//use App\Auth;

class Usuarios extends Controller{

 	public function cadastrarUsuario(){

 	   $mensagem = array();

 	    if(isset($_POST['cadastrar'])):

 		   $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

 		   $usuario = $this->model('Usuario');
 		   $usuario->SetNome($_POST['nome']);
 		   $usuario->SetSenha($senha);
 		   $usuario->SetEmail($_POST['email']);
 		   $usuario->SetPerfil($_POST['tipo']);

 		   $usuarioDao = $this->model('UsuarioDao');
 		   $mensagem[] = $usuarioDao->cadastrarUsuario($usuario);

 		endif;

 		$this->view('home/login', $dados = ['mensagem' => $mensagem]);
 	}

 	public function listarUsuarios(){

 	
 		$usuario = $this->model('UsuarioDao');
 		$dados = $usuario->listarTodosUsuarios();

 		$this->view('usuarios/usuarios', $dados);

 	}

}