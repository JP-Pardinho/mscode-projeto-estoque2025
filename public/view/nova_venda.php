<?php

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
    <title>MS Code - Nova Venda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>

<body>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

    <main>
        <form action="/finalizar-venda" method="POST">
            <div class="container py-5">
                <div class="mb-4 d-flex flex-row justify-content-between">
                    <h1>Selecione os produtos do pedido</h1>
                </div>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Qtd. Disponível</th>
                            <th scope="col-2 text-align-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($data['produtos'] as $produto): ?>
                            <tr class="align-middle">
                                <th scope="row"> <?php echo $produto['id']; ?></th>
                                <td><img id="imagem-produto" src="<?php echo $produto['url']; ?>" alt="<?php echo $produto['nome']; ?>"></td>
                                <td><?php echo $produto['nome']; ?></td>
                                <td><?php echo $produto['descricao']; ?></td>
                                <td><?php echo $produto['categoria_nome']; ?></td>
                                <td><?php echo 'R$ ' . $produto['valor']; ?></td>
                                <td><?php echo $produto['quantidade_disponivel']; ?></td>
                                <td class="col-2 w-auto">
                                    <div class="d-flex flex-column gap-2">
                                        <div class="d-flex gap-1">

                                            <input type="checkbox"
                                                class="btn-check"
                                                name="produtos_selecionados[]"
                                                value="<?php echo $produto['id']; ?>"
                                                id="btn-check-<?php echo $produto['id']; ?>"
                                                autocomplete="off">

                                            <label title="Adicionar ao pedido"
                                                class="btn btn-outline-success"
                                                for="btn-check-<?php echo $produto['id']; ?>">
                                                <i class="bi bi-bag-plus fs-1 me-1"></i>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Concluir venda
                    </button>
                </div>
            </div>
        </form>
    </main>


    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous">
    </script>
</body>

</html>