<?php

namespace App\Controller\Venda;

use App\Controller\AbstractController;
use App\Model\Venda;

class EditarVendaController extends AbstractController
{
    public function index(array $requestData): void
    {
        if (!isset($requestData['id'])) {
            $this->redirectToError("ID não informado");
            return;
        }

        $status = 'cancelada';

        $data = [
            'status' => $status 
        ];

        $vendaModel = new Venda();
        $success = $vendaModel->update($requestData['id'], $data);

        if ($success) {            
            $this->redirect('/vendas-realizadas'); 
        } else {
            $this->redirectToError("Erro ao cancelar a venda.");
        }
    }
}
