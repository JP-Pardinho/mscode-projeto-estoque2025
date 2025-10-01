<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MS Code - Novo Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

<main>
    <div class="container py-5">
        <div class="mb-4">
            <h1>Novo usuário</h1>
        </div>

        <div class="w-50 mt-2">
            <form action="/usuario/salvarUsuario" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo:</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>

                <div class="mb-3">
                    <label for="confirmacao" class="form-label">Confirme sua senha:</label>
                    <input type="password" class="form-control" id="confirmacao" name="confirmacao" required>
                </div>

                <div id="mensagemErro" class="mb-3 text-danger"></div>

                <button id="btnSalvar" type="submit" class="btn btn-primary" disabled>Salvar</button>
                
            </form>
        </div>
    </div>
</main>

<script>
    const senhaInput = document.getElementById('senha');
    const confirmacaoInput = document.getElementById('confirmacao');
    const btnSalvar = document.getElementById('btnSalvar');
    const mensagemErro = document.getElementById('mensagemErro');

    function validarSenhas() {
        const senha = senhaInput.value;
        const confirmacao = confirmacaoInput.value;

        if (senha !== confirmacao && confirmacao !== '') {
            mensagemErro.textContent = 'As senhas precisam ser iguais!';
            btnSalvar.disabled = true;

            if (senhaInput.value.length > 0 && senhaInput.value.length < 6) {
                event.preventDefault();
                mensagemErro.textContent = 'A senha deve ter pelo menos 6 caracteres.';
                btnSalvar.disabled = true;
                return;
            }
        } else {
            mensagemErro.textContent = '';
            if (senha && confirmacao && senha === confirmacao) {
                btnSalvar.disabled = false;
            } else {
                btnSalvar.disabled = true;
            }
        }
    }

    senhaInput.addEventListener('keyup', validarSenhas);
    confirmacaoInput.addEventListener('keyup', validarSenhas);
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous">
</script>
    
</body>

</html>