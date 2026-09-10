<?php

session_start();

if (
    !isset($_SESSION["usuario_id"]) ||
    !isset($_SESSION["logado"]) ||
    $_SESSION["logado"] !== true
) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: imagens.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| IMAGEM ATUAL
|--------------------------------------------------------------------------
*/

$imagemAtual = $_POST["imagem_atual"] ?? "";

if ($imagemAtual === "") {
    header(
        "Location: imagens.php?erro=" .
        urlencode("Imagem atual não informada.")
    );
    exit;
}


/*
|--------------------------------------------------------------------------
| SEGURANÇA DO NOME
|--------------------------------------------------------------------------
*/

$imagemAtual = basename($imagemAtual);


/*
|--------------------------------------------------------------------------
| ARQUIVO ENVIADO
|--------------------------------------------------------------------------
*/

if (!isset($_FILES["nova_imagem"])) {
    header(
        "Location: imagens.php?erro=" .
        urlencode("Nenhum arquivo foi enviado.")
    );
    exit;
}

$arquivo = $_FILES["nova_imagem"];


/*
|--------------------------------------------------------------------------
| ERRO DO UPLOAD
|--------------------------------------------------------------------------
*/

if ($arquivo["error"] !== UPLOAD_ERR_OK) {

    switch ($arquivo["error"]) {

        case UPLOAD_ERR_INI_SIZE:
            $mensagem = "A imagem ultrapassa o tamanho permitido pelo PHP.";
            break;

        case UPLOAD_ERR_FORM_SIZE:
            $mensagem = "A imagem é muito grande.";
            break;

        case UPLOAD_ERR_PARTIAL:
            $mensagem = "O upload da imagem foi interrompido.";
            break;

        case UPLOAD_ERR_NO_FILE:
            $mensagem = "Nenhum arquivo foi selecionado.";
            break;

        default:
            $mensagem = "Ocorreu um erro durante o envio.";
            break;
    }

    header(
        "Location: imagens.php?erro=" .
        urlencode($mensagem)
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| TAMANHO MÁXIMO
|--------------------------------------------------------------------------
*/

$limite = 5 * 1024 * 1024;

if ($arquivo["size"] > $limite) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("A imagem deve ter no máximo 5 MB.")
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| FORMATOS PERMITIDOS
|--------------------------------------------------------------------------
*/

$extensoesPermitidas = [
    "jpg",
    "jpeg",
    "png",
    "gif",
    "webp"
];

$extensao = strtolower(
    pathinfo($arquivo["name"], PATHINFO_EXTENSION)
);

if (!in_array($extensao, $extensoesPermitidas, true)) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("Formato de imagem não permitido.")
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| VERIFICA SE É UMA IMAGEM
|--------------------------------------------------------------------------
*/

if (getimagesize($arquivo["tmp_name"]) === false) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("O arquivo selecionado não é uma imagem válida.")
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| PASTA src/img
|--------------------------------------------------------------------------
*/

$pasta = __DIR__ . "/../img";

if (!is_dir($pasta)) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("A pasta src/img não foi encontrada.")
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| PERMISSÃO DE GRAVAÇÃO
|--------------------------------------------------------------------------
*/

if (!is_writable($pasta)) {

    header(
        "Location: imagens.php?erro=" .
        urlencode("A pasta src/img não possui permissão para gravação.")
    );

    exit;
}


/*
|--------------------------------------------------------------------------
| DESTINO
|--------------------------------------------------------------------------
*/

$destino = $pasta . "/" . $imagemAtual;


/*
|--------------------------------------------------------------------------
| SUBSTITUI A IMAGEM
|--------------------------------------------------------------------------
*/

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


/*
|--------------------------------------------------------------------------
| FINAL
|--------------------------------------------------------------------------
*/

clearstatcache(true, $destino);

header("Location: imagens.php?sucesso=1");
exit;