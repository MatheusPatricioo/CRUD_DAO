<?php
// Inclui o arquivo de configuração do banco de dados
require 'config.php';

$info = [];
// Obtém o ID do usuário enviado pela URL
$id = filter_input(INPUT_GET, 'ID');

// Verifica se o ID foi enviado
if ($id) {
    // Prepara a consulta SQL para buscar o usuário pelo ID
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE ID = :ID");
    // Associa o valor do ID à consulta
    $sql->bindValue(':ID', $id);
    // Executa a consulta
    $sql->execute();

    // Verifica se o usuário foi encontrado
    if ($sql->rowCount() > 0) {
        
            $info =$sql->fetch( PDO::FETCH_ASSOC );
        
    } else {
        // Usuário não encontrado, redireciona para a página inicial
        header("location: index.php");
        exit;
    }
} else {
    // ID não enviado, redireciona para a página inicial
    header("location: index.php");
    exit;
}
?>

<h1>Editar Usuário</h1>

<form method="POST" action="Editar_action.php">
    <input type="hidden" name="ID" value="<?=$info['ID'];?>" />

    <label>
        Nome:<br/>
        <input type="text" name="name" value="<?=$info['Nome'];?>" />
    </label><br><br/>

    <label>
        Email:<br>
        <input type="email" name="email" value="<?=$info['email'];?>">
    </label><br><br>

    <input type="submit" value="Salvar">
</form>
