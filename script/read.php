<?php 

include 'db.php';

function getUsuarios($pdo){
    $stmt = $pdo->query("SELECT * FROM usuario");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getNotas($pdo) {
    $stmt = $pdo->query("SELECT * FROM nota");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$usuarios = getUsuarios($pdo);
$notas = getNotas($pdo);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Leitura</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Usuários</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['nome']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Notas</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($notas as $nota): ?>
                <tr>
                    <td><?php echo htmlspecialchars($nota['id']); ?></td>
                    <td><?php echo htmlspecialchars($nota['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($nota['descricao']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
