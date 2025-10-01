<?php

namespace App\Model;

use App\Database\Query;

class Venda_Item
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function findById(int $id): ?array
    {
        $result = $this->query->select('venda_item', 'id = ' . $id);

        if ($result && count($result) > 0) {
            return $result[0];
        }

        return null;
    }

    public function create(array $data): int|false
    {
        return $this->query->insert('venda_item', [
            'venda_id' => $data['venda_id'],
            'produto_id' => $data['produto_id'],
            'quantidade' => $data['quantidade'],
            'preco_unitario' => $data['preco_unitario']
        ]);
    }

    public function update(int $id, array $data)
    {
        return $this->query->update('venda_item', [
            'venda_id' => $data['venda_id'],
            'produto_id' => $data['produto_id'],
            'quantidade' => $data['quantidade'],
            'prece_unitario' => $data['prece_unitario']
        ], 'id = ' . $id);
    }

    public function delete(int $id): bool
    {
        return $this->query->delete('venda_item', 'id = ' . $id);
    }

    public function findAll(): array
    {
        return $this->query->select('venda_item', null) ?: [];
    }

    public function findItemsByVendaId(int $vendaId): array
    {
        return $this->query->select('venda_item', 'venda_id = ' . (int)$vendaId) ?: [];
    }
}
