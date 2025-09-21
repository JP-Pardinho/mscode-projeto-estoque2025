<?php

namespace App\Controller\Painel;
use App\Controller\AbstractController;

class TelaLoginController extends AbstractController
{
    public function index (array $requestData): void
    {
        $this->render('login.php');
    }
}