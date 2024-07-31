<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);


// Obtém o ID do usuário enviado pela URL
$id = filter_input(INPUT_GET, 'ID');

// Verifica se o ID foi enviado

if ($id) {
    $usuarioDao->delete($id);
}

header("location: index.php");
exit;
