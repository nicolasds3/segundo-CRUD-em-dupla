<?php
include 'db.php';

$id = $_GET['id'];

if (!isset($id) || empty($id)) {
    die("ID inválido ou não fornecido.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE usuario SET nome=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $nome, $email, $id);

    if ($stmt->execute()) {
        echo "<br/>Registro editado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: read.php");
    exit();
}

$stmt = $conn->prepare("SELECT * FROM usuario WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die("Usuário não encontrado.");
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update - Usuários</title>
    <link rel="stylesheet" href="../visual/styles.css">
</head>
<body>
    <div>
        <form method="POST" action="updateUser.php?id=<?php echo $row['id']; ?>">
            <label for="upd_nome">Nome novo: </label>
            <input type="text" name="nome" id="nome" value="<?php echo $row['nome']; ?>" required>
            <label for="upd_email">Email novo: </label>
            <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" required>
            <button type="submit">Enviar</button>
        </form>
        <br>
        <a href="../script/read.php">Ver novos registros.</a>
    </div>
</body>
</html>
