<?php

 require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

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
                <tr>
                    <th scope="row"> <?php echo $produto['id']; ?></th>
                    <td><?php echo $produto['nome']; ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php echo $produto['categoria_nome']; ?></td>
                    <td><?php echo 'R$ ' . $produto['valor']; ?></td>
                    <td><?php echo $produto['quantidade_disponivel']; ?></td>

                    <td class="col-2 d-flex gap-1 w-auto flex-wrap">

                        <button type="button"
                                class="btn btn-primary btn-sm" 
                                title="Adicionar 1 (incrementar quantidade)"
                                onclick="incrementarProduto(<?php echo $produto['id']; ?>)">
                            <i class="bi bi-plus"></i>
                        </button>

                        <button type="button"
                                class="btn btn-secondary btn-sm"
                                title="Editar"
                                onclick="editarProduto(<?php echo $produto['id']; ?>)">
                            <i class="bi bi-pencil"></i>
                        </button>

                        <button type="button"
                                class="btn btn-danger btn-sm"
                                title="Excluir"
                                onclick="removerProduto(<?php echo $produto['id']; ?>)">
                            <i class="bi bi-trash"></i></button>

                        <button type="button"
                                class="btn btn-primary btn-sm"
                                title="Vender produto (decrementar 1)"
                                onclick="venderProduto(<?php echo $produto['id'] ?>)">
                            Vender
                        </button>
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