<?php

require_once "conexao.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$comentario = trim($_POST['comentario'] ?? '');

if ($nome === '' || $comentario === '') {
    header("Location: index.php#comentarios");
    exit;
}

$stmt = $pdo->prepare("
    INSERT INTO comentarios
    (nome, comentario, status)
    VALUES (?, ?, 'pendente')
");

$stmt->execute([
    $nome,
    $comentario
]);

header("Location: index.php#comentarios");
exit;