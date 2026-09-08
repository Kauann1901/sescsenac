<?php

session_start();

if (
    !isset($_SESSION["usuario_id"]) ||
    $_SESSION["logado"] !== true
) {

    header("Location: ../login.php");
    exit;

}

require_once "../database/conexao.php";


$id = filter_input(
    INPUT_POST,
    "id",
    FILTER_VALIDATE_INT
);


if (!$id) {

    header("Location: comentarios.php");
    exit;

}


$stmt = $pdo->prepare("
    DELETE FROM depoimentos
    WHERE id = :id
");


$stmt->execute([
    ":id" => $id
]);


header("Location: comentarios.php");
exit;