<?php

session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

require_once "../conexao.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

    if ($id) {

        $stmt = $pdo->prepare("
            UPDATE comentarios
            SET status = 'aprovado'
            WHERE id = ?
        ");

        $stmt->execute([$id]);
    }
}

header("Location: comentarios.php");
exit;