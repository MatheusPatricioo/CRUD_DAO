<?php
require 'config.php'; // Inclui o arquivo de configuração
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$usuario = false;
// Obtém o ID do usuário enviado pela URL
$id = filter_input(INPUT_GET, 'ID');

// Verifica se o ID foi enviado
if ($id) {
    $usuario = $usuarioDao->findById($id);
}

if ($usuario === false) {
    header("location: index.php");
}
?>

<h1>Editar Usuário</h1>

<form method="POST" action="Editar_action.php">
    <input type="hidden" name="ID" value="<?= $usuario->getId(); ?>" />

    <label>
        Nome:<br />
        <input type="text" name="name" value="<?= $usuario->getNome(); ?>" />
    </label><br><br />

    <label>
        Email:<br>
        <input type="email" name="email" value="<?= $usuario->getEmail(); ?>">
    </label><br><br>

    <input type="submit" value="Salvar">
</form>