<?php

include 'db.php';

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = (int)$_GET['id'];
    $type = $_GET['type'];

    if ($type === 'usuario') {
        $conn->query("DELETE FROM referencia WHERE notas_id = $id");
        $conn->query("DELETE FROM usuario WHERE id = $id");
    } elseif ($type === 'nota') {
        $conn->query("DELETE FROM referencia WHERE notas_id = $id");
        $conn->query("DELETE FROM nota WHERE id = $id");
    }

    header('Location: read.php');
    exit();
} else {
    echo "ID ou tipo não especificado.";
}

?>