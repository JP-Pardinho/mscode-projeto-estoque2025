<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

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
                <th scope="col">Id Categoria</th>
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
                <td><?php echo $produto['categoria_id']; ?></td>
                <td><?php echo $produto[''] ?></td>
                <td><?php echo 'R$ ' . $produto['valor']; ?></td>
                <td><?php echo $produto['quantidade_disponivel']; ?></td>

                <td class="col-2 d-flex gap-1 w-auto flex-wrap">
                    <button class="btn btn-primary btn-sm" title="Adicionar 1 (incrementar quantidade)"><i class="bi bi-plus"></i></button>
                    <button class="btn btn-secondary btn-sm" title="Editar produto"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-danger btn-sm" title="Excluir"><i class="bi bi-trash"></i></button>
                    <button class="btn btn-primary btn-sm" title="Vender produto (decrementar 1)">Vender</button>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th scope="row">1</th>
                <td>nome</td>
                <td>descrição</td>
                <td>categoria id</td>
                <td>R$ 398,00</td>
                <td>2</td>
                <td class="col-2 d-flex gap-1 w-auto flex-wrap">
                    <button class="btn btn-primary btn-sm" title="Adicionar 1 (incrementar quantidade)"><i class="bi bi-plus"></i></button>
                    <button class="btn btn-secondary btn-sm" title="Editar produto"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-danger btn-sm" title="Excluir"><i class="bi bi-trash"></i></button>
                    <button class="btn btn-primary btn-sm" title="Vender produto (decrementar 1)">Vender</button>
                </td>
            </tr>
        </tbody>

    </table>
</div>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>