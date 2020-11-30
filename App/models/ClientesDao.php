<?php

 use App\Core\Model;

 class ClientesDao extends Model{

  //Adicionar livro na lista de desejos do cliente
 	public function adicionarListaDesejos(Livro $l){

         $query = "INSERT INTO listadedesejos (idLivro, idCliente, idAutor) VALUES (?, ?, ?)";

         $stmt = self::getConn()->prepare($query);
         $stmt->bindValue(1, $l->getIdLivro());
         $stmt->bindValue(2, $l->getIdCliente());
         $stmt->bindValue(3, $l->getIdAutor());

         if($stmt->execute()):

             return "Adicionado a sua lista de desejo com sucesso";

         else:
            
            return "Erro ao cadastrar";
     
     	 endif;

    }

    public function buscarlistaDesejosDoCliente($id){

          $sql = "SELECT livros.id, livros.titulo, livros.descricao, livros.imagem, livros.preco, listadedesejos.idCliente, listadedesejos.idAutor
               FROM listadedesejos JOIN livros
               ON livros.id = listadedesejos.idLivro
               WHERE listadedesejos.idCliente = ?";
               
          $stmt = self::getConn()->prepare($sql);
          $stmt->bindValue(1, $id);
          $stmt->execute();

          if($stmt->rowCount() > 0):

               $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

               return $resultado;

          else:
               return [];

          endif;
     }

    public function listarComprasCliente($cliente){

        $sql = "SELECT livros.id, livros.titulo, livros.preco, vendas.idAutor, vendas.Cliente FROM vendas JOIN livros ON livros.id = vendas.idLivro WHERE vendas.Cliente LIKE ? COLLATE utf8_general_ci";

        $stmt = self::getConn()->prepare($sql);
        $stmt->bindValue(1, "%{$cliente}%");
        $stmt->execute();

        if($stmt->rowCount() > 0):

          $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

          return $resultado;

        else:

            return [];

        endif;
    }

 }