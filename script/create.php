<?php
include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $descricao = $_POST['descricao'];
        $titulo = $_POST['titulo'];

        $sql_usuario = "INSERT INTO usuario (nome, email) VALUE ('$nome', '$email')";
        $conn -> query($sql_usuario);
        $usuario_id = $conn -> insert_id;

        $sql_nota = "INSERT INTO nota (descricao, titulo) VALUE ('$descricao', '$titulo')";
        $conn -> query($sql_nota);
        $nota_id = $conn -> insert_id;

        $sql_referencia = "INSERT INTO referencia (usuarios_id, notas_id) VALUE ('$usuario_id', '$nota_id')";

        if ($conn -> query($sql_referencia) === true) {
            echo "<br/>" . "Novo registro criado com sucesso!!!";
        } else {
            echo "Erro: " . $sql . "<br/>" . $conn -> error;
        } 
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <link rel="stylesheet" href="../visual/styles.css">
</head>
<body>
    <div>
        <h1>Adicionar Nota</h1>
        <form method="POST" action="create.php">
            <label for="nome">Nome do Usuário: </label>
            <input type="text" name="nome" required>
            <br>
            <label for="email">Email do Usuário: </label>
            <input type="email" name="email" required>
            <br>
            <label for="titulo">Título da Nota: </label>
            <input type="text" name="titulo" required>
            <br>
            <label for="descricao">Descrição da Nota: </label>
            <input type="text" name="descricao" required>
            <br>
            <button type="submit">Adicionar</button>
        </form>
    </div>
</body>
</html>
<br>
<a href="read.php">Ver Registros</a>