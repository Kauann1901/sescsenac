
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/output.css" rel="stylesheet">
    <title>Ensino Médio Sesc Senac</title>
</head>

<body class="bg-gray-50">
    <nav class="fixed top-0 left-0 right-0 z-50 bg-sky-100 shadow-lg after:pointer-events-none after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-white/10">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-300 hover:bg-white/10 hover:text-white">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Abrir menu principal</span>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6 in-aria-expanded:hidden">
                            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="size-6 not-in-aria-expanded:hidden">
                            <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start ">
                    <a href="#inicio" class="flex shrink-0 items-center">
                        <img src="./img/LogoColorida.png" alt="Logo Sesc Senac" class="h-14 w-auto">
                    </a>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-2 mt-2">
                            <a href="#sobrenos" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Sobre nós
                            </a>

                            <a href="#cursos" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Cursos
                            </a>

                            <a href="#projetos" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Projetos
                            </a>

                            <a href="#feiras" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Feiras
                            </a>

                            <a href="#atividades" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Atividades
                            </a>

                            <a href="#missao" class="rounded-md px-3 py-2 text-sm font-medium text-black hover:bg-white/10 hover:text-white transition">
                                Missão e Valores
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <el-disclosure id="mobile-menu" hidden class="block sm:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <a href="#inicio" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/10 hover:text-white">
                    Início
                </a>

                <a href="#sobrenos" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/10 hover:text-white">
                    Sobre nós
                </a>

                <a href="#cursos" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/10 hover:text-white">
                    Cursos
                </a>

                <a href="#projetos" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/10 hover:text-white">
                    Projetos
                </a>

                <a href="#feiras" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/10 hover:text-white">
                    Feiras
                </a>

                <a href="#atividades" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/10 hover:text-white">
                    Atividades Extracurriculares
                </a>

                <a href="#missao" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-white/10 hover:text-white">
                    Missão e Valores
                </a>
            </div>
        </el-disclosure>

    </nav>
    <div class="h-16"></div>
    <section id="inicio" class="relative w-full overflow-hidden group">
        <div id="slider" class="flex transition-transform duration-700 ease-in-out h-72 md:h-[500px]">
            <div class="relative min-w-full h-full">
                <img src="./img/imagem2.jpg" class="w-full h-full object-cover" alt="Ensino Médio">
                <div class="absolute inset-0 bg-black/50"></div>
            </div>
            <div class="relative min-w-full h-full">
                <img src="./img/imagem3.jpg" class="w-full h-full object-cover" alt="Alunos">
                <div class="absolute inset-0 bg-black/50"></div>
            </div>
            <div class="relative min-w-full h-full">
                <img src="./img/imagem4.jpg" class="w-full h-full object-cover" alt="Educação">
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
        <button id="prev" class="absolute z-20 top-1/2 left-4 -translate-y-1/2 bg-white/80 p-3 rounded-full shadow hover:bg-white text-gray-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"> </button>
        <button id="next" class="absolute z-20 top-1/2 right-4 -translate-y-1/2 bg-white/80 p-3 rounded-full shadow hover:bg-white text-gray-800 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></button>
    </section>
    <section class="relative overflow-hidden bg-white py-16">
        <div class="absolute right-0 top-0 h-full w-24 bg-blue-50 -skew-x-6"> </div>
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
                <h1 class="mt-3 text-4xl font-black leading-tight text-blue-950 md:text-5xl"> Ensino Médio para <span class="text-blue-700"> transformar seu futuro </span></h1>
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
                <img src="https://www.sescpr.com.br/wp-content/uploads/2019/02/WhatsApp-Image-2024-07-15-at-13.53.21-1.jpeg" alt="Biblioteca" class="h-64 w-full rotate-[5deg] rounded-2xl object-cover shadow-xl">
            </div>
        </div>
    </section>
    <section id="sobrenos" class="bg-blue-50 py-20">
        <div class="mx-auto max-w-6xl px-6 text-center">
            <span class="text-sm font-bold uppercase tracking-wider text-blue-700"> Educação integral </span>
            <h2 class="mt-3 text-3xl font-black text-blue-950 md:text-4xl">Mais do que aprender, preparar para a vida</h2>
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
                <div class="rounded-2xl bg-blue-50 p-8 text-center shadow-sm hover:shadow-lg transition">
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
                <div class="rounded-2xl bg-blue-50 p-8 text-center shadow-sm hover:shadow-lg transition">
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
                <div class="rounded-2xl bg-blue-50 p-8 text-center shadow-sm hover:shadow-lg transition">
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
                <div class="rounded-2xl bg-white p-8 shadow-sm hover:-translate-y-1 hover:shadow-xl transition">
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
                <div class="rounded-2xl bg-white p-8 shadow-sm hover:-translate-y-1 hover:shadow-xl transition">
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
                <span class="text-sm font-bold uppercase tracking-wider text-blue-700">
                    Experiências
                </span>
                <h2 class="mt-3 text-3xl font-black text-blue-950 md:text-4xl">
                    Atividades Extracurriculares
                </h2>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">
                    Atividades que ampliam as experiências dos estudantes
                    para além da sala de aula.
                </p>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-7 shadow-sm hover:shadow-lg transition">
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
                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-7 shadow-sm hover:shadow-lg transition">
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
                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-7 shadow-sm hover:shadow-lg transition">
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
                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-7 shadow-sm hover:shadow-lg transition">
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
                <div class="rounded-2xl border border-blue-100 bg-blue-50 p-7 shadow-sm hover:shadow-lg transition">
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
            <div class="mt-10 grid gap-6 md:grid-cols-2">
                <div class="rounded-2xl bg-white p-8 shadow-sm hover:shadow-xl transition">
                    <div class="text-4xl">💻</div>
                    <h3 class="mt-5 text-2xl font-bold text-blue-950">
                        Projeto Integrador
                    </h3>
                    <p class="mt-3 leading-relaxed text-gray-600">
                        Projeto do curso Técnico em Informática que proporciona
                        aos alunos a oportunidade de colocar em prática os
                        conhecimentos adquiridos ao longo da formação, por meio
                        do desenvolvimento de projetos.
                    </p>
                    <div class="mt-6 rounded-xl bg-blue-50 p-4 text-sm font-semibold text-blue-800">
                        Técnico em Informática
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="feiras" class="bg-white py-20">
        <div class="mx-auto max-w-6xl px-6">
            <div class="text-center">
                <spanclass="text-sm font-bold uppercase tracking-wider text-blue-700">Eventos</spanclass=>
                    <h2 class="mt-3 text-3xl font-black text-blue-950 md:text-4xl">Feiras e eventos</h2>
                    <p class="mx-auto mt-4 max-w-2xl text-gray-600">Momentos de aprendizagem, criatividade e compartilhamentodos trabalhos desenvolvidos pelos estudantes.</p>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div class="group rounded-2xl border border-gray-100 bg-white p-7 shadow-md hover:-translate-y-2 hover:shadow-xl transition">
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl">🎭</div>
                    <h3 class="mt-5 text-xl font-bold text-blue-950">Feira Cultural</h3>
                    <p class="mt-3 leading-relaxed text-gray-600">Promove a valorização da cultura, da diversidadee da criatividade dos alunos por meio de apresentações,exposições e atividades interativas.</p>
                </div>
                <div class="group rounded-2xl border border-gray-100 bg-white p-7 shadow-md hover:-translate-y-2 hover:shadow-xl transition">
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl">💼</div>
                    <h3 class="mt-5 text-xl font-bold text-blue-950">Feira do Empreendedorismo</h3>
                    <p class="mt-3 leading-relaxed text-gray-600">Estimula o espírito empreendedor, a criatividade e o desenvolvimento de ideias e projetos,aproximando os alunos do universo dos negócios.</p>
                </div>
                <div
                    class="group rounded-2xl border border-gray-100 bg-white p-7 shadow-md hover:-translate-y-2 hover:shadow-xl transition">
                    <div class="flex h-14 w-14 items-center justify-center rounded-full bg-blue-700 text-2xl"> 🧠 </div>
                    <h3 class="mt-5 text-xl font-bold text-blue-950"> Feira do Conhecimento</h3>
                    <p class="mt-3 leading-relaxed text-gray-600">Espaço para apresentar pesquisas, experiências e projetos desenvolvidos pelos estudantes, incentivando a curiosidade e a troca de conhecimentos.</p>
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
                <div class="rounded-2xl bg-white/10 p-8 backdrop-blur-sm">
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
                <div class="rounded-2xl bg-white/10 p-8 backdrop-blur-sm">
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
    <section id="comentarios" class="py-16 bg-gray-100">

        <div class="max-w-5xl mx-auto px-6">

            <h2 class="text-3xl font-bold text-blue-900 text-center mb-10">
                Comentários
            </h2>


            <div class="bg-white p-6 rounded-xl shadow mb-10">

                <h3 class="text-xl font-bold mb-5">
                    Deixe seu comentário
                </h3>

                <form action="salvar_comentario.php" method="POST">

                    <input
                        type="text"
                        name="nome"
                        placeholder="Seu nome"
                        required
                        maxlength="100"
                        class="w-full border rounded-lg p-3 mb-4">

                    <textarea
                        name="comentario"
                        placeholder="Digite seu comentário..."
                        required
                        maxlength="1000"
                        rows="5"
                        class="w-full border rounded-lg p-3 mb-4"></textarea>

                    <button
                        type="submit"
                        class="bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-blue-800">

                        Enviar comentário

                    </button>

                </form>

            </div>


            <?php

                require_once __DIR__ . '/database/conexao.php';

            $stmt = $pdo->query("
            SELECT *
            FROM comentarios
            WHERE status = 'aprovado'
            ORDER BY data_criacao DESC
        ");

            $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            ?>


            <div class="space-y-5">

                <?php foreach ($comentarios as $comentario): ?>

                    <div class="bg-white p-5 rounded-xl shadow">

                        <h3 class="font-bold text-lg">
                            <?= htmlspecialchars($comentario['nome']) ?>
                        </h3>

                        <p class="text-gray-700 mt-2">
                            <?= nl2br(htmlspecialchars($comentario['comentario'])) ?>
                        </p>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>
    <footer class="bg-blue-50 text-black">
        <div class="mx-auto max-w-7xl px-6 py-12">
            <div class="grid gap-8 md:grid-cols-3">
                <div>
                    <img src="./img/LogoColorida.png" alt="Logo" class="h-40 w-auto">
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
                        <a href="#inicio" class="hover:text-black transition"> Início</a>
                        <a href="#sobrenos" class="hover:text-black transition"> Sobre nós</a>
                        <a href="#cursos" class="hover:text-black transition"> Cursos</a>
                        <a href="#projetos" class="hover:text-black transition"> Projetos</a>
                        <a href="#feiras" class="hover:text-black transition"> Feiras</a>
                        <a href="#atividades" class="hover:text-black transition"> Atividades</a>
                        <a href="#missao" class="hover:text-black transition"> Missão e Valores</a>
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
            <div class="mt-10 border-t border-white/10 pt-6 text-center text-sm text-blue-500">
                © 2026 Ensino Médio Sesc Senac. Todos os direitos reservados.
            </div>
        </div>
    </footer>

    <script src="./js/index.js"></script>

</body>

</html>