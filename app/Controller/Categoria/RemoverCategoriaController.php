<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria;

class RemoverCategoriaController extends AbstractController
{
    public function index(array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
        }

        $categoriaModel = new Categoria();
        $success = $categoriaModel->delete((int)$requestData['id']);

        if ($success) {
            $this->redirect('/tela-categorias');
        } else {
            $this->redirectToError("Erro ao remover item");
        }
    }
}
