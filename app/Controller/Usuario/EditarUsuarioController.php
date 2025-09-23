<?php

namespace App\Controller\Usuario;

use App\Controller\AbstractController;
use App\Model\Usuario;

class EditarUsuarioController extends AbstractController 
{
    public function index (array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
        }

        $senha = $requestData['senha'];

        $data = [
            'nome' => trim($requestData['nome']),
            'email' => trim($requestData['email']),
            'senha' => trim($requestData['senha']),
        ];

        $usuarioModel = new Usuario();
        $success = $usuarioModel->update((int) $requestData['id'], $data);

        $usuario = $usuarioModel->findById($requestData['id']);
        
        if ($success) {
            $_SESSION['nomeCompleto'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['senha'] = $senha;
            $this->redirect('/tela-perfil');
        } else {
            $this->redirectToError("Erro ao atualizar os dados do usuario");
        }
    }
}