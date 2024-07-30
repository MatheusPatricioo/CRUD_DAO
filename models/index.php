
<?php

require 'config.php';
require 'dao/usuarioDaoMysql.php';


$usuarioDao = new UsuarioDaoMysql($pdo);
$lista = $usuarioDao->findALL();
?>

<a href="adicionar.php">ADICIONAR USUARIO</a>

<table border ="1" width="100%">
    <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>AÇÕES</th>
    </tr>
    
    <?php

    foreach($lista as $usuario): ?>
        <tr>
            <td> <?php echo $usuario->getId(); ?></td>
            <td> <?php echo $usuario->getNome(); ?></td>
            <td> <?php echo $usuario->getEmail(); ?></td>
            <td>
                <a href="editar.php?ID=<?=$usuario->getId(); ?>"> [Editar] </a>
                <a href="excluir.php?ID=<?=$usuario->getId(); ?>" onclick="return confirm('Tem certeza da sua ação?')"> [Excluir] </a>
            </td>
        </tr>

    <?php endforeach ?>
</table>