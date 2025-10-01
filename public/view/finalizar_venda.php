<!doctype html>
<html lang="pt-BR">
<head>
    <title>MS Code - Finalizar Venda</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

    <main>
        <form action="/venda/salvarVenda" method="POST">
            <div class="container py-5">
                <h1>Finalizar Venda</h1>
                <p>Confira os produtos e defina as quantidades.</p>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor Unitário</th>
                            <th scope="col" style="width: 150px;">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['produtos'] as $produto): ?>
                            <tr>
                                <td>
                                    <?php echo $produto['nome']; ?>
                                    <input type="hidden" name="produtos[<?php echo $produto['id']; ?>][id]" value="<?php echo $produto['id']; ?>">
                                </td>
                                <td>R$ <?php echo number_format($produto['valor'], 2, ',', '.'); ?></td>
                                <td>
                                    <input type="number"
                                           name="produtos[<?php echo $produto['id']; ?>][quantidade]"
                                           class="form-control" 
                                           value="1"
                                           min="1"
                                           max="<?php echo $produto['quantidade_disponivel']; ?>"
                                           required>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <hr>

                <div class="mb-3">
                    <label for="cpf_cliente" class="form-label">CPF do Cliente</label>
                    <input type="text" class="form-control" id="cpf_cliente" name="cpf_cliente" require>
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-lg">Salvar Venda</button>
                </div>
            </div>
        </form>
    </main>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>
</body>
</html>