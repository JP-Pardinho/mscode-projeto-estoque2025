<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/header.php'; ?>

<div class="container py-5">
    <div class="mb-4 d-flex flex-row justify-content-between">
        <h1>Categorias</h1>
        <div>
            <a href="/nova-categoria" class="btn btn-primary"><i class="bi bi-plus"></i>Nova categoria</a>
        </div>
    </div>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col-1 text-align-right">Ações</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($data['categorias'] as $categoria): ?>
                <tr>
                    <th scope="row"><?php echo $categoria['id']; ?></th>
                    <td><?php echo $categoria['nome'] ?></td>
                    <td class="col-1 text-align-right">
                        <button type="button"
                                class="btn btn-secondary btn-sm"
                                title="Editar"
                                onclick="editarCategoria(<?php echo $categoria['id']; ?>)">
                            <i class="bi bi-pencil"></i>
                        </button>

                        <button type="button"
                                class="btn btn-danger btn-sm"
                                title="Excluir" 
                                onclick="removerCategoria(<?php echo $categoria['id']; ?>)">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>

            <tr>
                <th scope="row">1</th>
                <td>Informática</td>
                <td class="col-1 text-align-right">
                    <button class="btn btn-secondary btn-sm" title="Editar"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-danger btn-sm" title="Excluir"><i class="bi bi-trash"></i></button>
                </td>
            </tr>

        </tbody>

    </table>
</div>
</main>

<script>
    function EditarCategoria(categoriaId) {
        window.location.href = `/categoria/editarCategoria?id=${categoriaId}`;
    }

    function removerCategoria(categoriaId) {
        if (confirm('Tem certeza que deseja remover esta categoria?')) {
            window.location.href = `/categoria/removerCategoria?id=${categoriaId}`;
        }
    }
</script>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/view/includes/footer.php'; ?>