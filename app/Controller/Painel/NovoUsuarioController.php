<?php 

namespace App\Controller\Painel;
use App\Controller\AbstractController;

class NovoUsuarioController extends AbstractController
{
    public function index (array $requestData): void
    {
        $this->render('novo_usuario.php');
    }
}