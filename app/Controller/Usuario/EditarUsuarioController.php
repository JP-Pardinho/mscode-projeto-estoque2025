<?php

namespace App\Controller\Usuario;

use App\Controller\AbstractController;
use App\Model\Usuario;

class EditarUsuarioController extends AbstractController
{
    public function index(array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
            return;
        }

        $idUsuario = (int) $requestData['id'];
        $usuarioModel = new Usuario();

        $usuarioAtual = $usuarioModel->findById($idUsuario);
        if (!$usuarioAtual) {
            $this->redirectToError("Usuário não encontrado.");
            return;
        }

        $data = [
            'nome' => trim($requestData['nome']),
            'email' => trim($requestData['email']),
        ];

        $senhaAtual = $requestData['senhaAtual'] ?? '';
        $novaSenha = $requestData['novaSenha'] ?? '';
        $confirmarSenha = $requestData['confirmarSenha'] ?? '';

        if (!empty($novaSenha)) {
            if (!password_verify($senhaAtual, $usuarioAtual['senha'])) {
                $this->redirectToError("A senha atual informada está incorreta.");
                return;
            }

            if ($novaSenha !== $confirmarSenha) {
                $this->redirectToError("A nova senha e a confirmação não conferem.");
                return;
            }

            if (strlen($novaSenha) < 6) {
                $this->redirectToError("A nova senha deve ter pelo menos 6 caracteres.");
                return;
            }

            $data['senha'] = password_hash($novaSenha, PASSWORD_ARGON2ID);
        }

        $success = $usuarioModel->update($idUsuario, $data);

        if ($success) {
            $_SESSION['nomeCompleto'] = $data['nome'];
            $_SESSION['email'] = $data['email'];
            
            $this->redirect('/tela-perfil'); 
        } else {
            $this->redirectToError("Erro ao atualizar os dados do usuário.");
        }
    }
}