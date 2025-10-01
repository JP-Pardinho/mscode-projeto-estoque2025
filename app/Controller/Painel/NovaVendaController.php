<?php

namespace App\Controller\Painel; 

use App\Controller\AbstractController;
use App\Model\Categoria;
use App\Model\Produto;

class NovaVendaController extends AbstractController 
{
    public function index(array $requestData): void
    {
        $produtoModel = new Produto();
        $produtos = $produtoModel->findAll();

        $categoriaModel = new Categoria();
        $categorias = $categoriaModel->findAll();

        foreach ($produtos as $chave => $produto) {
            $produtos[$chave]['categoria_nome'] = $categoriaModel->findNamebyId($produto['categoria_id']);
        }

        $this->render('nova_venda.php', ['produtos' => $produtos, 'categorias' => $categorias]);
    }
}