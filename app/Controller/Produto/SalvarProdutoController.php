<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto;

class SalvarProdutoController extends AbstractController
{
    public function index(array $requestData): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirectToError("Método não permitido");
        }

        if (empty($requestData['title'])) {
            $this->redirectToError("Título é obrigatório");
        }

        $data = [
            'nome' => trim($requestData['nome']),
            'descricao' => trim($requestData['descricao'] ?? ''),
            'categoria_id' => trim($requestData['categoria_id']),
            'data_cadastro' => trim($requestData['data_cadastro']),
            'quantidade_inicial' => trim($requestData['quantidade_inicial']),
            'quantidade_disponivel' => trim($requestData['quantidade_disponivel']),
            'valor' => trim($requestData['valor'])
        ];

        $produtoModel = new Produto();
        if (!empty($requestData['id'])) {
            $success = $produtoModel->update((int) $requestData['id'], $data);
        } else {
            $success = $produtoModel->create($data);
        }

        if ($success) {
            $this->redirect('/');
        } else {
            $this->redirectToError("Erro ao salvar item");
        }
    }
}
