<?php

session_start();


// =====================================================
// VERIFICAR LOGIN
// =====================================================

if (
    !isset($_SESSION["usuario_id"]) ||
    !isset($_SESSION["logado"]) ||
    $_SESSION["logado"] !== true
) {
    header("Location: ../login.php");
    exit;
}


// =====================================================
// VERIFICAR MÉTODO
// =====================================================

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: imagens.php");
    exit;
}


// =====================================================
// PEGAR IMAGEM ATUAL
// =====================================================

$imagemAtual = $_POST["imagem_atual"] ?? "";

if ($imagemAtual === "") {

    header(
        "Location: imagens.php?erro=" .
        urlencode("Imagem atual não informada.")
    );

    exit;
}


// Segurança
$imagemAtual = basename($imagemAtual);


// =====================================================
// VERIFICAR ARQUIVO
// =====================================================

if (
    !isset($_FILES["nova_imagem"]) ||
    !is_array($_FILES["nova_imagem"])
) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("Nenhum arquivo foi enviado.")
    );

    exit;
}


$arquivo = $_FILES["nova_imagem"];


// =====================================================
// VERIFICAR ERRO DO UPLOAD
// =====================================================

if ($arquivo["error"] !== UPLOAD_ERR_OK) {

    switch ($arquivo["error"]) {

        case UPLOAD_ERR_INI_SIZE:
            $erro = "O arquivo ultrapassa o limite permitido pelo PHP.";
            break;

        case UPLOAD_ERR_FORM_SIZE:
            $erro = "O arquivo é muito grande.";
            break;

        case UPLOAD_ERR_PARTIAL:
            $erro = "O upload foi enviado apenas parcialmente.";
            break;

        case UPLOAD_ERR_NO_FILE:
            $erro = "Nenhum arquivo foi selecionado.";
            break;

        default:
            $erro = "Erro desconhecido durante o upload.";
            break;
    }

    header(
        "Location: imagens.php?erro=" .
        urlencode($erro)
    );

    exit;
}


// =====================================================
// VERIFICAR TAMANHO
// =====================================================

if ($arquivo["size"] > 5 * 1024 * 1024) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("A imagem deve ter no máximo 5 MB.")
    );

    exit;
}


// =====================================================
// VERIFICAR SE É IMAGEM
// =====================================================

$informacoes = getimagesize($arquivo["tmp_name"]);

if ($informacoes === false) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("O arquivo selecionado não é uma imagem.")
    );

    exit;
}


// =====================================================
// TIPOS PERMITIDOS
// =====================================================

$tiposPermitidos = [
    "image/jpeg",
    "image/png",
    "image/gif",
    "image/webp"
];


if (!in_array($informacoes["mime"], $tiposPermitidos, true)) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("Tipo de imagem não permitido.")
    );

    exit;
}


// =====================================================
// PASTA DAS IMAGENS
// =====================================================

$pasta = __DIR__ . "/../img";


if (!is_dir($pasta)) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("A pasta src/img não existe.")
    );

    exit;
}


// =====================================================
// VERIFICAR PERMISSÃO DA PASTA
// =====================================================

if (!is_writable($pasta)) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("A pasta src/img não possui permissão para gravação.")
    );

    exit;
}


// =====================================================
// DESTINO
// =====================================================

$destino = $pasta . "/" . $imagemAtual;


// =====================================================
// SALVAR NOVA IMAGEM
// =====================================================

if (!move_uploaded_file(
    $arquivo["tmp_name"],
    $destino
)) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("O PHP não conseguiu substituir a imagem.")
    );

    exit;
}


// =====================================================
// LIMPAR CACHE DO PHP
// =====================================================

clearstatcache(true, $destino);


// =====================================================
// VOLTAR
// =====================================================

header("Location: imagens.php?sucesso=1");

exit;