<?php

session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

require_once "../conexao.php";

$stmt = $pdo->query("
    SELECT *
    FROM depoimentos
    ORDER BY data_criacao DESC
");

$comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Comentários</title>

    <link rel="stylesheet" href="../output.css">

</head>

<body class="bg-gray-100 min-h-screen">

<header class="bg-blue-900 text-white p-5">

    <div class="max-w-6xl mx-auto flex justify-between">

        <h1 class="text-2xl font-bold">
            Gerenciar comentários
        </h1>

        <a href="index.php">
            ← Painel
        </a>

    </div>

</header>


<main class="max-w-6xl mx-auto p-6">

<?php if (empty($depoimentos)): ?>

    <div class="bg-white p-6 rounded-xl shadow">
        Nenhum comentário encontrado.
    </div>

<?php endif; ?>


<?php foreach ($depoimentos as $depoimento): ?>

    <div class="bg-white p-6 rounded-xl shadow mb-5">

        <div class="flex justify-between">

            <h2 class="font-bold text-xl">
                <?= htmlspecialchars($depoimento['nome']) ?>
            </h2>

            <?php if ($depoimento['status'] === 'aprovado'): ?>

                <span class="text-green-600 font-bold">
                    Aprovado
                </span>

            <?php else: ?>

                <span class="text-yellow-600 font-bold">
                    Pendente
                </span>

            <?php endif; ?>

        </div>


        <p class="mt-4 text-gray-700">
            <?= nl2br(htmlspecialchars($depoimento['depoimento'])) ?>
        </p>


        <div class="mt-5 flex gap-3">

            <?php if ($depoimento['status'] === 'pendente'): ?>

                <form action="aprovar_depoimento.php" method="POST">

                    <input
                        type="hidden"
                        name="id"
                        value="<?= $depoimento['id'] ?>">

                    <button
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">

                        Aprovar

                    </button>

                </form>

            <?php endif; ?>


            <form action="excluir_depoimento.php" method="POST">

                <input
                    type="hidden"
                    name="id"
                    value="<?= $depoimento  ['id'] ?>">

                <button
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">

                    Excluir

                </button>

            </form>

        </div>

    </div>

<?php endforeach; ?>

</main>

</body>
</html>