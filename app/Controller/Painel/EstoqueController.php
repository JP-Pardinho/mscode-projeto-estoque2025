<?php

namespace App\Controller\Painel;
use App\Controller\AbstractController;
use App\Model\Produto;

class EstoqueController extends AbstractController {

    public function index (array $requestData): void
    {
        $model = new Produto();
        $produtos = $model->findAll(); 

        $this->render('produtos.php', ['produtos' => $produtos]);
    }
}