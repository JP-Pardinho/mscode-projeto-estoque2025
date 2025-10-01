<?php

namespace App\Model;

use App\Database\Query;

class Venda
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function findById(int $id): ?array
    {
        $result = $this->query->select('venda', 'id = ' . $id); 

        if ($result && count($result) > 0) {
            return $result[0];
        }

        return null;
    }

    public function create(array $data): int|false
    {
        return $this->query->insert('venda', [
            'data_venda' => $data['data_venda'],
            'cpf_cliente' => $data['cpf_cliente'],
            'status' => $data['status'] ?? 'pendente'
        ]);
    }

    public function update(int $id, array $data)
    {
        return $this->query->update('venda', $data, 'id = ' . $id);
    }

        public function delete(int $id): bool
    {
        return $this->query->delete('venda', 'id = ' . $id);
    }

    public function findAll(): array
    {
        return $this->query->select('venda', null) ?: [];
    }
}