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
            <h1>Editar produto</h1>
        </div>

        <div class="w-50 mt-2">
            <form action="/produto/editarProduto?id=<?php echo $data['produto']['id'] ?>" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $data['produto']['nome'] ?>">
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <textarea class="form-control" id="descricao" name="descricao" style="resize:none;" rows="5">
                    <?php echo $data['produto']['descricao'] ?>
                </textarea>
                </div>

                <div class="row">

                    <div class="mb-3 col-4">
                        <label for="categoria_id" class="form-label">Categorias:</label>
                        <select class="form-select" aria-label="Categoria" name="categoria_id">
                            <option selected disabled> - - - Selecione - - -</option>
                            <?php foreach ($data['categorias'] as $categoria): ?>

                                <option
                                    <?php echo $categoria['id'] === $data['produto']['categoria_id'] ?  'selected' : '' ?>
                                    value="<?php echo $categoria['id']; ?>">
                                    <?php echo $categoria['nome'] ?>
                                </option>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="quantidade" class="form-label">Quantidade:</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo (int) $data['produto']['quantidade_disponivel'] ?>">
                    </div>

                    <div class="mb-3 col-4">
                        <label for="valor" class="form-label">Valor:</label>
                        <input type="text" class="form-control" id="valor" name="valor" value="<?php echo $data['produto']['valor'] ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>