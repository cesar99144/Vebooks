<?php

 use App\Core\Model;

 class FornecedorDao extends Model{

 	public function buscarObrasDoEscritor($id){

          $sql = "SELECT * FROM livros WHERE autor = ?";
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

 }