<?php

use App\Core\Model;

class LivrosDao extends Model{

	public function listarTodosLivros(){

		  $query = "SELECT * FROM livros WHERE ativo = ?";
     	$stmt = self::getConn()->prepare($query);
      $stmt->bindValue(1, 'S');
     	$stmt->execute();

     	if($stmt->rowCount() > 0):

     		$resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

     		return $resultado;

     	else:
     		return [];

     	endif;
	}

     public function buscaCategorias(){

          $sql = "SELECT * FROM categorias";
          $stmt = self::getConn()->prepare($sql);
          $stmt->execute();

          if($stmt->rowCount() > 0):

               $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

               return $resultado;

          else:
               return [];

          endif;
     }

     public function adicionarLivro(Livro $l){

          $sql = "INSERT INTO livros (titulo, descricao, imagem, preco, autor, categoria, slug, ativo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
          $stmt = self::getConn()->prepare($sql);
          $stmt->bindValue(1, $l->getTitulo());
          $stmt->bindValue(2, $l->getTexto());
          $stmt->bindValue(3, $l->getImagem());
          $stmt->bindValue(4, $l->getPreco());
          $stmt->bindValue(5, $l->getAutor());
          $stmt->bindValue(6, $l->getCategoria());
          $stmt->bindValue(7, $l->getSlug());
          $stmt->bindValue(8, $l->getAtivo());

          if($stmt->execute()):

               return "Cadastrado com sucesso";

          else:
            
            //return "Erro ao cadastrar";
            print_r($stmt->errorInfo());

        endif;

     }

     public function AbrirLivro($slug){

          $sql = "SELECT * FROM livros WHERE slug = ?";
          $stmt = self::getConn()->prepare($sql);
          $stmt->bindValue(1, $slug);
          $stmt->execute();

          if($stmt->rowCount() > 0):

               $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

               return $resultado;

          else:
               return [];

          endif;
     }

     //Método para gerar slug do titulo do livro que será exibido na url
     function GeradorSlug($acentos){

       $acentos =  preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(ç)/","/(Ç)/"),explode(" ","a A e E i I o O u U n N c C"),$acentos);
       $caracteres = array(' & ', 'ª ', '  (', ') ', '(', ')', ' - ', ' / ', ' /', '/ ', '/', ' | ', ' |', '| ', ' | ', '|', '_', '.', ' ');
       return strtolower(str_replace($caracteres, '-', $acentos));
     }

     public function buscarLivroPesquisa($search){

          $sql = "SELECT * FROM livros WHERE titulo LIKE ? COLLATE utf8_general_ci";
          $stmt = self::getConn()->prepare($sql);
          $stmt->bindValue(1, "%{$search}%");
          $stmt->execute();

          if($stmt->rowCount() > 0):

               $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

               return $resultado;

          else:
               return [];

          endif;

     }

     public function findId($id){

          $sql = "SELECT * FROM livros WHERE id = ?";
          $stmt = self::getConn()->prepare($sql);
          $stmt->bindValue(1, $id);
          $stmt->execute();

          if($stmt->rowCount() > 0):

             $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

             return $resultado;

          else:

             return [];

          endif;

     }

     public function atualizarLivro(Livro $l, $id){

          $sql = "UPDATE livros SET titulo = ?, descricao = ? WHERE id = ?";
          $stmt = self::getConn()->prepare($sql);
          $stmt->bindValue(1, $l->getTitulo());
          $stmt->bindValue(2, $l->getTexto());
          $stmt->bindValue(3, $id);

          if($stmt->execute()):

               echo "Atualizado com sucesso";

          else:

               echo "Erro ao atualizar";
               
          endif;

     }

     public function inativarLivro(Livro $l, $id){

        $sql = "UPDATE livros SET ativo = ? WHERE id = ?";
        $stmt = self::getConn()->prepare($sql);
        $stmt->bindValue(1, $l->getAtivo());
        $stmt->bindValue(2, $id);

        if($stmt->execute()):

               echo "Livro inativado";

          else:

               echo "Erro ao inativar";
               
          endif;

     }

     public function ativarLivro(Livro $l, $id){

        $sql = "UPDATE livros SET ativo = ? WHERE id = ?";
        $stmt = self::getConn()->prepare($sql);
        $stmt->bindValue(1, $l->getAtivo());
        $stmt->bindValue(2, $id);

        if($stmt->execute()):

               echo "Livro ativado";

        else:

               echo "Erro ao inativado";
               
        endif;

     }

}