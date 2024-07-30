<?php
// Inclui o arquivo de configuração do banco de dados
require 'config.php';


// Obtém o ID do usuário enviado pela URL
$id = filter_input(INPUT_GET, 'ID');

// Verifica se o ID foi enviado

if ($id) {
    //delete todos os usuarios que tem o ID = id que cliquei :)
    $sql = $pdo->prepare("DELETE  FROM usuarios WHERE ID= :ID");
    $sql->bindValue(':ID', $id);
    $sql->execute();


} 


// ID não enviado, redireciona para a página inicial
header("location: index.php");
exit;

?>