<?php

use App\Core\Model;

class VendasDao extends Model{

	public function cadastrarVenda(Vendas $v){

	   $sql = "INSERT INTO vendas (idAutor, idLivro, Cliente, valor) VALUES (?, ?, ?, ?)";
	   $stmt = self::getConn()->prepare($sql);
	   $stmt->bindValue(1, $v->getAutorLivro());
	   $stmt->bindValue(2, $v->getIdLivroo());
	   $stmt->bindValue(3, $v->getIdClientee());
	   $stmt->bindValue(4, $v->getValoor());
	   if($stmt->execute()){

	   		echo "Sucesso";
	   }else{

	   	   echo "Erro";
	   }
	}

	public function listarVendas($autor){

		$sql = "SELECT livros.id, livros.titulo, livros.preco, vendas.idAutor, vendas.Cliente FROM vendas JOIN livros ON livros.id = vendas.idLivro WHERE vendas.idAutor = ? ";
		
		$stmt = self::getConn()->prepare($sql);
		$stmt->bindValue(1, $autor);
		$stmt->execute();

		if($stmt->rowCount() > 0):

            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $resultado;

        else:
            return [];

        endif;
	}

}