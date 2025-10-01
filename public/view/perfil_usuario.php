<?php
session_start();

if ($_SESSION['usuario_logado'] != 1) {
    header('Location: /error?mensagem=Por favor, faça login para acessar essa página.');
    exit();
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MS Code - Perfil Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

<main>
    <div class="container py-5">
        <div class="mb-4">
            <h1>Meu perfil</h1>
        </div>

        <div class="w-50 mt-2">
            <form action="/usuario/editarUsuario?id=<?php echo $_SESSION['id'] ?>" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome Completo:</label>
                    <div class="d-flex">
                        <input disabled type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['nomeCompleto']; ?>">
                        <button type="button"
                            id="btnEditarNome"
                            class="btn - btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <div class="d-flex">
                        <input disabled type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                        <button type="button"
                            id="btnEditarEmail"
                            class="btn - btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Alterar senha: </label>

                    <button type="button"
                        id="btnEditarSenha"
                        class="mx-2 btn btn-outline-secondary">
                        <i class="bi bi-pencil"></i>
                    </button>

                    <div class="d-none" id="inputSenhas">
                        <label class="form-label" for="senhaAtual">Senha atual</label>
                        <input class="form-control" type="password" name="senhaAtual" id="senhaAtual">
                        <label class="form-label" for="senhaAtual">Nova senha:</label>
                        <input class="form-control" type="password" name="novaSenha" id="novaSenha">
                        <label class="form-label" for="senhaAtual">Confirmar senha</label>
                        <input class="form-control" type="password" name="confirmarSenha" id="confirmarSenha">
                    </div>
                </div>

                <div id="mensagemErro" class="md-3 text-danger"></div>

                <div>
                    <button id="btnSalvar" type="submit" class="btn btn-primary" disabled>
                        Salvar edição
                    </button>
                    <button type="button"
                        class="btn btn-danger"
                        onclick="removerUsuario(<?php echo $_SESSION['id'] ?>)">
                        Excluir conta
                    </button>

                </div>
            </form>
        </div>
    </div>
</main>

<script>
    function removerUsuario(usuarioId) {
        if (confirm('Tem certeza que deseja excluir sua conta?')) {
            window.location.href = `/usuario/removerUsuario?id=${usuarioId}`;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        const nomeInput = document.getElementById('nome');
        const emailInput = document.getElementById('email');
        const btnSalvar = document.getElementById('btnSalvar');
        const mensagemErro = document.getElementById('mensagemErro');

        const btnEditarNome = document.getElementById('btnEditarNome');
        const btnEditarEmail = document.getElementById('btnEditarEmail');
        const btnEditarSenha = document.getElementById('btnEditarSenha');

        const inputSenhasDiv = document.getElementById('inputSenhas');
        const novaSenhaInput = document.getElementById('novaSenha');
        const confirmarSenhaInput = document.getElementById('confirmarSenha');


        function habilitarCampo(inputElement) {
            inputElement.disabled = false;
            btnSalvar.disabled = false;
            inputElement.focus();
        }

        function mostrarCamposSenha() {
            inputSenhasDiv.classList.remove('d-none');
            btnSalvar.disabled = false;
        }

        if (btnEditarNome) {
            btnEditarNome.addEventListener('click', () => habilitarCampo(nomeInput));
        }

        if (btnEditarEmail) {
            btnEditarEmail.addEventListener('click', () => habilitarCampo(emailInput));
        }

        if (btnEditarSenha) {
            btnEditarSenha.addEventListener('click', mostrarCamposSenha);
        }

        form.addEventListener('submit', function(event) {
            mensagemErro.textContent = '';
            
            if (!inputSenhasDiv.classList.contains('d-none')) {
                if (novaSenhaInput.value.length > 0 && novaSenhaInput.value !== confirmarSenhaInput.value) {
                    event.preventDefault();
                    mensagemErro.textContent = 'A nova senha e a confirmação não conferem.';
                    return; 
                }

                if (novaSenhaInput.value.length > 0 && novaSenhaInput.value.length < 6) {
                    event.preventDefault();
                    mensagemErro.textContent = 'A nova senha deve ter pelo menos 6 caracteres.';
                    return; 
                }
            }

            nomeInput.disabled = false;
            emailInput.disabled = false;
        });
    });
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous">
</script>
    
</body>

</html>