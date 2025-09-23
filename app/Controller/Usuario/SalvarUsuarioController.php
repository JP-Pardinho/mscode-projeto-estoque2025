<?php

namespace App\Controller\Usuario;

use App\Controller\AbstractController;
use App\Model\Usuario;

class SalvarUsuarioController extends AbstractController
{
    public function index(array $requestData): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirectToError("Método não permitido");
        }

        if (empty($requestData['nome'])) {
            $this->redirectToError("Nome é obrigatório");
        }
        
        ($requestData['confirmacao']);

        $data = [
            'nome' => trim($requestData['nome']),
            'email' => trim($requestData['email']),
            'senha' => trim($requestData['senha']),
        ];

        $usuarioModel = new Usuario();

        if (!empty($requestData['id'])) {
            $success = $usuarioModel->update((int) $requestData['id'], $data);
        } else {
            $success = $usuarioModel->create($data);
        }

        if ($success) {
            $this->redirect('/tela-login');
        } else {
            $this->redirectToError("Erro ao adicionar usuário");
        }
    }
}
