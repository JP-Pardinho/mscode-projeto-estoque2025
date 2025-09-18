<?php

namespace App\Model;

use App\Database\Query;

class Produto
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function findById(int $id): ?array
    {
        $result = $this->query->select('produto', 'id = ' . $id);

        if ($result && count($result) > 0) {
            return $result[0];
        }

        return null;
    }

    public function create(array $data): int|false
    {
        return $this->query->insert('produto', [
            'nome' => $data['nome'],
            'descricao' => $data['descricao'] ?? '',
            'categoria_id' => $data['categoria_id'],
            'data_cadastro' => $data['data_cadastro'],
            'quantidade_inicial' => $data['quantidade_inicial'],
            'quantidade_disponivel' => $data['quantidade_disponivel'],
            'valor' => $data['valor']
        ]);
    }

    public function update(int $id, array $data): bool
    {   
        return $this->query->update('produto', [
            'nome' => $data['nome'],
            'descricao' => $data['descricao'] ?? '',
            'categoria_id' => $data['categoria_id'],
            'data_cadastro' => $data['data_cadastro'],
            'quantidade_inicial' => $data['quantidade_inicial'],
            'quantidade_disponivel' => $data['quantidade_disponivel'],
            'valor' => $data['valor']
        ], 'id = ' . $id);
    }

    public function delete(int $id): bool
    {
        return $this->query->delete('produto', 'id = ' . $id);
    }

    public function findAll(): array
    {
        return $this->query->select('produto', null) ?: [];
    }

    public function findNomeCaregoria(int $id): ?array 
    {
        $categoria = new Categoria();
        $result = $this->query->select('categoria', 'id = ' . $id);

        if ($result && count($result) > 0) {
            return $result[0];
        }

        return null;
    }
}