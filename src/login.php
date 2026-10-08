<?php

session_start();

require_once __DIR__ . "/database/conexao.php";

$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if ($email === "" || $senha === "") {

        $erro = "Preencha o e-mail e a senha.";

    } else {

        $sql = "
            SELECT id, nome, email, senha
            FROM usuarios
            WHERE email = :email
            LIMIT 1
        ";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ":email" => $email
        ]);

        $usuario = $stmt->fetch();

        if (!$usuario) {

            $erro = "E-mail ou senha incorretos.";

        } elseif (!password_verify($senha, $usuario["senha"])) {

            $erro = "E-mail ou senha incorretos.";

        } else {

            session_regenerate_id(true);

            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["nome"] = $usuario["nome"];
            $_SESSION["email"] = $usuario["email"];
            $_SESSION["logado"] = true;

            header("Location: admin/index.php");
            exit;
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
        content="width=device-width, initial-scale=1.0">

    <title>Login - SESC SENAC</title>

    <link
        rel="stylesheet"
        href="css/output.css">

</head>

<body class="min-h-screen bg-gray-100">


<header class="bg-blue-900 py-5 shadow-md">

    <h1 class="text-center text-2xl font-bold text-white">
        SESC SENAC
    </h1>

</header>


<main class="flex min-h-[calc(100vh-76px)] items-center justify-center px-4">

    <div class="w-full max-w-md rounded-2xl bg-white p-8 shadow-xl">


        <div class="mb-8 text-center">

            <div class="mb-4 text-5xl">
                👤
            </div>

            <h2 class="text-3xl font-bold text-blue-900">
                Bem-vindo!
            </h2>

            <p class="mt-2 text-gray-500">
                Entre na sua conta
            </p>

        </div>


        <?php if ($erro !== ""): ?>

            <div class="mb-5 rounded-lg border border-red-300 bg-red-50 p-4 text-center text-sm font-semibold text-red-700">

                <?= htmlspecialchars($erro) ?>

            </div>

        <?php endif; ?>


        <form
            action="login.php"
            method="POST"
            class="space-y-5">


            <div>

                <label
                    for="email"
                    class="mb-2 block text-sm font-semibold text-gray-700">

                    E-mail

                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"
                    placeholder="Digite seu e-mail"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20">

            </div>


            <div>

                <label
                    for="senha"
                    class="mb-2 block text-sm font-semibold text-gray-700">

                    Senha

                </label>

                <input
                    type="password"
                    id="senha"
                    name="senha"
                    required
                    placeholder="Digite sua senha"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-900 focus:ring-2 focus:ring-blue-900/20">

            </div>


            <button
                type="submit"
                class="w-full rounded-lg bg-blue-900 px-5 py-3 font-bold text-white transition hover:bg-blue-800">

                Entrar

            </button>


        </form>
        <div class="mt-5 text-center">

            <a
                href="index.php"
                class="text-sm text-gray-500 hover:text-blue-900">

                ← Voltar para o site

            </a>

        </div>


    </div>

</main>

</body>

</html>