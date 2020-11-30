<?php

use App\Core\Model;

class Usuario extends Model{

 	public $nome, $senha, $email, $perfil;

 	public function getNome(){

 		return $this->nome;
 	}

 	public function SetNome($n){

 		 $this->nome = $n;
 	}

 	public function getSenha(){

 		return $this->senha;
 	}

 	public function SetSenha($s){

 		 $this->senha = $s;
 	}

 	public function getEmail(){

 		return $this->email;
 	}

 	public function SetEmail($e){

 		 $this->email = $e;
 	}
 	
 	public function getPerfil(){

 		return $this->perfil;
 	}

 	public function SetPerfil($p){

 		 $this->perfil = $p;
 	}
 	
} 	