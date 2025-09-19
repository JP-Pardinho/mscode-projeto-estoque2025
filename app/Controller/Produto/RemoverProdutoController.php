<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto;

class RemoverProdutoController extends AbstractController
{
    public function index(array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
        }

        $produtoModel = new Produto();
        $success = $produtoModel->delete((int)$requestData['id']);

        if ($success) {
            $this->redirect('/tela-produtos');
        } else {
            $this->redirectToError("Erro ao remover item");
        }
    }
}
