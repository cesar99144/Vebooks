<?php

use App\Core\Model;

class Vendas extends Model{

	public $idAutor, $idLivro, $idCliente, $valor;

	public function getAutorLivro(){

		return $this->idAutor;
	}

	public function setAutorLivro($a){

		$this->idAutor = $a;
	}

	public function getIdLivroo(){

		return $this->idLivro;
	}

	public function setIdLivroo($l){

		$this->idLivro = $l;
	}

	public function getIdClientee(){

		return $this->idCliente;
	}

	public function setIdClientee($c){

		$this->idCliente = $c;
	}

	public function getValoor(){

		return $this->valor;
	}

	public function setValoor($v){

		$this->valor = $v;
	}

}