<?php

namespace App\Controller\Venda;

use App\Controller\AbstractController;
use App\Model\Venda;
use DateTime;

class SalvarVendaController extends AbstractController
{
    public function index(array $requestData): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirectToError("Método não permitido");
        }

        $status = 'Finalizada';

        $data = [
            'id' => trim($requestData['id']),
            'data_venda' => date(DATE_ATOM),
            'cpf_cliente' => trim($requestData['cpf_cliente']),
            'status' => $status
        ];

        $vendaModel = new Venda();
        if (!empty($requestData['id'])) {
            $success = $vendaModel->update((int) $requestData['id'], $data);
        } else {
            $success = $vendaModel->create($data);
        }

        if ($success) {
            $this->redirect('/vendas-realizadas');
        } else {
            $this->redirectToError("Erro ao salvar item");
        }
    }
}
