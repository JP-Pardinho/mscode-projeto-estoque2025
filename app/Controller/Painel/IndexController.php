<?php

namespace App\Controller\Painel;
use App\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function index (array $requestData): void
    {
        $this->render('index.php');
    }
}