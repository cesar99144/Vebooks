<?php
  namespace App;

  use App\Core\Model;

  class Auth{

     //Analisa o login
     public static function Login($email, $senha){

     	$sql = "SELECT * FROM usuarios WHERE email = ?";
     	$stmt = Model::getConn()->prepare($sql);
     	$stmt->bindValue(1, $email);
     	$stmt->execute();

     	if($stmt->rowCount() >= 1):
     	   
     	   $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

           if(password_verify($senha, $resultado['senha'])):

           	  $_SESSION['logado'] = true;
           	  $_SESSION['userId'] = $resultado['id'];
           	  $_SESSION['userNome'] = $resultado['nome'];
              $_SESSION['level'] = $resultado['perfil'];
              $id = $_SESSION['userId'];
              
           	  header('Location: /home/index');
           else:
           	  return "Senha invalida";
           endif;

     	else:
     	  return "Email não encontrado";
     	endif;

     }

     //Método para quando o usuário deslogar do sistema destruir todas as sessões ativas
     public static function Logout(){

        session_destroy();
        header('Location: /home/login');

     }

     //Impede que algumas páginas do software sejam acessadas sem o usuário está logado
     public static function checkLogin(){

        if(!isset($_SESSION['logado'])):

           header('Location: /home/login');
           die;

        endif;

     }

     //Verifica nível de permissão para algumas páginas para administrador
     public static function checkLoginAdmin(){

        if($_SESSION['level'] != 2):

           header('Location: /users/acesso');
           die;

        endif;

     }

     //Verifica o nível de permissão para algumas páginas de acesso apenas ao fornecedor
     public static function checkLoginFornecedor(){

        if($_SESSION['level'] != 3):

           header('Location: /home/login');
           die;

        endif;

     }

  }