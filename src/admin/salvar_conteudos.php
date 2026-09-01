<?php

session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

require_once "../database/conexao.php";

$titulo = trim($_POST['titulo'] ?? '');
$descricao = trim($_POST['descricao'] ?? '');

if ($titulo === '' || $descricao === '') {
    header("Location: conteudos.php");
    exit;
}


$nomeImagem = null;


if (
    isset($_FILES['imagem']) &&
    $_FILES['imagem']['error'] === UPLOAD_ERR_OK
) {

    $tiposPermitidos = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp'
    ];

    $tipo = $_FILES['imagem']['type'];

    if (!isset($tiposPermitidos[$tipo])) {
        die("Formato de imagem inválido.");
    }

    $nomeImagem = uniqid('conteudo_', true)
        . '.'
        . $tiposPermitidos[$tipo];

    move_uploaded_file(
        $_FILES['imagem']['tmp_name'],
        "../uploads/" . $nomeImagem
    );
}


$stmt = $pdo->prepare("
    INSERT INTO conteudos
    (titulo, descricao, imagem)
    VALUES (?, ?, ?)
");

$stmt->execute([
    $titulo,
    $descricao,
    $nomeImagem
]);


header("Location: conteudos.php");
exit;