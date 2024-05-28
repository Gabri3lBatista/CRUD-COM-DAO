<?php

require 'config.php';
require 'DAO/UsuarioDAOMysql.php';

$usuarioDAO = new UsuarioDaoMysql($pdo);

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$id = filter_input(INPUT_POST, "id");
if ($name && $email && $id) {

    $usuario = $usuarioDAO->findById($id);
    $usuario->setName($name);
    $usuario->setEmail($email); 

    $usuarioDAO->update($usuario);

    header("Location: index.php");
    exit();
} else {
    header("Location: editar.php?id=".$id);
    exit();
}
