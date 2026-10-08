<?php

require_once __DIR__ . "/src/database/conexao.php";

$stmt = $pdo->query("
    SELECT nome, depoimento, avaliacao, data_criacao
    FROM depoimentos
    WHERE status = 'aprovado'
    ORDER BY data_criacao DESC
");

$depoimentos = $stmt->fetchAll(PDO::FETCH_ASSOC);




$pastaImagens = __DIR__ . "/src/img/";

$logo = "./src/img/imagem6.png";
$imagem2 = "./src/img/imagem2.jpg";
$imagem3 = "./src/img/imagem3.jpg";
$imagem4 = "./src/img/imagem4.jpg";
$imagem5 = "./src/img/imagem5.jpg";



function versaoImagem($arquivo)
{
    $caminho = __DIR__ . "/src/img/" . $arquivo;

    if (file_exists($caminho)) {
        return filemtime($caminho);
    }

    return time();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./src/css/output.css" rel="stylesheet">

    <title>Ensino Médio Sesc Senac</title>

</head>


<body class="bg-gray-50">



    <nav class="fixed top-0 left-0 right-0 z-50 bg-sky-100 shadow-lg">

        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">

            <div class="relative flex h-16 items-center justify-between">



                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">

                    <a href="#inicio" class="flex shrink-0 items-center">

                        <img
                            src="<?= $logo ?>?v=<?= versaoImagem('imagem6.png') ?>"
                            alt="Logo Sesc Senac"
                            class="h-12 w-auto">

                    </a>


                    <div class="hidden sm:ml-6 sm:block">

                        <div class="flex space-x-2 mt-2">

                            <a
                                href="#sobrenos"
                                class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Sobre nós
                            </a>

                            <a
                                href="#cursos"
                                class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Cursos
                            </a>

                            <a
                                href="#projetos"
                                class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Projetos
                            </a>

                            <a
                                href="#feiras"
                                class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Feiras
                            </a>

                            <a
                                href="#atividades"
                                class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Atividades
                            </a>

                            <a
                                href="#missao"
                                class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Missão e Valores
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </nav>


    <div class="h-16"></div>

    <section id="inicio" class="relative w-full overflow-hidden group">
        <div id="slider" class="flex transition-transform duration-700 ease-in-out h-72 md:h-[500px]">
            <div class="relative min-w-full h-full">
                <img src="<?= $imagem2 ?>?v=<?= versaoImagem('imagem2.jpg') ?>" class="w-full h-full object-cover" alt="Ensino Médio">
                <div class="absolute inset-0 bg-black/50"></div>
            </div>
            <div class="relative min-w-full h-full">
                <img
                    src="<?= $imagem3 ?>?v=<?= versaoImagem('imagem3.jpg') ?>"
                    class="w-full h-full object-cover"
                    alt="Alunos">
                <div class="absolute inset-0 bg-black/50"></div>

            </div>



            <div class="relative min-w-full h-full">

                <img
                    src="<?= $imagem4 ?>?v=<?= versaoImagem('imagem4.jpg') ?>"
                    class="w-full h-full object-cover"
                    alt="Educação">

                <div class="absolute inset-0 bg-black/50"></div>

            </div>

        </div>




        <div class="absolute inset-0 z-10 flex items-center justify-center text-center px-6">

            <div class="text-white">

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-black tracking-tight drop-shadow-2xl">
                    Ensino Médio Sesc Senac
                </h1>

                <p class="mt-4 text-lg md:text-2xl font-medium drop-shadow-lg">
                    Educação, conhecimento e oportunidades para transformar seu futuro.
                </p>

            </div>

        </div>




        <button
            id="prev"
            class="absolute z-20 top-1/2 left-4 -translate-y-1/2 bg-white/80 p-3 rounded-full shadow hover:bg-white text-gray-800">
            ←
        </button>




        <button
            id="next"
            class="absolute z-20 top-1/2 right-4 -translate-y-1/2 bg-white/80 p-3 rounded-full shadow hover:bg-white text-gray-800">
            →
        </button>

    </section>



    <section class="relative overflow-hidden bg-white py-16">

        <div class="absolute right-0 top-0 h-full w-24 bg-blue-50 -skew-x-6"></div>

        <div class="relative mx-auto flex max-w-7xl items-center justify-center gap-8 px-6">


            <div class="hidden w-1/4 md:block">

                <img
                    src="https://www.sescpr.com.br/wp-content/uploads/2024/07/sala-6-300x225.jpeg"
                    alt="Sala de aula"
                    class="h-64 w-full rotate-[-5deg] rounded-2xl object-cover shadow-xl">

            </div>


            <div class="z-10 w-full max-w-2xl text-center">

                <span class="text-sm font-bold uppercase tracking-wider text-blue-700">
                    Ensino Médio
                </span>

                <h1 class="mt-3 text-4xl font-black leading-tight text-blue-950 md:text-5xl">

                    Ensino Médio para

                    <span class="text-blue-700">
                        transformar seu futuro
                    </span>

                </h1>

                <p class="mx-auto mt-6 max-w-xl text-base leading-relaxed text-gray-600 md:text-lg">

                    Uma formação que une conhecimento, tecnologia, criatividade
                    e preparação para o futuro. No Ensino Médio Sesc Senac,
                    o estudante desenvolve autonomia, pensamento crítico,
                    protagonismo e novas possibilidades para sua vida acadêmica
                    e profissional.

                </p>

                <p class="mx-auto mt-4 max-w-xl text-base leading-relaxed text-gray-600">

                    Além da formação escolar, a proposta integra conhecimentos
                    e experiências voltadas ao mundo do trabalho, aproximando
                    a educação profissional da formação dos jovens.

                </p>

            </div>


            <div class="hidden w-1/4 md:block">

                <img
                    src="https://www.sescpr.com.br/wp-content/uploads/2019/02/WhatsApp-Image-2024-07-15-at-13.53.21-1.jpeg"
                    alt="Biblioteca"
                    class="h-64 w-full rotate-[5deg] rounded-2xl object-cover shadow-xl">

            </div>

        </div>

    </section>



    <section id="sobrenos" class="bg-blue-50 py-20">

        <div class="mx-auto max-w-6xl px-6 text-center">

            <span class="text-sm font-bold uppercase tracking-wider text-blue-700">
                Educação integral
            </span>

            <h2 class="mt-3 text-3xl font-black text-blue-950 md:text-4xl">
                Mais do que aprender, preparar para a vida
            </h2>

            <p class="mx-auto mt-5 max-w-3xl leading-relaxed text-gray-600">

                A proposta educacional valoriza uma formação integral,
                buscando desenvolver aspectos acadêmicos, culturais, sociais
                e pessoais. O estudante é incentivado a participar ativamente
                do próprio processo de aprendizagem e a construir seus
                projetos de vida.

            </p>

        </div>

    </section>



    <section class="bg-white py-16">

        <div class="mx-auto max-w-6xl px-6">

            <div class="grid gap-6 md:grid-cols-3">


                <div class="rounded-2xl bg-blue-50 p-8 text-center shadow-sm">

                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl text-white">
                        🎓
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Formação integral
                    </h3>

                    <p class="mt-3 text-gray-600">
                        Desenvolvimento acadêmico, cultural, social e pessoal.
                    </p>

                </div>


                <div class="rounded-2xl bg-blue-50 p-8 text-center shadow-sm">

                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl text-white">
                        💡
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Protagonismo
                    </h3>

                    <p class="mt-3 text-gray-600">
                        Incentivo à autonomia, criatividade e pensamento crítico.
                    </p>

                </div>


                <div class="rounded-2xl bg-blue-50 p-8 text-center shadow-sm">

                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl text-white">
                        🚀
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Futuro profissional
                    </h3>

                    <p class="mt-3 text-gray-600">
                        Aproximação entre a formação escolar e o mundo do trabalho.
                    </p>

                </div>

            </div>

        </div>

    </section>



    <section id="cursos" class="bg-blue-50 py-20">

        <div class="mx-auto max-w-6xl px-6">

            <div class="text-center">

                <span class="text-sm font-bold uppercase tracking-wider text-blue-700">
                    Formação
                </span>

                <h2 class="mt-3 text-3xl font-black text-blue-950 md:text-4xl">
                    Cursos e oportunidades
                </h2>

                <p class="mx-auto mt-4 max-w-2xl text-gray-600">
                    Durante o Ensino Médio, os estudantes têm acesso a
                    diferentes atividades que complementam sua formação.
                </p>

            </div>


            <div class="mt-10 grid gap-6 md:grid-cols-2">


                <div class="rounded-2xl bg-white p-8 shadow-sm">

                    <div class="text-4xl">✍️</div>

                    <h3 class="mt-5 text-2xl font-bold text-blue-950">
                        Jovens Autores
                    </h3>

                    <p class="mt-3 leading-relaxed text-gray-600">

                        Aulas que incentivam a escrita e a criatividade,
                        proporcionando aos alunos a oportunidade de desenvolver
                        suas habilidades de produção textual e colocar suas
                        ideias em prática.

                    </p>

                    <span class="mt-5 inline-block rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">
                        Todas as turmas
                    </span>

                </div>


                <div class="rounded-2xl bg-white p-8 shadow-sm">

                    <div class="text-4xl">📝</div>

                    <h3 class="mt-5 text-2xl font-bold text-blue-950">
                        Oficina de Redação
                    </h3>

                    <p class="mt-3 leading-relaxed text-gray-600">

                        Aulas de produção textual voltadas aos alunos do
                        3º ano do Ensino Médio, com foco na preparação para
                        vestibulares e processos seletivos.

                    </p>

                    <span class="mt-5 inline-block rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-blue-800">
                        3º ano
                    </span>

                </div>

            </div>

        </div>

    </section>



    <section id="atividades" class="bg-white py-20">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center">
                <span class="text-sm font-bold uppercase tracking-wider text-blue-700"> Experiências </span>
                <h2 class="mt-3 text-3xl font-black text-blue-950 md:text-4xl"> Atividades Extracurriculares </h2>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">
                    Atividades que ampliam as experiências dos estudantes
                    para além da sala de aula.
                </p>

            </div>


            <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-4">


                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-7 shadow-sm">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl">
                        🏐
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Esportes
                    </h3>

                    <p class="mt-3 text-sm leading-relaxed text-gray-600">

                        Atividades esportivas com vôlei feminino e masculino,
                        futsal masculino, xadrez misto e tênis de mesa misto,
                        realizadas todas as sextas-feiras.

                    </p>

                    <p class="mt-4 text-sm font-semibold text-blue-700">
                        Todas as turmas do Ensino Médio
                    </p>

                </div>


                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-7 shadow-sm">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl">
                        🔬
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Clube de Ciências
                    </h3>

                    <p class="mt-3 text-sm leading-relaxed text-gray-600">

                        Espaço dedicado à pesquisa, experimentação e
                        desenvolvimento de trabalhos científicos, com
                        orientação e apoio dos professores.

                    </p>

                    <p class="mt-4 text-sm font-semibold text-blue-700">
                        Todas as turmas do Ensino Médio
                    </p>

                </div>


                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-7 shadow-sm">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl">
                        📚
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Clube de Leitura
                    </h3>

                    <p class="mt-3 text-sm leading-relaxed text-gray-600">

                        Iniciativa que promove o incentivo à leitura,
                        à troca de ideias e à socialização entre os alunos.

                    </p>

                    <p class="mt-4 text-sm font-semibold text-blue-700">
                        Todas as turmas do Ensino Médio
                    </p>

                </div>


                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-7 shadow-sm">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl">
                        ✏️
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Jovens Autores
                    </h3>

                    <p class="mt-3 text-sm leading-relaxed text-gray-600">

                        Incentivo à escrita e à criatividade por meio
                        da produção textual e desenvolvimento de ideias.

                    </p>

                    <p class="mt-4 text-sm font-semibold text-blue-700">
                        Todas as turmas
                    </p>

                </div>


                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-7 shadow-sm">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl">
                        📰
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Jornal Escolar
                    </h3>

                    <p class="mt-3 text-sm leading-relaxed text-gray-600">

                        Produção de um jornal escolar que divulga notícias,
                        eventos e informações relevantes para a comunidade
                        escolar, promovendo a comunicação e o engajamento
                        dos estudantes.

                    </p>

                    <p class="mt-4 text-sm font-semibold text-blue-700">
                        2° e 3° anos do Ensino Médio
                    </p>
                </div>
            </div>
        </div>
    </section>



    <section id="projetos" class="bg-blue-50 py-20">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center">
                <span class="text-sm font-bold uppercase tracking-wider text-blue-700">
                    Aprender fazendo
                </span>
                <h2 class="mt-3 text-3xl font-black text-blue-950 md:text-4xl">
                    Projetos
                </h2>
            </div>
            <div class="mt-10 flex justify-center">
                <div class="w-full max-w-2xl rounded-2xl bg-white p-8 shadow-sm">
                    <div class="text-4xl">💻</div>
                    <h3 class="mt-5 text-2xl font-bold text-blue-950"> Projeto Integrador </h3>
                    <p class="mt-3 leading-relaxed text-gray-600">
                        Projeto do curso Técnico em Informática que proporciona
                        aos alunos a oportunidade de colocar em prática os
                        conhecimentos adquiridos ao longo da formação, por meio
                        do desenvolvimento de projetos.
                    </p>
                    <div class="mt-6 rounded-xl bg-blue-50 p-4 text-sm font-semibold text-blue-800"> Técnico em Informática </div>
                </div>
            </div>
        </div>
    </section>


    <section id="feiras" class="bg-white py-20">

        <div class="mx-auto max-w-6xl px-6">

            <div class="text-center">

                <span class="text-sm font-bold uppercase tracking-wider text-blue-700">
                    Eventos
                </span>

                <h2 class="mt-3 text-3xl font-black text-blue-950 md:text-4xl">
                    Feiras e eventos
                </h2>

                <p class="mx-auto mt-4 max-w-2xl text-gray-600">
                    Momentos de aprendizagem, criatividade e compartilhamento
                    dos trabalhos desenvolvidos pelos estudantes.
                </p>

            </div>


            <div class="mt-10 grid gap-6 md:grid-cols-3">


                <div class="rounded-2xl border border-gray-100 bg-white p-7 shadow-md">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl">
                        🎭
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Feira Cultural
                    </h3>

                    <p class="mt-3 leading-relaxed text-gray-600">

                        Promove a valorização da cultura, da diversidade
                        e da criatividade dos alunos por meio de apresentações,
                        exposições e atividades interativas.

                    </p>

                </div>


                <div class="rounded-2xl border border-gray-100 bg-white p-7 shadow-md">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl">
                        💼
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Feira do Empreendedorismo
                    </h3>

                    <p class="mt-3 leading-relaxed text-gray-600">

                        Estimula o espírito empreendedor, a criatividade
                        e o desenvolvimento de ideias e projetos,
                        aproximando os alunos do universo dos negócios.

                    </p>

                </div>


                <div class="rounded-2xl border border-gray-100 bg-white p-7 shadow-md">

                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl">
                        🧠
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-blue-950">
                        Feira do Conhecimento
                    </h3>

                    <p class="mt-3 leading-relaxed text-gray-600">

                        Espaço para apresentar pesquisas, experiências e
                        projetos desenvolvidos pelos estudantes, incentivando
                        a curiosidade e a troca de conhecimentos.

                    </p>

                </div>

            </div>

        </div>

    </section>



    <section id="missao" class="bg-blue-900 py-20 text-white">

        <div class="mx-auto max-w-6xl px-6">

            <div class="text-center">

                <span class="text-sm font-bold uppercase tracking-wider text-blue-200">
                    Nossa essência
                </span>

                <h2 class="mt-3 text-3xl font-black md:text-4xl">
                    Missão e Valores
                </h2>

            </div>


            <div class="mt-12 grid gap-8 md:grid-cols-2">


                <div class="rounded-2xl bg-white/10 p-8">

                    <div class="text-4xl">
                        🎯
                    </div>

                    <h3 class="mt-5 text-2xl font-bold">
                        Nossa missão
                    </h3>

                    <p class="mt-4 leading-relaxed text-blue-100">

                        Nossa escola tem como missão promover uma educação
                        de qualidade, inclusiva e transformadora, preparando
                        os estudantes para os desafios acadêmicos,
                        profissionais e sociais.

                    </p>

                </div>


                <div class="rounded-2xl bg-white/10 p-8">

                    <div class="text-4xl">
                        ⭐
                    </div>

                    <h3 class="mt-5 text-2xl font-bold">
                        Nossos valores
                    </h3>

                    <p class="mt-4 leading-relaxed text-blue-100">

                        Valorizamos o respeito, a ética, a diversidade,
                        a responsabilidade, a criatividade, a inovação,
                        a autonomia e o protagonismo dos estudantes.

                    </p>

                </div>

            </div>


            <div class="mt-10 flex flex-wrap justify-center gap-3">

                <span class="rounded-full bg-white/10 px-5 py-2 text-sm">Respeito</span>

                <span class="rounded-full bg-white/10 px-5 py-2 text-sm">Ética</span>

                <span class="rounded-full bg-white/10 px-5 py-2 text-sm">Diversidade</span>

                <span class="rounded-full bg-white/10 px-5 py-2 text-sm">Responsabilidade</span>

                <span class="rounded-full bg-white/10 px-5 py-2 text-sm">Criatividade</span>

                <span class="rounded-full bg-white/10 px-5 py-2 text-sm">Inovação</span>

                <span class="rounded-full bg-white/10 px-5 py-2 text-sm">Autonomia</span>

                <span class="rounded-full bg-white/10 px-5 py-2 text-sm">Protagonismo</span>

            </div>


            <p class="mx-auto mt-10 max-w-3xl text-center leading-relaxed text-blue-100">

                Incentivamos o desenvolvimento integral e a construção
                de uma sociedade mais justa e consciente.

            </p>

        </div>

    </section>


    <section id="depoimentos" class="bg-white py-20">

        <div class="mx-auto max-w-6xl px-6">


            <div class="text-center">

                <span class="text-sm font-bold uppercase tracking-wider text-blue-700">
                    O que dizem sobre nós
                </span>

                <h2 class="mt-3 text-3xl font-black text-blue-950 md:text-4xl">
                    Depoimentos
                </h2>

                <p class="mt-4 text-gray-600">
                    Veja a opinião de quem faz parte da nossa comunidade escolar.
                </p>

            </div>


            <?php if (empty($depoimentos)): ?>

                <div class="mt-10 rounded-2xl bg-gray-50 p-8 text-center">

                    <p class="text-gray-500">
                        Ainda não há depoimentos aprovados.
                    </p>

                </div>

            <?php else: ?>

                <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                    <?php foreach ($depoimentos as $depoimento): ?>

                        <div class="rounded-2xl bg-gray-50 p-6 shadow-sm">

                            <div class="flex items-center justify-between">

                                <h3 class="font-bold text-blue-950">

                                    <?= htmlspecialchars($depoimento["nome"]) ?>

                                </h3>

                                <span class="text-yellow-500">

                                    <?= str_repeat("★", (int)$depoimento["avaliacao"]) ?>

                                </span>

                            </div>


                            <p class="mt-4 leading-relaxed text-gray-600">

                                <?= nl2br(htmlspecialchars($depoimento["depoimento"])) ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="py-16 bg-white">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-blue-900 mb-4"> Compartilhe sua experiência </h2>
            <p class="text-gray-600 mb-8"> Conte para nós como foi sua experiência no SESC-SENAC. </p>
            <button type="button" id="abrirDepoimento" class="bg-blue-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-800 transition"> Deixar um depoimento </button>
        </div>
    </section>
    <div id="modalDepoimento" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 p-4">
        <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 relative">
            <button type="button" id="fecharDepoimento" class="text-gray-500 hover:text-gray-800 text-2xl leading-none ml-4"> &times; </button>
            <h2 class="text-2xl font-bold text-blue-900 mb-2">
                Deixe seu depoimento
            </h2>
            <p class="text-gray-500 mb-6">
                Sua opinião é muito importante para nós.
            </p>
            <form action="src/admin/salvar_comentarios.php" method="POST" class="space-y-4">
                <div>
                    <label for="nome" class="block text-sm font-semibold text-gray-700 mb-1"> Nome </label>
                    <input type="text" id="nome" name="nome" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-900" placeholder="Digite seu nome">
                </div>
                <div>
                    <label for="avaliacao" class="block text-sm font-semibold text-gray-700 mb-1"> Avaliação </label>
                    <select id="avaliacao" name="avaliacao" required class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-900">
                        <option value="">Selecione uma avaliação</option>
                        <option value="5">⭐⭐⭐⭐⭐ - Excelente</option>
                        <option value="4">⭐⭐⭐⭐ - Muito bom</option>
                        <option value="3">⭐⭐⭐ - Bom</option>
                        <option value="2">⭐⭐ - Regular</option>
                        <option value="1">⭐ - Precisa melhorar</option>
                    </select>
                </div>
                <div>
                    <label for="depoimento" class="block text-sm font-semibold text-gray-700 mb-1"> Seu depoimento </label>
                    <textarea id="depoimento" name="depoimento" rows="5" required class="w-full border border-gray-300 rounded-lg px-4 py-3 resize-none focus:outline-none focus:ring-2 focus:ring-blue-900" placeholder="Escreva seu depoimento..."></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-900 text-white py-3 rounded-lg font-semibold hover:bg-blue-800 transition">
                    Enviar depoimento
                </button>
            </form>
        </div>
    </div>



    <footer class="bg-blue-50 text-black">

        <div class="mx-auto max-w-7xl px-6 py-12">

            <div class="grid gap-8 md:grid-cols-3">


                <div>

                    <img
                        src="<?= $logo ?>?v=<?= versaoImagem('imagem6.png') ?>"
                        alt="Logo Sesc Senac"
                        class="h-16 w-auto">

                    <p class="mt-4 max-w-sm text-sm leading-relaxed text-blue-500">

                        Ensino Médio Sesc Senac:
                        conhecimento, criatividade e oportunidades
                        para transformar o futuro.

                    </p>

                </div>


                <div>

                    <h3 class="font-bold">
                        Navegação
                    </h3>

                    <div class="mt-4 flex flex-col gap-2 text-sm text-blue-500">

                        <a href="#inicio">
                            Início
                        </a>

                        <a href="#sobrenos">
                            Sobre nós
                        </a>

                        <a href="#cursos">
                            Cursos
                        </a>

                        <a href="#projetos">
                            Projetos
                        </a>

                        <a href="#feiras">
                            Feiras
                        </a>

                        <a href="#atividades">
                            Atividades
                        </a>

                        <a href="#missao">
                            Missão e Valores
                        </a>

                    </div>

                </div>


                <div>

                    <h3 class="font-bold">
                        Ensino Médio
                    </h3>

                    <p class="mt-4 text-sm leading-relaxed text-blue-500">

                        Uma educação voltada para o desenvolvimento
                        acadêmico, profissional e pessoal dos estudantes.

                    </p>

                </div>

            </div>


            <div class="mt-6">

                <a
                    href="./src/login.php"
                    class="hover:text-blue-700 transition">
                    Área do Administrador
                </a>

            </div>

        </div>


        <div class="border-t border-white/10 pt-6 pb-6 text-center text-sm text-blue-500">

            © 2026 Ensino Médio Sesc Senac. Todos os direitos reservados.

        </div>

    </footer>


    <script src="./src/js/index.js"></script>

    <script>
        const abrirDepoimento = document.getElementById("abrirDepoimento");
        const fecharDepoimento = document.getElementById("fecharDepoimento");
        const modalDepoimento = document.getElementById("modalDepoimento");

        abrirDepoimento.addEventListener("click", () => {
            modalDepoimento.classList.remove("hidden");
            modalDepoimento.classList.add("flex");
        });

        fecharDepoimento.addEventListener("click", () => {
            modalDepoimento.classList.add("hidden");
            modalDepoimento.classList.remove("flex");
        });

        modalDepoimento.addEventListener("click", (evento) => {
            if (evento.target === modalDepoimento) {
                modalDepoimento.classList.add("hidden");
                modalDepoimento.classList.remove("flex");
            }
        });
    </script>


</body>

</html>