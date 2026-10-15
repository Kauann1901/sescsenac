
<?php
session_start();

if (
    !isset($_SESSION["usuario_id"]) ||
    ($_SESSION["logado"] ?? false) !== true
) {
    header("Location: ../login.php");
    exit;
}

require_once __DIR__ . "/../database/conexao.php";

function voltarComErro($mensagem) {
    header("Location: professores.php?erro=" . urlencode($mensagem));
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: professores.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

$nome = trim($_POST["nome"] ?? "");
$cargo = trim($_POST["cargo"] ?? "");
$formacao = trim($_POST["formacao"] ?? "");
$posGraduacao = trim($_POST["pos_graduacao"] ?? "");
$experiencia = trim($_POST["experiencia"] ?? "");
$ordem = filter_input(INPUT_POST, "ordem", FILTER_VALIDATE_INT);
$ativo = $_POST["ativo"] ?? "";

if (
    $nome === "" ||
    $cargo === "" ||
    $formacao === "" ||
    $experiencia === "" ||
    $ordem === false ||
    $ordem === null ||
    $ordem < 0 ||
    !in_array($ativo, ["0", "1"], true)
) {
    voltarComErro("Preencha corretamente todos os campos obrigatórios.");
}

if (
    mb_strlen($nome) > 150 ||
    mb_strlen($cargo) > 150 ||
    mb_strlen($formacao) > 255 ||
    mb_strlen($posGraduacao) > 255 ||
    mb_strlen($experiencia) > 255
) {
    voltarComErro("Um dos campos ultrapassou o limite de caracteres.");
}

$fotoAtual = "";

if ($id) {
    $stmt = $pdo->prepare(
        "SELECT foto FROM professores WHERE id = ?"
    );
    $stmt->execute([$id]);
    $existente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$existente) {
        voltarComErro("Professor não encontrado.");
    }

    $fotoAtual = $existente["foto"] ?? "";
}

$foto = $fotoAtual;
$arquivoNovo = null;
$caminhoAbsoluto = null;

if (
    isset($_FILES["foto"]) &&
    $_FILES["foto"]["error"] !== UPLOAD_ERR_NO_FILE
) {
    $upload = $_FILES["foto"];

    if ($upload["error"] !== UPLOAD_ERR_OK) {
        voltarComErro("Ocorreu um erro ao enviar a foto.");
    }

    if ($upload["size"] > 5 * 1024 * 1024) {
        voltarComErro("A foto deve ter no máximo 5 MB.");
    }

    $info = @getimagesize($upload["tmp_name"]);

    if ($info === false) {
        voltarComErro("O arquivo enviado não é uma imagem válida.");
    }

    $tiposPermitidos = [
        "image/jpeg" => "jpg",
        "image/png" => "png",
        "image/webp" => "webp"
    ];

    $tipo = $info["mime"] ?? "";

    if (!isset($tiposPermitidos[$tipo])) {
        voltarComErro("Use uma imagem JPG, PNG ou WEBP.");
    }

    $pasta = __DIR__ . "/../uploads/professores";

    if (!is_dir($pasta) && !mkdir($pasta, 0755, true)) {
        voltarComErro("Não foi possível criar a pasta das fotos.");
    }

    if (!is_writable($pasta)) {
        voltarComErro("A pasta das fotos não permite gravação.");
    }

    $arquivoNovo = bin2hex(random_bytes(16))
        . "."
        . $tiposPermitidos[$tipo];

    $caminhoAbsoluto = $pasta . "/" . $arquivoNovo;
    $foto = "uploads/professores/" . $arquivoNovo;
}

try {
    if ($arquivoNovo !== null) {
        if (!move_uploaded_file(
            $_FILES["foto"]["tmp_name"],
            $caminhoAbsoluto
        )) {
            voltarComErro("Não foi possível salvar a nova foto.");
        }
    }

    if ($id) {
        $sql = "UPDATE professores SET
                    nome = :nome,
                    cargo = :cargo,
                    formacao = :formacao,
                    pos_graduacao = :pos_graduacao,
                    experiencia = :experiencia,
                    foto = :foto,
                    ordem = :ordem,
                    ativo = :ativo
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":nome" => $nome,
            ":cargo" => $cargo,
            ":formacao" => $formacao,
            ":pos_graduacao" => $posGraduacao,
            ":experiencia" => $experiencia,
            ":foto" => $foto,
            ":ordem" => $ordem,
            ":ativo" => (int) $ativo,
            ":id" => $id
        ]);
    } else {
        $sql = "INSERT INTO professores
                    (nome, cargo, formacao, pos_graduacao,
                     experiencia, foto, ordem, ativo)
                VALUES
                    (:nome, :cargo, :formacao, :pos_graduacao,
                     :experiencia, :foto, :ordem, :ativo)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":nome" => $nome,
            ":cargo" => $cargo,
            ":formacao" => $formacao,
            ":pos_graduacao" => $posGraduacao,
            ":experiencia" => $experiencia,
            ":foto" => $foto,
            ":ordem" => $ordem,
            ":ativo" => (int) $ativo
        ]);
    }

    // Exclui a foto anterior somente depois de salvar a alteração.
    if (
        $arquivoNovo !== null &&
        $fotoAtual !== "" &&
        strpos($fotoAtual, "uploads/professores/") === 0
    ) {
        $fotoAntiga = __DIR__ . "/../" . $fotoAtual;

        if (is_file($fotoAntiga)) {
            unlink($fotoAntiga);
        }
    }

    header("Location: professores.php?sucesso=1");
    exit;

} catch (PDOException $e) {
    if ($caminhoAbsoluto !== null && is_file($caminhoAbsoluto)) {
        unlink($caminhoAbsoluto);
    }

    voltarComErro("Não foi possível salvar os dados. Verifique a tabela do banco.");
}
