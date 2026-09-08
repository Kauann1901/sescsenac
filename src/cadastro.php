<?php

require_once __DIR__ . "/database/conexao.php";

$mensagem = "";
$tipoMensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if ($nome === "" || $email === "" || $senha === "") {

        $mensagem = "Preencha todos os campos.";
        $tipoMensagem = "erro";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $mensagem = "Digite um e-mail válido.";
        $tipoMensagem = "erro";

    } elseif (strlen($senha) < 6) {

        $mensagem = "A senha deve ter pelo menos 6 caracteres.";
        $tipoMensagem = "erro";

    } else {

        $verificar = $pdo->prepare("
            SELECT id
            FROM usuarios
            WHERE email = ?
            LIMIT 1
        ");

        $verificar->execute([$email]);

        if ($verificar->fetch()) {

            $mensagem = "Este e-mail já está cadastrado.";
            $tipoMensagem = "erro";

        } else {

            $senhaHash = password_hash(
                $senha,
                PASSWORD_DEFAULT
            );

            $stmt = $pdo->prepare("
                INSERT INTO usuarios
                (nome, email, senha, tipo)
                VALUES (?, ?, ?, 'usuario')
            ");

            $stmt->execute([
                $nome,
                $email,
                $senhaHash
            ]);

            $mensagem = "Cadastro realizado com sucesso!";
            $tipoMensagem = "sucesso";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Cadastro</title>

    <link rel="stylesheet" href="css/output.css">

</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white w-full max-w-md p-8 rounded-2xl shadow-xl">

    <h1 class="text-3xl font-bold text-blue-900 text-center mb-6">
        Criar conta
    </h1>

    <?php if ($mensagem): ?>

        <div class="mb-5 p-4 rounded-lg
            <?= $tipoMensagem === "sucesso"
                ? "bg-green-100 text-green-700"
                : "bg-red-100 text-red-700" ?>">

            <?= htmlspecialchars($mensagem) ?>

        </div>

    <?php endif; ?>


    <form method="POST">

        <label class="block font-semibold mb-2">
            Nome
        </label>

        <input
            type="text"
            name="nome"
            required
            class="w-full border rounded-lg px-4 py-3 mb-4"
        >


        <label class="block font-semibold mb-2">
            E-mail
        </label>

        <input
            type="email"
            name="email"
            required
            class="w-full border rounded-lg px-4 py-3 mb-4"
        >


        <label class="block font-semibold mb-2">
            Senha
        </label>

        <input
            type="password"
            name="senha"
            minlength="6"
            required
            class="w-full border rounded-lg px-4 py-3 mb-6"
        >


        <button
        href="login.php" type="submit" class="block text-center w-full bg-blue-900 text-white py-3 rounded-lg hover:bg-blue-800 transition  font-bold ">
            Criar conta
        </button>

    </form>


    <a
        href="login.php"
        class="block text-center text-blue-900 mt-5 hover:underline">

        ← Voltar

    </a>

</div>

</body>

</html>