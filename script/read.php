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
        </tr>
        <?php while ($row = $usuarios->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['email']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Notas</h1>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descrição</th>
        </tr>
        <?php while ($row = $notas->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['descricao']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <?php $conn->close(); ?>
</body>
</html>
<br>
<a href="create.php">Inserir novo registro.</a>