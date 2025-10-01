<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MS Code - Projeto Estoque 2025</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="../assets/css/styles.css" rel="stylesheet">
</head>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

<main>
    <div class="container">
        <section id="inicio">
            <div class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets/images/banner1.png" class="d-block w-100" alt="Banner Zap">
                    </div>
                </div>
            </div>
        </section>
    </div>


    <section id="moveis" class="container mt-5 mb-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                </table>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</main>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous">
</script>

</body>

</html>