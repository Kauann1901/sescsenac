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

require_once "../database/conexao.php";


/* Comentários pendentes */

$stmt = $pdo->query("
    SELECT COUNT(*)
    FROM depoimentos
    WHERE status = 'pendente'
");

$totalPendentes = $stmt->fetchColumn();


/* Total de depoimentos */

$stmt = $pdo->query("
    SELECT COUNT(*)
    FROM depoimentos
");

$totalDepoimentos = $stmt->fetchColumn();


/* Contar imagens */

$pastaImagens = __DIR__ . "/../img";

$totalImagens = 0;

if (is_dir($pastaImagens)) {

    $arquivos = scandir($pastaImagens);

    foreach ($arquivos as $arquivo) {

        $extensao = strtolower(
            pathinfo($arquivo, PATHINFO_EXTENSION)
        );

        if (
            in_array(
                $extensao,
                ["jpg", "jpeg", "png", "gif", "webp"]
            )
        ) {

            $totalImagens++;

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

    <title>Painel Administrativo</title>

    <link
        rel="stylesheet"
        href="../css/output.css">

</head>


<body class="min-h-screen bg-gray-100">


<header class="bg-blue-900 text-white shadow-lg">

    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">

        <div>

            <h1 class="text-2xl font-bold">
                Painel Administrativo
            </h1>

            <p class="text-sm text-blue-200">
                SESC SENAC - Ensino Médio
            </p>

        </div>


        <a
            href="logout.php"
            class="rounded-lg bg-red-600 px-5 py-2 font-semibold transition hover:bg-red-700">

            Sair

        </a>

    </div>

</header>


<main class="mx-auto max-w-7xl px-6 py-10">


    <h2 class="text-3xl font-bold text-blue-900">
        Administração do site
    </h2>


    <p class="mt-2 text-gray-600">

        Bem-vindo,
        <?= htmlspecialchars($_SESSION["nome"]) ?>.

    </p>


    <div class="mt-8 grid grid-cols-1 gap-6 md:grid-cols-3">


        <!-- COMENTÁRIOS -->

        <a
            href="comentarios.php"
            class="rounded-2xl bg-white p-6 shadow-md transition hover:-translate-y-1 hover:shadow-xl">

            <div class="mb-5 text-4xl">
                💬
            </div>

            <h3 class="text-xl font-bold text-gray-800">
                Comentários
            </h3>

            <p class="mt-2 text-gray-500">
                Comentários aguardando aprovação.
            </p>

            <p class="mt-5 text-4xl font-bold text-blue-900">
                <?= $totalPendentes ?>
            </p>

            <p class="text-sm text-gray-500">
                pendentes
            </p>

        </a>


        <!-- IMAGENS -->

        <a
            href="imagens.php"
            class="rounded-2xl bg-white p-6 shadow-md transition hover:-translate-y-1 hover:shadow-xl">

            <div class="mb-5 text-4xl">
                🖼️
            </div>

            <h3 class="text-xl font-bold text-gray-800">
                Imagens
            </h3>

            <p class="mt-2 text-gray-500">
                Imagens disponíveis no site.
            </p>

            <p class="mt-5 text-4xl font-bold text-blue-900">
                <?= $totalImagens ?>
            </p>

            <p class="text-sm text-gray-500">
                imagens
            </p>

        </a>


        <!-- DEPOIMENTOS -->

        <a
            href="comentarios.php"
            class="rounded-2xl bg-white p-6 shadow-md transition hover:-translate-y-1 hover:shadow-xl">

            <div class="mb-5 text-4xl">
                ⭐
            </div>

            <h3 class="text-xl font-bold text-gray-800">
                Depoimentos
            </h3>

            <p class="mt-2 text-gray-500">
                Total de depoimentos cadastrados.
            </p>

            <p class="mt-5 text-4xl font-bold text-blue-900">
                <?= $totalDepoimentos ?>
            </p>

            <p class="text-sm text-gray-500">
                cadastrados
            </p>

        </a>


    </div>


    <div class="mt-10 rounded-2xl bg-white p-8 shadow-md">

        <h3 class="text-2xl font-bold text-blue-900">
            Gerenciamento
        </h3>


        <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-2">


            <a
                href="comentarios.php"
                class="rounded-lg border border-gray-200 p-5 transition hover:border-blue-900 hover:bg-blue-50">

                <p class="font-bold text-blue-900">
                    💬 Gerenciar comentários
                </p>

                <p class="mt-1 text-sm text-gray-500">
                    Aprovar ou excluir comentários.
                </p>

            </a>


            <a
                href="imagens.php"
                class="rounded-lg border border-gray-200 p-5 transition hover:border-blue-900 hover:bg-blue-50">

                <p class="font-bold text-blue-900">
                    🖼️ Gerenciar imagens
                </p>

                <p class="mt-1 text-sm text-gray-500">
                    Substituir imagens do site.
                </p>

            </a>


        </div>

    </div>


    <div class="mt-8">

        <a
            href="../index.php"
            class="font-semibold text-blue-900 hover:underline">

            ← Voltar para o site

        </a>

    </div>


</main>


<footer class="bg-blue-900 py-5 text-center text-sm text-white">

    © <?= date("Y") ?> SESC SENAC - Ensino Médio

</footer>


</body>

</html>