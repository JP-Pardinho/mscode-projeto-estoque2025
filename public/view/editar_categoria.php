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
            <h1>Editar categoria</h1>
        </div>

        <div class="w-50 mt-2">
            <form action="/categoria/editarCategoria?id=<?php echo $data['categoria']['id'] ?>" method="POST">
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input type="email" class="form-control" id="id" disabled value="<?php echo $data['categoria']['id'] ?>">
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $data['categoria']['nome'] ?>">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>