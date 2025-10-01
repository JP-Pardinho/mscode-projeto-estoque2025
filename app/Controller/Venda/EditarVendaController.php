<?php

namespace App\Controller\Venda;

use App\Controller\AbstractController;
use App\Model\Venda;
use App\Model\Venda_Item; //
use App\Model\Produto;     //

class EditarVendaController extends AbstractController
{
    public function index(array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID da venda não informado");
            return;
        }

        $vendaId = (int)$requestData['id'];

        $vendaItemModel = new Venda_Item();
        $produtoModel = new Produto();

        // 1. Busca todos os itens da venda
        $itensDaVenda = $vendaItemModel->findItemsByVendaId($vendaId);

        if ($itensDaVenda) {
            foreach ($itensDaVenda as $item) {
                // 2. Para cada item, devolve a quantidade para o estoque do produto
                $produtoModel->incrementarEstoque($item['produto_id'], $item['quantidade']);
            }
        }
        // --- Fim da Lógica de Estoque ---


        // 3. Atualiza o status da venda para 'cancelada'
        $vendaModel = new Venda();
        $data = [
            'status' => 'cancelada' //
        ];
        
        $success = $vendaModel->update($vendaId, $data);
        
        if ($success) {
            // Se tudo deu certo, redireciona para o histórico
            header('Location: /vendas-realizadas');
            exit();
        } else {
            $this->redirectToError("Erro ao cancelar a venda.");
        }
    }
}