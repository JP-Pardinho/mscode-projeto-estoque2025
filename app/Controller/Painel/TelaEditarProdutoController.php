<?php 

namespace App\Controller\Painel;

use App\Controller\AbstractController;
use App\Model\Categoria;
use App\Model\Produto;

class TelaEditarProdutoController extends AbstractController
{
    public function index (array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
        }

        $produtoModel = new Produto();
        $success = $produtoModel->findById((int)$requestData['id']);

        $categoriaModel = new Categoria();
        $categorias = $categoriaModel->findAll();

        if ($success) {
            $this->render('editar_produto.php', ['produto' => $success, 'categorias' => $categorias]);
        } else {
            $this->redirectToError("Erro não é possivel editar este produto");
        }
    }
}