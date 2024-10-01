<?php
include 'db.php';

// Verifique se o parâmetro 'pk' está presente na URL
if (isset($_GET['id']) && !empty($_GET['pk'])) {
    $id = $_GET['id'];
} else {
    die("ID do usuário não foi fornecido.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql_usuario = "UPDATE usuario SET nome='$nome', email='$email' WHERE id = '$id'";

    if ($conn->query($sql_usuario) === true) {
        echo "<br/>" . "Registro editado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br/>" . $conn->error;
    }

    $conn->close();
    header("Location: read.php");
    exit();
}

$sql_usuario = "SELECT * FROM usuario WHERE pk='$pk'";
$result = $conn->query($sql_usuario);
$row = $result->fetch_assoc();
?>
