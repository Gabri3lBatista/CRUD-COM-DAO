<?php
    require 'config.php';
    require 'DAO/UsuarioDAOMysql.php';

    $usuarioDAO = new UsuarioDaoMysql($pdo);

    $usuario = false;


    $id = filter_input(INPUT_GET, 'id'); //pega o ID do usuarios
    
    if($id){
        $usuario = $usuarioDAO->findById($id);
    }
    if($usuario === false){
        header('Location: index.php');
        exit;
    }

   
?>

<form method="POST" action= "editar_action.php">
    <input type="hidden" name="id" value="<?=  $usuario->getId(); ?>">
    <h1>Editar Usuário</h1>
    <label for="">
        Nome: </br>
        <input type="text" name="name" value="<?php echo $usuario->getName();?>">
    </label></br></br>
    <label for="">
        Email: </br>
        <input type="text" name="email" value="<?php echo $usuario->getEmail();?>">
    </label></br></br>

    <input type="submit" value="Salvar">
</form>