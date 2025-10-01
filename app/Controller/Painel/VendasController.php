<?php

namespace App\Controller\Painel;

use App\Controller\AbstractController;
use App\Model\Venda;

class VendasController extends AbstractController
{
    public function index(array $requestData): void
    {
        $vendasModel = new Venda();
        $vendas = $vendasModel->findAll();

        $this->render('vendas_realizadas.php', ['vendas' => $vendas]);
    }
}