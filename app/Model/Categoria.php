<?php 

namespace App\Model;

use App\Database\Query;

class Categoria 
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query;
    }

    public function findById(int $id): ?array
    {
        $result = $this->query->select('categoria', 'id = ' . $id);

        if ($result && count($result) > 0) {
            return $result[0];
        }

        return null;
    }

    public function create(array $data): int|false
    {
        return $this->query->insert('categoria', [
            'nome' => $data['nome']
        ]);
    }


    public function update(int $id, array $data): bool
    {   
        return $this->query->update('categoria', [
            'nome' => $data['nome']
        ], 'id = ' . $id);
    }

    public function delete(int $id): bool
    {
        return $this->query->delete('categoria', 'id = ' . $id);
    }

    public function findAll(): array
    {
        return $this->query->select('categoria', null) ?: [];
    }

    // PERGUNTAR SOBRE ISSO MAIS TARDE
    public function findNamebyId(int $id): ?string
    {
        $result = $this->query->select('categoria', 'id = ' . $id);

        if ($result && count($result) > 0) {
            $categoria = $result[0];
            return $categoria['nome'];
        }

        return null;
    }
}