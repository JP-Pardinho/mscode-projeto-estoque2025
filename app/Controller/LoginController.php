<?php

namespace App\Controller;

use App\Model\Usuario;
use App\Controller\AbstractController;

class LoginController extends AbstractController 
{
    public function index(array $requestData): void
    {
        session_start();

        $model = new Usuario;

        $usuario = $model->findByEmail($requestData['email']);
        

        if (! $usuario) {
            $this->redirectToError('Usuário ou senha inválidos!');
        }

        if (! password_verify($requestData['senha'], $usuario['senha'])) {
            $this->redirectToError('Usuário ou senha inválidos!');
        }

        $_SESSION['usuario_logado'] = 1;

        $this->redirect('/');
    }
}