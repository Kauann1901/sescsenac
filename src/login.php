<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/output.css" rel="stylesheet">
    <title>Login</title>
</head>
<!DOCTYPE html>
<html lang="pt-BR">
 
<head>
 
    <meta charset="UTF-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Login Administrador</title>
 
 
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            min-height: 100vh;
            background:
                linear-gradient(
                    rgba(17, 24, 39, 0.65),
                    rgba(17, 24, 39, 0.65)
                ),
                #1f2937;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
 
        }
 
        .cadastro-box {
            width: 100%;
            max-width: 650px;
            background: #ffffff;
            border-radius: 24px;
            padding: 45px;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.35),
                0 10px 20px rgba(0, 0, 0, 0.20);
        }
 
        .cadastro-header {
            text-align: center;
            margin-bottom: 35px;
        }
 
        .cadastro-title {
            margin: 0 0 10px 0;
            font-size: 36px;
            font-weight: 700;
            color: #111827;
        }
        .cadastro-subtitle {
            margin: 0;
            font-size: 18px;
            color: #6b7280;
        }
        .campo {
            margin-bottom: 24px;
        }
        .campo label {
            display: block;
            margin-bottom: 10px;
            font-size: 19px;
            font-weight: 600;
            color: #374151;
        }
        .campo input {
            width: 100%;
            height: 65px;
            padding: 0 18px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            background: #ffffff;
            color: #111827;
            font-size: 18px;
            outline: none;
            transition: 0.2s;
        }
        .campo input::placeholder {
            color: #9ca3af;
        }
        .campo input:focus {
            border-color: #1e3a8a;
            box-shadow:
                0 0 0 3px rgba(30, 58, 138, 0.15);
        }
        .senha-container {
            position: relative;
        }
        .senha-container input {
            padding-right: 65px;
        }
        .mostrar-senha {
            position: absolute;
            top: 0;
            right: 0;
            width: 60px;
            height: 65px;
            border: none;
            background: transparent;
            color: #6b7280;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .mostrar-senha:hover {
            color: #1e3a8a;
        }
        .mostrar-senha svg {
            width: 28px;
            height: 28px;
        }
        .botao-cadastrar {
            width: 100%;
            height: 80px;
            margin-top: 10px;
            border: none;
            border-radius: 16px;
            background: #1e3a8a;
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            cursor: pointer;
            box-shadow:
                0 8px 18px rgba(0, 0, 0, 0.20);
            transition: 0.2s;
 
        }
        .botao-cadastrar:hover {
            background: #1e40af;
            box-shadow:
                0 12px 25px rgba(0, 0, 0, 0.25);
        }
        .divisor {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 35px 0;
        }
 
        .linha {
            flex: 1;
            height: 1px;
            background: #d1d5db;
 
        }
        .divisor span {
            font-size: 20px;
            font-weight: 600;
            color: #374151;
        }
        .login-link {
            margin: 0;
            text-align: center;
            font-size: 20px;
            color: #374151;
        }
        .login-link a {
            color: #1e3a8a;
            font-weight: 700;
            text-decoration: none;
        }
        .login-link a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            body {
                padding: 25px 15px;
            }
            .cadastro-box {
                padding: 30px 25px;
                border-radius: 20px;
            }
            .cadastro-title {
                font-size: 30px;
            }
            .cadastro-subtitle {
                font-size: 16px;
            }
            .campo label {
                font-size: 18px;
            }
            .campo input {
                height: 58px;
                font-size: 16px;
            }
            .mostrar-senha {
                height: 58px;
            }
            .botao-cadastrar {
                height: 65px;
                font-size: 21px;
 
            }
            .login-link {
                font-size: 17px;
            }
        }
    </style>
</head>
<body>
 
    <div class="cadastro-box">
        <div class="cadastro-header">
            <h1 class="cadastro-title">
                Login Administrador
            </h1>
            <p class="cadastro-subtitle">
                Preencha os dados abaixo para acessar o painel administrativo.
            </p>
        </div>
        <form
            action="index.php"
            method="GET">
            <div class="campo">
                <label for="nome">
                    Nome completo
                </label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    placeholder="Digite seu  nome completo"
                    required>
 
            </div>
            <div class="campo">
                <label for="email">
                    E-mail
                </label>
 
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Digite seu e-mail"
                    required>
            </div>
            <div class="campo">
                <label for="senha">
                    Senha
                </label>
                <div class="senha-container">
                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        placeholder="Crie uma senha"
                        required>
 
                    <button
                        type="button"
                        class="mostrar-senha"
                        id="mostrarSenha"
                        aria-label="Mostrar senha">
 
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor">
 
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.644C3.423 7.51 7.36 4.5 12 4.5c4.64 0 8.577 3.01 9.964 7.178.07.21.07.434 0 .644C20.577 16.49 16.64 19.5 12 19.5c-4.64 0-8.577-3.01-9.964-7.178Z" />
 
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
 
                        </svg>
                    </button>
                </div>
            </div>
            <div class="campo">
                <label for="confirmarSenha">
                    Confirmar senha
                </label>
                <div class="senha-container">
                    <button
                        type="button"
                        class="mostrar-senha"
                        id="mostrarConfirmarSenha"
                        aria-label="Mostrar senha">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor">
 
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.644C3.423 7.51 7.36 4.5 12 4.5c4.64 0 8.577 3.01 9.964 7.178.07.21.07.434 0 .644C20.577 16.49 16.64 19.5 12 19.5c-4.64 0-8.577-3.01-9.964-7.178Z" />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>
            </div>
            <button
                type="submit"
                class="botao-cadastrar">
                Entrar  
            </button>
        </form>
        <div class="divisor">
            <div class="linha"></div>
            <span>
                ou
            </span>
            <div class="linha"></div>
        </div>
    </div>
    <script>
 
        const senha =
            document.getElementById("senha");
        const mostrarSenha =
            document.getElementById("mostrarSenha");
        mostrarSenha.addEventListener(
            "click",
            function () {
                if (senha.type === "password") {
                    senha.type = "text";
                    mostrarSenha.setAttribute(
                        "aria-label",
                        "Ocultar senha"
                    );
                } else {
                    senha.type = "password";
                    mostrarSenha.setAttribute(
                        "aria-label",
                        "Mostrar senha"
                    );
                }
            }
        );
 
        const confirmarSenha =
            document.getElementById("confirmarSenha");
        const mostrarConfirmarSenha =
            document.getElementById("mostrarConfirmarSenha");
        mostrarConfirmarSenha.addEventListener(
            "click",
            function () {
                if (confirmarSenha.type === "password") {
                    confirmarSenha.type = "text";
                    mostrarConfirmarSenha.setAttribute(
                        "aria-label",
                        "Ocultar senha"
                    );
                } else {
                    confirmarSenha.type = "password";
                    mostrarConfirmarSenha.setAttribute(
                        "aria-label",
                        "Mostrar senha"
                    );
                }
            }
        );
 
        const formulario =
            document.querySelector("form");
        formulario.addEventListener(
            "submit",
            function (event) {
                if (
                    senha.value !==
                    confirmarSenha.value
                ) {
                    event.preventDefault();
                    alert(
                        "As senhas não são iguais."
                    );
                    confirmarSenha.focus();
                }
            }
        );
    </script>
</body>
</html>
 
<!DOCTYPE html>
<html lang="pt-BR">
 
<head>
 
    <meta charset="UTF-8">
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="./output.css" rel="stylesheet">
 
    <title>Landing Page</title>
    <style>
        #loginModal {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.65);
        }
        #loginModal.hidden {
            display: none;
        }
        #loginModal .login-box {
            width: 100%;
            max-width: 650px;
            background: #ffffff;
            border-radius: 24px;
            padding: 45px;
            box-shadow:
                0 25px 50px rgba(0, 0, 0, 0.35),
                0 10px 20px rgba(0, 0, 0, 0.20);
        }
        .login-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 35px;
        }
        .login-title {
            margin: 0;
            font-size: 36px;
            font-weight: 700;
            color: #111827;
        }
        #fecharLogin {
            border: none;
            background: transparent;
            color: #9ca3af;
            font-size: 36px;
            line-height: 1;
            cursor: pointer;
            padding: 5px 10px;
        }
        #fecharLogin:hover {
         color: #111827;
        }
        .login-field {
            margin-bottom: 25px;
        }
        .login-field label {
            display: block;
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: 600;
            color: #374151;
        }
        .login-input {
            width: 100%;
            height: 65px;
            box-sizing: border-box;
            padding: 0 18px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            background: #ffffff;
            color: #111827;
            font-size: 18px;
            outline: none;
        }
        .login-input::placeholder {
            color: #9ca3af;
        }
        .login-input:focus {
            border-color: #1e3a8a;
            box-shadow:
                0 0 0 3px rgba(30, 58, 138, 0.15);
        }
        .senha-container {
            position: relative;
        }
        .senha-container .login-input {
            padding-right: 65px;
        }
        #mostrarSenha {
            position: absolute;
            top: 0;
            right: 0;
            height: 65px;
            width: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            background: transparent;
            color: #6b7280;
            cursor: pointer;
        }
        #mostrarSenha:hover {
            color: #1e3a8a;
        }
        #mostrarSenha svg {
            width: 28px;
            height: 28px;
        }
        .login-button {
            width: 100%;
            height: 80px;
            margin-top: 10px;
            border: none;
            border-radius: 16px;
            background: #1e3a8a;
            color: #ffffff;
            font-size: 24px;
            font-weight: 700;
            cursor: pointer;
            box-shadow:
                0 8px 18px rgba(0, 0, 0, 0.20);
            transition: 0.2s;
        }
        .login-button:hover {
            background: #1e40af;
            box-shadow:
                0 12px 25px rgba(0, 0, 0, 0.25);
        }
        .login-divider {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 35px 0;
        }
        .login-divider-line {
            flex: 1;
            height: 1px;
            background: #d1d5db;
        }
        .login-divider span {
            font-size: 20px;
            font-weight: 600;
            color: #374151;
        }
        .login-register {
            margin: 0;
            text-align: center;
            font-size: 20px;
            color: #374151;
        }
        .login-register a {
            color: #1e3a8a;
            font-weight: 700;
            text-decoration: none;
        }
        .login-register a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            #loginModal .login-box {
                padding: 30px 25px;
                max-width: 95%;
            }
            .login-title {
                font-size: 30px;
            }
            .login-field label {
                font-size: 18px;
            }
            .login-input {
                height: 58px;
                font-size: 16px;
            }
            #mostrarSenha {
                height: 58px;
            }
            .login-button {
                height: 65px;
                font-size: 21px;
            }
            .login-register {
                font-size: 17px;
            }
        }
    </style>
</head>
<body>
    <div
        id="loginModal"
        class="hidden">
        <div class="login-box">
            <div class="login-header">
                <h2 class="login-title">
                    Login
                </h2>
                <button
                    type="button"
                    id="fecharLogin"
                    aria-label="Fechar">
                    &times;
                </button>
            </div>
            <form action="index.php" method="GET">
                <div class="login-field">
                    <label for="usuario">
                        Nome ou e-mail
                    </label>
                    <input
                        type="text"
                        id="usuario"
                        name="usuario"
                        required
                        placeholder="Digite seu nome ou e-mail"
                        class="login-input">
                </div>
                <div class="login-field">
                    <label for="senha">
                        Senha
                    </label>
                    <div class="senha-container">
                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            required
                            placeholder="Digite sua senha"
                            class="login-input">
                        <button
                            type="button"
                            id="mostrarSenha"
                            aria-label="Mostrar senha">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.644C3.423 7.51 7.36 4.5 12 4.5c4.64 0 8.577 3.01 9.964 7.178.07.21.07.434 0 .644C20.577 16.49 16.64 19.5 12 19.5c-4.64 0-8.577-3.01-9.964-7.178Z" />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="submit" class="login-button" src="./admin/index2.php">
                    Entrar
                </button>
            </form>
        </div>
    </div>
    <script>
        const btnLogin =
            document.getElementById("btnLogin");
        const loginModal =
            document.getElementById("loginModal");
        const fecharLogin =
            document.getElementById("fecharLogin");
        const mostrarSenha =
            document.getElementById("mostrarSenha");
        const senha =
            document.getElementById("senha");
        btnLogin.addEventListener("click", function () {
            loginModal.classList.remove("hidden");
        });
        fecharLogin.addEventListener("click", function () {
            loginModal.classList.add("hidden");
        });
        loginModal.addEventListener("click", function (event) {
            if (event.target === loginModal) {
                loginModal.classList.add("hidden");
            }
        });
        document.addEventListener("keydown", function (event) {
            if (event.key === "Escape") {
                loginModal.classList.add("hidden");
            }
        });
        mostrarSenha.addEventListener("click", function () {
            if (senha.type === "password") {
                senha.type = "text";
                mostrarSenha.setAttribute(
                    "aria-label",
                    "Ocultar senha"
                );
            } else {
                senha.type = "password";
                mostrarSenha.setAttribute(
                    "aria-label",
                    "Mostrar senha"
                );
            }
        });
    </script>
</body>
</html>