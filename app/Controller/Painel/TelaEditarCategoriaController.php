<?php 

namespace App\Controller\Painel;

use App\Controller\AbstractController;
use App\Model\Categoria;

class TelaEditarCategoriaController extends AbstractController
{
    public function index (array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
        }

        $categoriaModel = new Categoria();
        $success = $categoriaModel->findById((int)$requestData['id']);

        if ($success) {
            $this->render('editar_categoria.php', ['categoria' => $success]);
        } else {
            $this->redirectToError("Erro não é possivel editar esta categoria");
        }
    }
}