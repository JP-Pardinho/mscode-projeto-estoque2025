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
    <title>MS Code - Histórico de Vendas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="/assets/css/styles.css" rel="stylesheet">
</head>
<body>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

    <main>
        <div class="container py-5">
            <div class="mb-4 d-flex flex-row justify-content-between">
                <h1>Histórico de Vendas Realizadas</h1>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID da Venda</th>
                        <th scope="col">Data</th>
                        <th scope="col">CPF do Cliente</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data['vendas'])): ?>
                        <tr>
                            <td colspan="5" class="text-center">Nenhuma venda encontrada.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($data['vendas'] as $venda): ?>
                            <tr class="align-middle">
                                <th scope="row"><?php echo $venda['id']; ?></th>
                                <td><?php echo date('d/m/Y H:i:s', strtotime($venda['data_venda'])); ?></td>
                                <td><?php echo htmlspecialchars($venda['cpf_cliente'] ?? 'Não informado'); ?></td>
                                <td><span class="badge bg-success"><?php echo ucfirst(htmlspecialchars($venda['status'])); ?></span></td>
                                <td>
                                    <a href="/venda/editarVenda?id=<?php echo $venda['id']; ?>" class="btn btn-danger btn-sm" title="Ver Detalhes">
                                        <i class="bi bi-x"></i> Cancelar
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous">
    </script>
</body>
</html>