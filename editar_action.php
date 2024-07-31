<?php
require 'config.php'; // Inclui o arquivo de configuração
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'ID');
$name = filter_input(INPUT_POST, 'name'); // Obtém o nome enviado pelo formulário via POST
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); // Obtém o email enviado pelo formulário via POST e valida o formato


if ($id && $name && $email) {
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);

    $usuarioDao->update($usuario);

    header("Location: index.php");
    exit;
} else {
    header("Location: editar.php?ID=" . $id);
    exit;
}
