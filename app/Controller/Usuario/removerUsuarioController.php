<?php

namespace App\Controller\Usuario;

use App\Controller\AbstractController;
use App\Model\Usuario;

class RemoverUsuarioController extends AbstractController
{
    public function index(array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
        }

        $usuarioModel = new Usuario();
        $success = $usuarioModel->delete((int)$requestData['id']);

        if ($success) {
            $this->redirect('/tela-perfil');
        } else {
            $this->redirectToError("Erro não foi possivel remover seu usuario");
        }
    }
}
