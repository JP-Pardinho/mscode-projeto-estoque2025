<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto;

class EditarProdutoController extends AbstractController 
{
    public function index (array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
        }

        $data = [
            'nome' => trim($requestData['nome']),
            'descricao' => trim($requestData['descricao'] ?? ''),
            'categoria_id' => trim($requestData['categoria_id']),
            'data_cadastro' => date(DATE_ATOM),
            'quantidade_inicial' => (int) $requestData['quantidade'],
            'quantidade_disponivel' => trim($requestData['quantidade']),
            'valor' => trim($requestData['valor']),
            'url' => trim($requestData['url'])
        ];

        $produtoModel = new Produto();
        $success = $produtoModel->update((int) $requestData['id'], $data);

        if ($success) {
            $this->redirect('/tela-produtos');
        } else {
            $this->redirectToError("Erro ao atualizar nome da Produto");
        }
    }
}