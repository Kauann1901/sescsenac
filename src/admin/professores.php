
<?php
session_start();

if (
    !isset($_SESSION["usuario_id"]) ||
    ($_SESSION["logado"] ?? false) !== true
) {
    header("Location: ../login.php");
    exit;
}

require_once __DIR__ . "/../database/conexao.php";

function h($valor) {
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$professor = [
    "id" => "",
    "nome" => "",
    "cargo" => "",
    "formacao" => "",
    "pos_graduacao" => "",
    "experiencia" => "",
    "foto" => "",
    "ordem" => 0,
    "ativo" => 1
];

if ($id) {
    $stmt = $pdo->prepare("SELECT * FROM professores WHERE id = ?");
    $stmt->execute([$id]);
    $encontrado = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$encontrado) {
        header("Location: professores.php");
        exit;
    }

    $professor = $encontrado;
}

$stmt = $pdo->query("
    SELECT *
    FROM professores
    ORDER BY ordem ASC, nome ASC
");

$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);

$mensagem = "";

if (isset($_GET["sucesso"])) {
    $mensagem = "Professor salvo com sucesso!";
} elseif (isset($_GET["excluido"])) {
    $mensagem = "Professor excluído com sucesso!";
} elseif (isset($_GET["erro"])) {
    $mensagem = "Não foi possível concluir a operação.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gerenciar Professores</title>

    <link rel="stylesheet" href="../css/output.css">
</head>

<body class="min-h-screen bg-gray-100 text-gray-800">

    <header class="bg-blue-900 px-6 py-5 text-white shadow">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4">

            <h1 class="text-xl font-bold md:text-2xl">
                Gerenciar Professores
            </h1>

            <a
                href="index.php"
                class="rounded-lg bg-white px-5 py-2 font-semibold text-blue-900 transition hover:bg-blue-50"
            >
                Painel
            </a>

        </div>
    </header>

    <main class="mx-auto max-w-6xl space-y-8 px-5 py-10">

        <?php if ($mensagem !== ""): ?>
            <div class="rounded-xl border border-blue-100 bg-white p-4 shadow-sm">
                <p class="font-semibold text-blue-900">
                    <?= h($mensagem) ?>
                </p>
            </div>
        <?php endif; ?>

        <section>

            <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

                <div>
                    <h2 class="text-2xl font-bold text-blue-950">
                        <?= $professor["id"] ? "Editar professor" : "Cadastrar professor" ?>
                    </h2>

                    <p class="mt-2 text-gray-600">
                        Gerencie as informações exibidas na equipe de professores.
                    </p>
                </div>

                <?php if ($professor["id"]): ?>
                    <a
                        href="professores.php"
                        class="inline-flex justify-center rounded-lg bg-gray-200 px-4 py-2 font-semibold text-gray-700 hover:bg-gray-300"
                    >
                        Cancelar edição
                    </a>
                <?php endif; ?>

            </div>

            <div class="rounded-2xl bg-white p-6 shadow-sm md:p-8">

                <form
                    action="salvar_professor.php"
                    method="POST"
                    enctype="multipart/form-data"
                    class="grid gap-6 md:grid-cols-2"
                >

                    <input
                        type="hidden"
                        name="id"
                        value="<?= h($professor["id"]) ?>"
                    >

                    <div>
                        <label for="nome" class="mb-2 block font-semibold text-gray-800">
                            Nome completo
                        </label>

                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            maxlength="150"
                            required
                            value="<?= h($professor["nome"]) ?>"
                            placeholder="Nome do professor"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-700 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                    <div>
                        <label for="cargo" class="mb-2 block font-semibold text-gray-800">
                            Disciplina ou cargo
                        </label>

                        <input
                            type="text"
                            id="cargo"
                            name="cargo"
                            maxlength="150"
                            required
                            value="<?= h($professor["cargo"]) ?>"
                            placeholder="Ex.: Professor de Matemática"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-700 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                    <div>
                        <label for="formacao" class="mb-2 block font-semibold text-gray-800">
                            Formação acadêmica
                        </label>

                        <input
                            type="text"
                            id="formacao"
                            name="formacao"
                            maxlength="255"
                            required
                            value="<?= h($professor["formacao"]) ?>"
                            placeholder="Ex.: Licenciatura em Matemática"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-700 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                    <div>
                        <label for="pos_graduacao" class="mb-2 block font-semibold text-gray-800">
                            Pós-graduação ou especialização
                        </label>

                        <input
                            type="text"
                            id="pos_graduacao"
                            name="pos_graduacao"
                            maxlength="255"
                            value="<?= h($professor["pos_graduacao"]) ?>"
                            placeholder="Ex.: Educação Matemática"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-700 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                    <div>
                        <label for="experiencia" class="mb-2 block font-semibold text-gray-800">
                            Experiência profissional
                        </label>

                        <input
                            type="text"
                            id="experiencia"
                            name="experiencia"
                            maxlength="255"
                            required
                            value="<?= h($professor["experiencia"]) ?>"
                            placeholder="Ex.: 10 anos na área da educação"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-700 focus:ring-2 focus:ring-blue-100"
                        >
                    </div>

                    <div>
                        <label for="ordem" class="mb-2 block font-semibold text-gray-800">
                            Ordem de exibição
                        </label>

                        <input
                            type="number"
                            id="ordem"
                            name="ordem"
                            min="0"
                            required
                            value="<?= h($professor["ordem"]) ?>"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-700 focus:ring-2 focus:ring-blue-100"
                        >

                        <p class="mt-1 text-sm text-gray-500">
                            Números menores aparecem primeiro.
                        </p>
                    </div>

                    <div>
                        <label for="foto" class="mb-2 block font-semibold text-gray-800">
                            Foto do professor
                        </label>

                        <input
                            type="file"
                            id="foto"
                            name="foto"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="w-full rounded-lg border border-gray-300 bg-white px-3 py-3 text-sm"
                        >

                        <p class="mt-1 text-sm text-gray-500">
                            Formatos JPG, PNG ou WEBP. Máximo de 5 MB.
                    </p>

                        <?php if (!empty($professor["foto"])): ?>
                            <div class="mt-4">
                                <p class="mb-2 text-sm font-semibold text-gray-600">
                                    Foto atual
                                </p>

                                <img
                                    src="../<?= h($professor["foto"]) ?>"
                                    alt="Foto atual do professor"
                                    class="h-28 w-28 rounded-xl object-cover shadow-sm"
                                >
                            </div>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="ativo" class="mb-2 block font-semibold text-gray-800">
                            Visibilidade no site
                        </label>

                        <select
                            id="ativo"
                            name="ativo"
                            class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 outline-none focus:border-blue-700 focus:ring-2 focus:ring-blue-100"
                        >
                            <option
                                value="1"
                                <?= (int) $professor["ativo"] === 1 ? "selected" : "" ?>
                            >
                                Visível
                            </option>

                            <option
                                value="0"
                                <?= (int) $professor["ativo"] === 0 ? "selected" : "" ?>
                            >
                                Oculto
                            </option>
                        </select>
                    </div>

                    <div class="flex flex-wrap gap-3 md:col-span-2">

                        <button
                            type="submit"
                            class="rounded-lg bg-blue-900 px-6 py-3 font-semibold text-white transition hover:bg-blue-800"
                        >
                            <?= $professor["id"] ? "Salvar alterações" : "Cadastrar professor" ?>
                        </button>

                        <?php if ($professor["id"]): ?>
                            <a
                                href="professores.php"
                                class="rounded-lg bg-gray-200 px-6 py-3 font-semibold text-gray-700 transition hover:bg-gray-300"
                            >
                                Cancelar
                            </a>
                        <?php endif; ?>

                    </div>

                </form>

            </div>

        </section>

        <section>

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-blue-950">
                    Professores cadastrados
                </h2>

                <p class="mt-2 text-gray-600">
                    Consulte, edite, oculte ou exclua os professores da página principal.
                </p>
            </div>

            <div class="space-y-5">

                <?php foreach ($professores as $p): ?>

                    <article class="rounded-xl border border-gray-200 bg-white p-6 shadow-sm">

                        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                            <div class="flex items-center gap-4">

                                <?php if (!empty($p["foto"])): ?>

                                    <img
                                        src="../<?= h($p["foto"]) ?>"
                                        alt="<?= h($p["nome"]) ?>"
                                        class="h-20 w-20 shrink-0 rounded-xl object-cover"
                                    >

                                <?php else: ?>

                                    <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-xl bg-blue-100 text-2xl font-bold text-blue-900">
                                        <?= h(mb_substr($p["nome"], 0, 1, "UTF-8")) ?>
                                    </div>

                                <?php endif; ?>

                                <div>

                                    <div class="flex flex-wrap items-center gap-3">

                                        <h3 class="text-lg font-bold text-gray-900">
                                            <?= h($p["nome"]) ?>
                                        </h3>

                                        <?php if ((int) $p["ativo"] === 1): ?>

                                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                                Visível
                                            </span>

                                        <?php else: ?>

                                            <span class="rounded-full bg-gray-200 px-3 py-1 text-xs font-semibold text-gray-600">
                                                Oculto
                                            </span>

                                        <?php endif; ?>

                                    </div>

                                    <p class="mt-1 font-medium text-blue-700">
                                        <?= h($p["cargo"]) ?>
                                    </p>

                                    <p class="mt-2 text-sm text-gray-500">
                                        Formação: <?= h($p["formacao"]) ?>
                                    </p>

                                    <?php if (!empty($p["pos_graduacao"])): ?>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Especialização: <?= h($p["pos_graduacao"]) ?>
                                        </p>
                                    <?php endif; ?>

                                    <p class="mt-1 text-sm text-gray-500">
                                        Experiência: <?= h($p["experiencia"]) ?>
                                    </p>

                                </div>

                            </div>

                            <div class="flex shrink-0 gap-3">

                                <a
                                    href="professores.php?id=<?= (int) $p["id"] ?>"
                                    class="rounded-lg bg-blue-100 px-4 py-2 font-semibold text-blue-900 transition hover:bg-blue-200"
                                >
                                    Editar
                                </a>

                                <form
                                    action="excluir_professor.php"
                                    method="POST"
                                    onsubmit="return confirm('Tem certeza de que deseja excluir este professor?')"
                                >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= (int) $p["id"] ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="rounded-lg bg-red-100 px-4 py-2 font-semibold text-red-700 transition hover:bg-red-200"
                                    >
                                        Excluir
                                    </button>

                                </form>

                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>

                <?php if (empty($professores)): ?>

                    <div class="rounded-xl bg-white p-10 text-center shadow-sm">
                        <h3 class="text-lg font-bold text-blue-950">
                            Nenhum professor cadastrado
                        </h3>

                        <p class="mt-2 text-gray-500">
                            Utilize o formulário acima para adicionar o primeiro professor.
                        </p>
                    </div>

                <?php endif; ?>

            </div>

        </section>

    </main>

</body>
</html>
