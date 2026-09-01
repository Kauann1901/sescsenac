<?php

session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

require_once "../conexao.php";

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($id) {

    $stmt = $pdo->prepare("
        DELETE FROM conteudos
        WHERE id = ?
    ");

    $stmt->execute([$id]);
}

header("Location: conteudos.php");
exit;