<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto;

class IncrementarProdutoController extends AbstractController 
{
    public function index (array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
        }

        $produtoModel = new Produto();
        $success = $produtoModel->findById((int) $requestData['id']);
        $quantidade = $success['quantidade_disponivel'] + 1;

        $data = [
            'nome' => $success['nome'],
            'descricao' => $success['descricao'] ?? '',
            'categoria_id' => $success['categoria_id'],
            'data_cadastro' => date(DATE_ATOM),
            'quantidade_inicial' => $success['quantidade_inicial'],
            'quantidade_disponivel' => $quantidade,
            'valor' => $success['valor']
        ];

        $success = $produtoModel->update((int) $requestData['id'], $data);

        if ($success) {
            $this->redirect('/tela-produtos');
        } else {
            $this->redirectToError("Erro ao incrementar a quantidade de produtos");
        }
    }
}