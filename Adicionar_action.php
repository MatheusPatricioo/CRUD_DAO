<?php
require 'config.php'; // Inclui o arquivo de configuração

$name = filter_input(INPUT_POST, 'name'); // Obtém o nome enviado pelo formulário via POST
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); // Obtém o email enviado pelo formulário via POST e valida o formato


if($name && $email) {

    /* usar de preferencia esse metodo prepare, do PDO, pois ele 
     ja realiza diversos protocolos de segurança. 
     */
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email"); // Prepara a consulta SQL para verificar se o email já existe
    $sql->bindValue(':email', $email); // Vincula o valor do email à consulta
    $sql->execute(); // Executa a consulta
    

    //ele informa quantos registros vieram dessa consulta; 
    if ($sql->rowCount() ===0) {

        // Prepara a consulta SQL para inserir um novo usuário
        $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)"); 
        

    /*
bindValue() é um método fundamental para segurança em aplicações web.
Ele vincula um valor específico a um marcador de posição (:nome) em uma consulta SQL preparada.
Ao fazer isso, evita a injeção de SQL, uma vulnerabilidade que permite que hackers manipulem 
as suas consultas.
*/
$sql->bindValue(':name', $name); // Vincula o valor do nome à consulta
$sql->bindValue(':email', $email); // Vincula o valor do email à consulta
$sql->execute(); // Executa a consulta para inserir o usuário

header("Location: index.php"); // Redireciona para a página inicial após inserção
exit; // Encerra o script

} else { // Se o email já existir
    header("Location: adicionar.php"); // Redireciona para a página de adicionar usuário
    exit;
}
} else { // Se o formulário não foi enviado
    header("Location: adicionar.php"); // Redireciona para a página de adicionar usuário
    exit;
}
