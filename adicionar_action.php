<?php
require 'config.php'; // Inclui o arquivo de configuração
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql ($pdo);

$name = filter_input(INPUT_POST, 'name'); // Obtém o nome enviado pelo formulário via POST
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); // Obtém o email enviado pelo formulário via POST e valida o formato


if($name && $email) {

    if($usuarioDao = new UsuarioDaoMysql ($email) === false) {
        $novoUsuario = new Usuario();
        $novoUsuario->setNome($name);
        $novoUsuario->setEmail($email);

        $usuarioDao->add( $novoUsuario);

        header("Location: index.php");
        exit;
    } else { 
        header("Location: adicionar.php");
        exit;
    }

} else { 
    header("Location: adicionar.php"); 
    exit;
}
