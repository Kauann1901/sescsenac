<?php

session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

require_once "../conexao.php";

$totalComentarios = $pdo
    ->query("SELECT COUNT(*) FROM comentarios WHERE status = 'pendente'")
    ->fetchColumn();

$totalConteudos = $pdo
    ->query("SELECT COUNT(*) FROM conteudos")
    ->fetchColumn();

$totalImagens = $pdo
    ->query("SELECT COUNT(*) FROM imagens")
    ->fetchColumn();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel Administrativo</title>

    <link rel="stylesheet" href="../output.css">
</head>

<body class="bg-gray-100 min-h-screen">

    <header class="bg-blue-900 text-white p-5">

        <div class="max-w-7xl mx-auto flex justify-between items-center">

            <h1 class="text-2xl font-bold">
                Painel Administrativo
            </h1>

            <a
                href="logout.php"
                class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg">
                Sair
            </a>

        </div>

    </header>


    <main class="max-w-7xl mx-auto p-6">

        <h2 class="text-3xl font-bold text-blue-900 mb-8">
            Administração do site
        </h2>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


            <a
                href="comentarios.php"
                class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                <h3 class="text-xl font-bold mb-3">
                    💬 Comentários
                </h3>

                <p class="text-gray-600">
                    Comentários pendentes:
                </p>

                <p class="text-4xl font-bold text-blue-900 mt-2">
                    <?= $totalComentarios ?>
                </p>

            </a>


            <a
                href="imagens.php"
                class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                <h3 class="text-xl font-bold mb-3">
                    🖼️ Imagens
                </h3>

                <p class="text-gray-600">
                    Imagens cadastradas:
                </p>

                <p class="text-4xl font-bold text-blue-900 mt-2">
                    <?= $totalImagens ?>
                </p>

            </a>


            <a
                href="conteudos.php"
                class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">

                <h3 class="text-xl font-bold mb-3">
                    📝 Conteúdos
                </h3>

                <p class="text-gray-600">
                    Conteúdos cadastrados:
                </p>

                <p class="text-4xl font-bold text-blue-900 mt-2">
                    <?= $totalConteudos ?>
                </p>

            </a>

        </div>


        <div class="mt-10">

            <a
                href="../index.php"
                class="text-blue-900 hover:underline">

                ← Voltar para o site

            </a>

        </div>

    </main>

</body>

</html>