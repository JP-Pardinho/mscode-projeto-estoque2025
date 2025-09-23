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

        $data = [
            'nome' => trim($requestData['nome']),
            'email' => trim($requestData['email']),
            'senha' => trim($requestData['senha']),
        ];

        $usuarioModel = new Usuario();
        $success = $usuarioModel->update((int) $requestData['id'], $data);

        if ($success) {
            $this->redirect('/tela-perfil');
        } else {
            $this->redirectToError("Erro ao atualizar os dados do usuario");
        }
    }
}