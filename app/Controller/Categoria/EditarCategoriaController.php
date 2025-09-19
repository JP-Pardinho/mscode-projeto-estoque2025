<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria;

class EditarCategoriaController extends AbstractController 
{
    public function index (array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
        }

        $data = [
            'nome' => trim($requestData['nome'])
        ];

        $categoriaModel = new Categoria();
        $success = $categoriaModel->update((int) $requestData['id'], $data);

        if ($success) {
            $this->redirect('/tela-categorias');
        } else {
            $this->redirectToError("Erro ao atualizar nome da categoria");
        }
    }
}