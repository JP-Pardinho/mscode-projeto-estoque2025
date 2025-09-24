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

            if (senhaInput.value.length > 0 && senhaInput.value.length < 7) {
                event.preventDefault();
                mensagemErro.textContent = 'A senha deve ter pelo menos 6 caracteres.';
                btnSalvar.disabled = true;
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