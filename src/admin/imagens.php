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


$imagens = [];


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

            $imagens[] = $arquivo;
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

    <title>Gerenciar Imagens</title>

    <link
        rel="stylesheet"
        href="../css/output.css">

</head>


<body class="min-h-screen bg-gray-100">


    <header class="bg-blue-900 px-6 py-5 text-white">

        <div class="mx-auto flex max-w-7xl items-center justify-between">

            <h1 class="text-2xl font-bold">
                Gerenciar Imagens
            </h1>

            <a
                href="index.php"
                class="rounded-lg bg-white px-4 py-2 font-semibold text-blue-900">

                Painel

            </a>

        </div>

    </header>


    <main class="mx-auto max-w-7xl px-6 py-10">


        <h2 class="text-3xl font-bold text-blue-900">
            Imagens do site
        </h2>


        <p class="mt-2 text-gray-600">
            Escolha uma imagem para substituir.
        </p>


        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">


            <?php foreach ($imagens as $imagem): ?>


                <div class="overflow-hidden rounded-xl bg-white shadow">


                    <div class="flex h-56 items-center justify-center bg-gray-100">

                        <img
                            src="../img/<?= rawurlencode($imagem) ?>?v=<?= filemtime($pastaImagens . "/" . $imagem) ?>"
                            alt="<?= htmlspecialchars($imagem) ?>"
                            class="h-full w-full object-cover">
                    </div>


                    <div class="p-5">


                        <p class="mb-4 truncate font-semibold text-gray-700">

                            <?= htmlspecialchars($imagem) ?>

                        </p>


                        <form
                            action="salvar_imagens.php"
                            method="POST"
                            enctype="multipart/form-data">


                            <input
                                type="hidden"
                                name="imagem_atual"
                                value="<?= htmlspecialchars($imagem) ?>">


                            <label
                                class="mb-2 block text-sm font-semibold text-gray-700">

                                Nova imagem

                            </label>


                            <input
                                type="file"
                                name="nova_imagem"
                                accept="image/jpeg,image/png,image/gif,image/webp"
                                required
                                class="mb-4 block w-full text-sm text-gray-500">


                            <button
                                type="submit"
                                class="w-full rounded-lg bg-blue-900 px-4 py-2 font-semibold text-white hover:bg-blue-800">

                                Substituir imagem

                            </button>


                        </form>


                    </div>


                </div>


            <?php endforeach; ?>


        </div>


        <?php if (empty($imagens)): ?>

            <div class="mt-8 rounded-xl bg-white p-8 text-center shadow">

                <p class="text-gray-500">
                    Nenhuma imagem encontrada na pasta src/img.
                </p>

            </div>

        <?php endif; ?>


    </main>

</body>

</html>