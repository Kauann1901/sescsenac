
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

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: professores.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: professores.php");
    exit;
}

$stmt = $pdo->prepare("SELECT foto FROM professores WHERE id = ?");
$stmt->execute([$id]);
$professor = $stmt->fetch(PDO::FETCH_ASSOC);

if ($professor) {
    $stmt = $pdo->prepare("DELETE FROM professores WHERE id = ?");
    $stmt->execute([$id]);

    if (!empty($professor["foto"])) {
        $pastaFotos = realpath(__DIR__ . "/../uploads/professores");
        $arquivoFoto = realpath(__DIR__ . "/../../" . $professor["foto"]);

        if (
            $pastaFotos &&
            $arquivoFoto &&
            dirname($arquivoFoto) === $pastaFotos &&
            is_file($arquivoFoto)
        ) {
            unlink($arquivoFoto);
        }
    }
}

header("Location: professores.php");
exit;
