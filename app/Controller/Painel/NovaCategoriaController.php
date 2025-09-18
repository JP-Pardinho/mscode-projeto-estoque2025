<?php

namespace App\Controller\Painel;
use App\Controller\AbstractController;

class NovaCategoriaController extends AbstractController
{
    public function index(array $requestData): void
    {
        $this->render('nova_categoria.php');
    }
}