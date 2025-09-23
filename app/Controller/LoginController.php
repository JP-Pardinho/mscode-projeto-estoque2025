<?php

namespace App\Controller;

use App\Model\Usuario;
use App\Controller\AbstractController;

class LoginController extends AbstractController 
{
    public function index(array $requestData): void
    {
        $model = new Usuario;

        $usuario = $model->findByEmail($requestData['email']);
        

        if (! $usuario) {
            $this->redirectToError('Usuário ou senha inválidos!');
        }

        if (! password_verify($requestData['senha'], $usuario['senha'])) {
            $this->redirectToError('Usuário ou senha inválidos!');
        }

        $usuario['nome'];
        $nomeCompleto = explode(" ", $usuario['nome']);

        $_SESSION['nome'] = $nomeCompleto[0];
        $_SESSION['email'] = $usuario['email'];
        // $_SESSION['cpf'] = $usuario['cpf'];
        $_SESSION['senha'] = $usuario['senha'];
        $_SESSION['usuario_logado'] = 1;

        $this->redirect('/');
    }
}