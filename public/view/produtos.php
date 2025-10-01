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
    <title>MS Code - Produtos
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

<main>
    <div class="container py-5">
        <div class="mb-4 d-flex flex-row justify-content-between">
            <h1>Produtos</h1>
            <div>
                <a href="/novo-produto" class="btn btn-primary"><i class="bi bi-plus"></i>Novo produto</a>
            </div>
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
                                    <button type="button"
                                            class="btn btn-primary btn-sm flex-fill"
                                            title="Adicionar 1 (incrementar quantidade)"
                                            onclick="incrementarProduto(<?php echo $produto['id']; ?>)">
                                        <i class="bi bi-plus"></i>
                                    </button>

                                    <button type="button"
                                            class="btn btn-secondary btn-sm flex-fill"
                                            title="Editar"
                                            onclick="editarProduto(<?php echo $produto['id']; ?>)">
                                        <i class="bi bi-pencil"></i>
                                    </button>

                                    <button type="button"
                                            class="btn btn-danger btn-sm flex-fill"
                                            title="Excluir"
                                            onclick="removerProduto(<?php echo $produto['id']; ?>)">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>

                                <button type="button"
                                        class="btn btn-primary btn-sm"
                                        title="Vender produto (decrementar 1)"
                                        onclick="venderProduto(<?php echo $produto['id'] ?>)">
                                    Vender
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<script>
    function incrementarProduto(produtoId) {
        window.location.href = `/produto/incrementarProduto?id=${produtoId}`
    }

    function venderProduto(produtoId) {
        window.location.href = `/produto/venderProduto?id=${produtoId}`
    }

    function editarProduto(produtoId) {
        window.location.href = `/tela-editar-produto?id=${produtoId}`;
    }

    function removerProduto(produtoId) {
        if (confirm('Tem certeza que deseja remover esta produto?')) {
            window.location.href = `/produto/removerProduto?id=${produtoId}`;
        }
    }
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous">
</script>

</body>

</html>