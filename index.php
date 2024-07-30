
<?php
//CRUD: O INDEX SERVIRIA COMO O "R", DO CONCEITO CRUD.
//R:Read (ler)
require 'config.php';

$lista = [];
$sql = $pdo->query("SELECT *FROM usuarios");
//esse rowCount é pra saber se tem itens.
if($sql->rowCount() >0) {
    //essa linha pega o resultado da pesquisa SQL e transforma em um array associativo
    //dps disso, ele armazena esse vetor dentro do vetor lista. 
    $lista = $sql->fetchALL(PDO::FETCH_ASSOC); //o fetchALL pega todos os registros SQL e armazena em um array.
}
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
    /*
    '$lista': É o nome da variável que contém o array que será percorrido.
     Neste caso, estamos assumindo que $lista contém um array associativo, onde cada elemento representa um usuário.

    'as $usuario': A cada iteração do loop, o valor do elemento atual do array será atribuído à variável $usuario.
    Ou seja, em cada iteração, $usuario irá conter as informações de um usuário específico.
    */
    foreach($lista as $usuario): ?>
        <tr>
            <td> <?php echo $usuario['ID']; ?></td>
            <td> <?php echo $usuario['Nome']; ?></td>
            <td> <?php echo $usuario['email']; ?></td>
            <td>
                <a href="editar.php?ID=<?=$usuario['ID']; ?>"> [Editar] </a>
                <a href="excluir.php?ID=<?=$usuario['ID']; ?>" onclick="return confirm('Tem certeza da sua ação?')"> [Excluir] </a>
            </td>
        </tr>

    <?php endforeach ?>
</table>