<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

<?php
session_start();

if ($_SESSION['usuario_logado'] != 1) {
    header('Location: /error?mensagem=Por favor, faça login para acessar essa página.');
    exit();
}
?>

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
                    <label for="senha" class="form-label">Alterar senha:</label>
                    <div class="d-flex">
                        <button type="button"
                                id="btnEditarSenha"
                                class="btn - btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                        </button>

                        <div class="d-none" id="inputSenhas">
                            <label for="senhaAtual">Senha atual</label>
                            <input type="password" name="senhaAtual" id="senhaAtual">
                            <label for="senhaAtual">Nova senha:</label>
                            <input type="password" name="novaSenha" id="novaSenha">
                            <label for="senhaAtual">Confirmar senha</label>
                            <input type="password" name="confirmarSenha" id="confirmarSenha">
                        </div>
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
    document.addEventListener('DOMContentLoaded', function(){

        const nomeInput = document.getElementById('nome');
        const emailInput = document.getElementById('email');
        const senhaInput = document.getElementById('senha');
        const btnSalvar = document.getElementById('btnSalvar');
        const confirmarSenha = document.getElementById('confirmarSenha');

        const btnEditarNome = document.getElementById('btnEditarNome');
        const btnEditarEmail = document.getElementById('btnEditarEmail');
        const btnEditarSenha = document.getElementById('btnEditarSenha');

    function editarNome() {
        nomeInput.disabled = false;
    }

    function editarEmail() {
        emailInput.disabled = false;
    }

    function editarSenha() {
        confirmarSenha.textContent = '<input '
        senhaInput.disabled = false;
    }

    function salvarEdicao() {
        nomeInput.disabled = false;
        emailInput.disabled = false;
        senhaInput.disabled = false;
    }

    if (btnEditarNome) {
        btnEditarNome.addEventListener('click', editarNome);
        btnSalvar.disabled = false;
    }

    if (btnEditarEmail) {
        btnEditarEmail.addEventListener('click', editarEmail);
        btnSalvar.disabled = false;
    }

    if(btnSalvar) {
        btnSalvar.addEventListener('click', salvarEdicao);
    }
    });

    function removerUsuario(usuarioId) {
        if (confirm('Tem certeza que deseja excluir sua conta?')) {
            window.location.href = `/usuario/removerUsuario?id=${usuarioId}`;
        }
    }
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>