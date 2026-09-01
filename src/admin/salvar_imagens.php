<?php

session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

require_once "../conexao.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: imagens.php");
    exit;
}

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (!$id || !isset($_FILES['imagem'])) {
    header("Location: imagens.php");
    exit;
}


$arquivo = $_FILES['imagem'];

$tiposPermitidos = [
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/webp' => 'webp'
];

if (!isset($tiposPermitidos[$arquivo['type']])) {
    die("Formato de imagem não permitido.");
}


if ($arquivo['error'] !== UPLOAD_ERR_OK) {
    die("Erro ao enviar a imagem.");
}


$nomeArquivo = uniqid('banner_', true)
    . '.'
    . $tiposPermitidos[$arquivo['type']];


$caminho = "../img/" . $nomeArquivo;


if (!move_uploaded_file($arquivo['tmp_name'], $caminho)) {
    die("Não foi possível salvar a imagem.");
}


$stmt = $pdo->prepare("
    UPDATE imagens
    SET arquivo = ?
    WHERE id = ?
");

$stmt->execute([
    $nomeArquivo,
    $id
]);


header("Location: imagens.php");
exit;