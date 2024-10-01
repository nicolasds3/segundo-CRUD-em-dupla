<?php
include 'db.php';

$pk = $_GET['pk'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql_usuario = "UPDATE usuario SET nome='$nome', email='$email' WHERE pk = '$pk'";

    if ($conn->query($sql_usuario) === true) {
        echo "<br/>" . "Registro editado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br/>" . $conn->error;
    }

    $conn -> close();
    header("Location: read.php");
    exit();
}

$sql_usuario = "SELECT * FROM usuario WHERE pk='$pk'";
$result = $conn -> query($sql_usuario);
$row = $result -> fetch_assoc();
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
        <form method='POST' action="updateUser.php?pk=<?php echo $row['pk'];?>">
            <label for="upd_nome">Nome novo: </label>
            <input type="text" name="nome" id="nome" value="<?php echo $row['nome'];?>" required>
            <label for="upd_email">Email novo: </label>
            <input type="text" name="email" id="email" value="<?php echo $row['email'];?>" required>
            <button type="submit">Enviar</button>
        </form>
        <br>
        <a href="../script/read.php">Ver novos registros.</a>
    </div>
</body>
</html>