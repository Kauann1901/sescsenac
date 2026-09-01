<?php

session_start();

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] !== 'admin') {
    header("Location: ../index.php");
    exit;
}

require_once "../conexao.php";

$conteudos = $pdo
    ->query("SELECT * FROM conteudos ORDER BY data_criacao DESC")
    ->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Conteúdos</title>

    <link rel="stylesheet" href="../output.css">

</head>

<body class="bg-gray-100">

<header class="bg-blue-900 text-white p-5">

    <div class="max-w-6xl mx-auto flex justify-between">

        <h1 class="text-2xl font-bold">
            Conteúdos da escola
        </h1>

        <a href="index.php">
            ← Painel
        </a>

    </div>

</header>


<main class="max-w-6xl mx-auto p-6">


<div class="bg-white p-6 rounded-xl shadow mb-8">

    <h2 class="text-2xl font-bold mb-5">
        Adicionar conteúdo
    </h2>

    <form
        action="salvar_conteudo.php"
        method="POST"
        enctype="multipart/form-data">

        <input
            type="text"
            name="titulo"
            placeholder="Título"
            required
            class="w-full border rounded-lg p-3 mb-4">

        <textarea
            name="descricao"
            placeholder="Descrição do conteúdo"
            required
            rows="6"
            class="w-full border rounded-lg p-3 mb-4"></textarea>

        <input
            type="file"
            name="imagem"
            accept="image/jpeg,image/png,image/webp"
            class="mb-4">

        <br>

        <button
            class="bg-blue-900 text-white px-5 py-3 rounded-lg">

            Adicionar conteúdo

        </button>

    </form>

</div>


<?php foreach ($conteudos as $conteudo): ?>

<div class="bg-white p-6 rounded-xl shadow mb-5">

    <h2 class="text-2xl font-bold">
        <?= htmlspecialchars($conteudo['titulo']) ?>
    </h2>

    <p class="mt-3 text-gray-700">
        <?= nl2br(htmlspecialchars($conteudo['descricao'])) ?>
    </p>

    <?php if ($conteudo['imagem']): ?>

        <img
            src="../uploads/<?= htmlspecialchars($conteudo['imagem']) ?>"
            class="mt-5 max-w-md rounded-lg">

    <?php endif; ?>


    <form
        action="excluir_conteudo.php"
        method="POST"
        class="mt-5">

        <input
            type="hidden"
            name="id"
            value="<?= $conteudo['id'] ?>">

        <button
            class="bg-red-600 text-white px-4 py-2 rounded-lg">

            Excluir

        </button>

    </form>

</div>

<?php endforeach; ?>


</main>

</body>
</html>