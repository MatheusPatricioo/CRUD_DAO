<?php
require 'config.php'; // Inclui o arquivo de configuração

 $id = filter_input(INPUT_POST, 'ID');
$name = filter_input(INPUT_POST, 'name'); // Obtém o nome enviado pelo formulário via POST
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); // Obtém o email enviado pelo formulário via POST e valida o formato


if($id && $name && $email) {

    // CARY DE ATUALIZAÇÃO: UPDATE USUARIO SET NAME = 'MATHEUS, EMAIL = '...@... ' WHERE ID = 2...
    $sql = $pdo->prepare("UPDATE usuarios SET nome = :name, email= :email WHERE ID = :ID");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':ID', $id);
    $sql->execute();

    header("Location: index.php");
    exit;

} else { 
    header("Location: adicionar.php"); // Redireciona para a página de adicionar usuário
    exit;
}

