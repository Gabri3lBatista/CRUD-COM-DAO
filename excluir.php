<?php
      require 'config.php';
      require 'DAO/UsuarioDAOMysql.php';
  
      $usuarioDAO = new UsuarioDaoMysql($pdo);
  
    $id = filter_input(INPUT_GET, 'id'); //pega o ID do usuarios
    
    if($id){
        
       $usuarioDAO->delete($id);
        
    }
    header('Location: index.php');
    exit();
?>
