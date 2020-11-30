<?php

use App\Core\Model;

class Livro extends Model{

	public $titulo, $texto, $imagem, $preco, $autor, $categoria, $slug, $ativo, $inativo;
	public $idLivro, $idCliente, $id, $idAutor, $valor;
	

	public function getTitulo(){

		return $this->titulo;
	}

	public function setTitulo($t){

		$this->titulo = $t;
	}

	public function getTexto(){

		return $this->texto;
	}

	public function setTexto($t){

		$this->texto = $t;
	}

	public function getImagem(){

		return $this->imagem;
	}

	public function setImagem($i){

		$this->imagem = $i;
	}

	public function getPreco(){

		return $this->preco;
	}

	public function setPreco($p){

		$this->preco = $p;
	}

	public function getAutor(){

		return $this->autor;
	}

	public function setAutor($a){

		$this->autor = $a;
	}

	public function getCategoria(){

		return $this->categoria;
	}

	public function setCategoria($c){

		$this->categoria = $c;
	}

	public function getSlug(){

		return $this->slug;
	}

	public function setSlug($s){

		$this->slug = $s;
	}

	public function getAtivo(){

		return $this->ativo;
	}

	public function setAtivo($a){

		$this->ativo = $a;
	}

	//Getter e setters livros

	public function getIdLivro(){

		return $this->idLivro;
	}

	public function setIdLivro($il){

		$this->idLivro = $il;
	}

	public function getIdCliente(){

		return $this->idCliente;
	}

	public function setIdCliente($ic){

		$this->idCliente = $ic;
	}

	public function getId(){

		return $this->id;
	}

	public function setId($i){

		$this->id = $i;
	}

	public function getIdAutor(){

		return $this->idAutor;
	}

	public function setIdAutor($a){

		$this->idAutor = $a;
	}

	public function getValor(){

		return $this->valor;
	}

	public function setValor($v){

		$this->valor = $v;
	}


}