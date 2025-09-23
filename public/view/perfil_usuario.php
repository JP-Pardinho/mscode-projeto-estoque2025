<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

<div class="container py-5">
    <div class="mb-4">
        <h1>Meu perfil</h1>
    </div>

    <div class="w-50 mt-2">
        <form action="/usuario/salvarUsuario" method="POST">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo:</label>
                <input disabled type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['nome']; ?>">
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input disabled type="text" class="form-control" id="cpf" name="cpf" value="<?php ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input disabled type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input disabled type="password" class="form-control" id="senha" name="senha" value="<?php echo $_SESSION['senha']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>