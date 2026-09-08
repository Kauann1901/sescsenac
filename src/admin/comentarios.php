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


$stmt = $pdo->query("
    SELECT
        id,
        nome,
        depoimento,
        data_criacao,
        avaliacao,
        status
    FROM depoimentos
    ORDER BY data_criacao DESC
");

$depoimentos = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Comentários</title>

    <link
        rel="stylesheet"
        href="../css/output.css">

</head>


<body class="min-h-screen bg-gray-100">


<header class="bg-blue-900 px-6 py-5 text-white">

    <div class="mx-auto flex max-w-7xl items-center justify-between">

        <h1 class="text-2xl font-bold">
            Gerenciar Comentários
        </h1>

        <a
            href="index.php"
            class="rounded-lg bg-white px-4 py-2 font-semibold text-blue-900">

            Painel

        </a>

    </div>

</header>


<main class="mx-auto max-w-6xl px-6 py-10">


    <h2 class="mb-8 text-3xl font-bold text-blue-900">
        Comentários enviados
    </h2>


    <?php if (empty($depoimentos)): ?>

        <div class="rounded-xl bg-white p-8 text-center shadow">

            <p class="text-gray-500">
                Nenhum comentário encontrado.
            </p>

        </div>

    <?php endif; ?>


    <div class="space-y-5">


        <?php foreach ($depoimentos as $depoimento): ?>


            <div class="rounded-xl bg-white p-6 shadow">


                <div class="flex flex-col justify-between gap-4 md:flex-row">


                    <div class="flex-1">


                        <div class="flex flex-wrap items-center gap-3">

                            <h3 class="text-xl font-bold text-gray-800">

                                <?= htmlspecialchars($depoimento["nome"]) ?>

                            </h3>


                            <?php if ($depoimento["status"] === "aprovado"): ?>

                                <span class="rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-700">

                                    Aprovado

                                </span>

                            <?php else: ?>

                                <span class="rounded-full bg-yellow-100 px-3 py-1 text-sm font-semibold text-yellow-700">

                                    Pendente

                                </span>

                            <?php endif; ?>


                        </div>


                        <p class="mt-2 text-yellow-500">

                            <?= str_repeat("★", (int)$depoimento["avaliacao"]) ?>

                        </p>


                        <p class="mt-4 text-gray-700">

                            <?= nl2br(htmlspecialchars($depoimento["depoimento"])) ?>

                        </p>


                        <p class="mt-4 text-sm text-gray-400">

                            <?= htmlspecialchars($depoimento["data_criacao"]) ?>

                        </p>


                    </div>


                    <div class="flex flex-wrap items-center gap-3">


                        <?php if ($depoimento["status"] === "pendente"): ?>

                            <form
                                action="aprovar_comentarios.php"
                                method="POST">

                                <input
                                    type="hidden"
                                    name="id"
                                    value="<?= $depoimento["id"] ?>">

                                <button
                                    type="submit"
                                    class="rounded-lg bg-green-600 px-4 py-2 font-semibold text-white hover:bg-green-700">

                                    Aprovar

                                </button>

                            </form>

                        <?php endif; ?>


                        <form
                            action="excluir_comentarios.php"
                            method="POST"
                            onsubmit="return confirm('Deseja realmente excluir este comentário?');">

                            <input
                                type="hidden"
                                name="id"
                                value="<?= $depoimento["id"] ?>">

                            <button
                                type="submit"
                                class="rounded-lg bg-red-600 px-4 py-2 font-semibold text-white hover:bg-red-700">

                                Excluir

                            </button>

                        </form>


                    </div>


                </div>


            </div>


        <?php endforeach; ?>


    </div>


</main>

</body>

</html>