<?php

require_once __DIR__ . "/../database/conexao.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../../index.php");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$depoimento = trim($_POST["depoimento"] ?? "");
$avaliacao = (int)($_POST["avaliacao"] ?? 0);

if ($nome === "" || $depoimento === "") {
    die("Preencha todos os campos.");
}

if ($avaliacao < 1 || $avaliacao > 5) {
    die("Avaliação inválida.");
}

$sql = "INSERT INTO depoimentos
        (nome, depoimento, avaliacao, status)
        VALUES
        (:nome, :depoimento, :avaliacao, 'pendente')";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":nome" => $nome,
    ":depoimento" => $depoimento,
    ":avaliacao" => $avaliacao
]);

header("Location: ../../index.php?comentario=enviado");
exit;