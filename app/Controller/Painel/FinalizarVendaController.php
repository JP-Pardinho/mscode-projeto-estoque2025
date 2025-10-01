<?php

namespace App\Controller\Painel;

use App\Controller\AbstractController;
use App\Model\Produto;

class FinalizarVendaController extends AbstractController
{
    public function index(array $requestData): void
    {

        $produtos_selecionados_ids = $_POST['produtos_selecionados'] ?? null;
        
        if (!$produtos_selecionados_ids || empty($produtos_selecionados_ids)) {
            header('Location: /nova-venda?erro=Nenhum produto selecionado.');
            exit();
        }

        $produtoModel = new Produto();
        $produtosParaVenda = $produtoModel->findByIds($produtos_selecionados_ids);

        $this->render('finalizar_venda.php', ['produtos' => $produtosParaVenda]);
    }
}