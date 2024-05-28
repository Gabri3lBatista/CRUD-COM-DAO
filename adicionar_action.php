<?php

require 'config.php';
require 'DAO/UsuarioDAOMysql.php';
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

$usuarioDao = new UsuarioDaoMysql($pdo);

if ($name && $email) {

    if($usuarioDao->findByEmail($email) === false){
        $newUsuario = new Usuario;
        $newUsuario->setName($name);
        $newUsuario->setEmail($email);

        $usuarioDao->add($newUsuario);
        header('Location: index.php');
        exit;
    }else{
        header('Location: index.php');
        exit;
    }
}else{
    header('Location: index.php');
    exit;
}
