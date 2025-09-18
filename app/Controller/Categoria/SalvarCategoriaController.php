<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria;

class SalvarCategoriaController extends AbstractController
{
    public function index(array $requestData): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirectToError("Método não permitido");
        }

        if (empty($requestData['nome'])) {
            $this->redirectToError("Nome é obrigatório");
        }

        $data = [
            'nome' => trim($requestData['nome'])
        ];

        $categoriaModel = new Categoria();
        if (!empty($requestData['id'])) {
            $success = $categoriaModel->update((int) $requestData['id'], $data);
        } else {
            $success = $categoriaModel->create($data);
        }

        if ($success) {
            $this->redirect('/tela-categorias');
        } else {
            $this->redirectToError("Erro ao salvar item");
        }
    }
}
