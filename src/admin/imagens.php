<?php

session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

require_once "../conexao.php";

$imagens = $pdo
    ->query("SELECT * FROM imagens ORDER BY id")
    ->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gerenciar imagens</title>

    <link rel="stylesheet" href="../output.css">

</head>

<body class="bg-gray-100">

<header class="bg-blue-900 text-white p-5">

    <div class="max-w-6xl mx-auto flex justify-between">

        <h1 class="text-2xl font-bold">
            Gerenciar imagens
        </h1>

        <a href="index.php">
            ← Painel
        </a>

    </div>

</header>


<main class="max-w-6xl mx-auto p-6">

    <div class="grid md:grid-cols-3 gap-6">

        <?php foreach ($imagens as $imagem): ?>

            <div class="bg-white rounded-xl shadow p-5">

                <h2 class="font-bold text-xl mb-4">
                    <?= htmlspecialchars($imagem['nome']) ?>
                </h2>

                <img
                    src="../img/<?= htmlspecialchars($imagem['arquivo']) ?>"
                    class="w-full h-48 object-cover rounded-lg mb-5">


                <form
                    action="salvar_imagem.php"
                    method="POST"
                    enctype="multipart/form-data">

                    <input
                        type="hidden"
                        name="id"
                        value="<?= $imagem['id'] ?>">

                    <input
                        type="file"
                        name="imagem"
                        accept="image/jpeg,image/png,image/webp"
                        required
                        class="w-full mb-4">

                    <button
                        class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800">

                        Trocar imagem

                    </button>

                </form>

            </div>

        <?php endforeach; ?>

    </div>

</main>

</body>
</html>