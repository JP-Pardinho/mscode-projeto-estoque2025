<?php

namespace App\Controller\Painel;
use App\Controller\AbstractController;
use App\Model\Categoria;

class NovoProdutoController extends AbstractController
{
    public function index (array $requestData): void
    {
        $model = new Categoria();
        $categorias = $model->findAll();

        $this->render('novo_produto.php', ['categorias' => $categorias]);
    }
}