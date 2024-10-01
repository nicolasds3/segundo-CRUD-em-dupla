<?php

include 'db.php';

$usuarios = $conn->query("SELECT * FROM usuario");
$notas = $conn->query("SELECT * FROM nota");

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Leitura de Usuários e Notas</title>
</head>
<body>
    <h1>Usuários</h1>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $usuarios->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td>
                    <a href="updateUser.php?id=1">Editar</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>&type=usuario">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Notas</h1>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        <?php while ($row = $notas->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['descricao']; ?></td>
                <td>
                    <a href="update.php?id={$row['id]}">Editar</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>&type=nota">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php $conn->close(); ?>
</body>
</html>
<br>
<a href="create.php">Inserir novo registro.</a>