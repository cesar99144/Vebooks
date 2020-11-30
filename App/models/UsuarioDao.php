<?php

 use App\Core\Model;

 class UsuarioDao extends Model{

 	public $nome, $email, $senha;

 	public function cadastrarUsuario(Usuario $u){

     	$sql = "INSERT INTO usuarios (nome, senha, email, perfil) VALUES (?, ?, ?, ?)";
     	$stmt = self::getConn()->prepare($sql);
     	$stmt->bindValue(1, $u->getNome());
        $stmt->bindValue(2, $u->getSenha());
        $stmt->bindValue(3, $u->getEmail());
        $stmt->bindValue(4, $u->getPerfil());

     	if($stmt->execute()):

     		return "Cadastrado com sucesso";

     	else:
            
            return "Erro ao cadastrar";

        endif;

     }

    public function listarTodosUsuarios(){

        $sql = "SELECT * FROM usuarios";

        $stmt = self::getConn()->prepare($sql);

        $stmt->execute();

        if($stmt->rowCount() > 0):

            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            return $resultado;

        else:
            return [];

        endif;
    }


 }