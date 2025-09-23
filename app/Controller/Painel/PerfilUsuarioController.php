<?php 

namespace App\Controller\Painel;
use App\Controller\AbstractController;

class PerfilUsuarioController extends AbstractController
{
    public function index (array $requestData): void
    {
        $this->render('perfil_usuario.php');
    }
}