<?php

require_once __DIR__ . '/../conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$depoimento = trim($_POST['depoimento'] ?? '');

if ($nome === '' || $depoimento === '') {
    header("Location: index.php#comentarios");
    exit;
}

$stmt = $pdo->prepare("
    INSERT INTO depoimentos
    (nome, depoimento, status)
    VALUES (?, ?, 'pendente')
");

$stmt->execute([
    $nome,
    $depoimento
]);

header("Location: index.php#comentarios");
exit;