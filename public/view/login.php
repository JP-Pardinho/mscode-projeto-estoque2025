<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MS Code - Estoque 5</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../assets/css/styles.css" rel="stylesheet">
    <link href="../assets/css/login.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form action="/login" method="POST">
            <div class="d-flex align-items-center mb-4">
                <img class="p-0" src="../assets/images/logotipo.svg" width="72" height="57">

                <h1 class="h3 fw-normal my-0 ms-2">Sistema Estoque</h1>
            </div>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <label for="email">Email</label>
            </div>

            <div class="form-floating">
                <input type="password" name="senha" class="form-control" id="senha" placeholder="Password">
                <label for="senha">Senha</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="exibirSenha">
                <label class="form-check-label" for="exibirSenha">
                    Exibir senha
                </label>
            </div>

            <div></div>

            <div id="cadastrar" class="form-text mt-3 mb-3">
                <a href="/tela-cadastro">Clique aqui caso ainda não possua cadastro</a>
            </div>

            <button class="btn btn-primary w-100 py-2 " type="submit">Acessar</button>
            <p class="mt-5 mb-3 text-body-secondary text-center">&copy; MS Code 2025</p>
        </form>
    </main>

    <script>
        const exibirSenhaCheckbox = document.getElementById('exibirSenha');
        const senhaInput = document.getElementById('senha');

        exibirSenhaCheckbox.addEventListener('change', function() {
            senhaInput.type = this.checked ? 'text' : 'password';
        });
    </script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>