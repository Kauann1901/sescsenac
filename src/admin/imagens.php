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

$pastaImagens = __DIR__ . "/../img";

$arquivos = [];

if (is_dir($pastaImagens)) {
    $arquivos = scandir($pastaImagens);
}

$extensoesPermitidas = ["jpg", "jpeg", "png", "gif", "webp"];

$imagens = [];

foreach ($arquivos as $arquivo) {

    if ($arquivo === "." || $arquivo === "..") {
        continue;
    }

    $extensao = strtolower(
        pathinfo($arquivo, PATHINFO_EXTENSION)
    );

    if (in_array($extensao, $extensoesPermitidas, true)) {
        $imagens[] = $arquivo;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../css/output.css" rel="stylesheet">

    <title>Gerenciar Imagens</title>
</head>

<body class="bg-gray-100 min-h-screen">

    <header class="bg-blue-900 text-white p-5">
        <div class="max-w-7xl mx-auto flex justify-between items-center">

            <h1 class="text-2xl font-bold">
                Gerenciar Imagens
            </h1>

            <a
                href="index.php"
                class="bg-white text-blue-900 px-4 py-2 rounded-lg hover:bg-gray-100"
            >
                Voltar
            </a>

        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-10">

        <?php if (isset($_GET["sucesso"])): ?>

            <div class="mb-6 rounded-lg bg-green-100 border border-green-300 p-4 text-green-800">
                Imagem substituída com sucesso!
            </div>

        <?php endif; ?>

        <?php if (isset($_GET["erro"])): ?>

            <div class="mb-6 rounded-lg bg-red-100 border border-red-300 p-4 text-red-800">
                <?= htmlspecialchars($_GET["erro"]) ?>
            </div>

        <?php endif; ?>


        <?php if (empty($imagens)): ?>

            <div class="bg-white rounded-xl shadow p-8 text-center">
                <p class="text-gray-600">
                    Nenhuma imagem encontrada na pasta <strong>src/img</strong>.
                </p>
            </div>

        <?php else: ?>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

                <?php foreach ($imagens as $imagem): ?>

                    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

                        <div class="h-56 bg-gray-100 flex items-center justify-center">

                            <img
                                src="../img/<?= htmlspecialchars($imagem) ?>?v=<?= filemtime($pastaImagens . "/" . $imagem) ?>"
                                alt="<?= htmlspecialchars($imagem) ?>"
                                class="w-full h-full object-cover"
                            >

                        </div>

                        <div class="p-5">

                            <h2 class="font-bold text-lg text-blue-950 mb-4 break-all">
                                <?= htmlspecialchars($imagem) ?>
                            </h2>

                            <form
                                action="salvar_imagens.php"
                                method="POST"
                                enctype="multipart/form-data"
                            >

                                <input
                                    type="hidden"
                                    name="imagem_atual"
                                    value="<?= htmlspecialchars($imagem) ?>"
                                >

                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Escolher nova imagem
                                </label>

                                <input
                                    type="file"
                                    name="nova_imagem"
                                    accept="image/jpeg,image/png,image/gif,image/webp"
                                    required
                                    class="w-full text-sm mb-4"
                                >

                                <button
                                    type="submit"
                                    class="w-full rounded-lg bg-blue-900 px-4 py-3 text-white font-semibold hover:bg-blue-700 transition"
                                >
                                    Substituir imagem
                                </button>

                            </form>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </main>

</body>
</html>