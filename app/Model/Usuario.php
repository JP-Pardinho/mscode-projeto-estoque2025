<?php 

namespace App\Model;

use App\Database\Query;

class Usuario 
{
    private Query $query;

    public function __construct()
    {
        $this->query = new Query();
    }

    public function findById(int $id): ?array
    {
        $result = $this->query->select('usuario', 'id = ' . $id);

        if ($result && count($result) > 0) {
            return $result[0];
        }

        return null;
    }

    public function create(array $data): int|false
    {
        $senhaHash = password_hash($data['senha'], PASSWORD_ARGON2ID);

        return $this->query->insert('usuario', [
            'nome' => $data['nome'],
            'email' => $data['email'],
            'senha' => $senhaHash
        ]);
    }


    public function update(int $id, array $data): bool
    {   
        $senhaHash = password_hash($data['senha'], PASSWORD_DEFAULT);

        return $this->query->update('usuario', [
            'nome' => $data['nome'],
            'email' => $data['email'],
            'senha' => $senhaHash
        ], 'id = ' . $id);
    }

    public function delete(int $id): bool
    {
        return $this->query->delete('usuario', 'id = ' . $id);
    }

    public function findAll(): array
    {
        return $this->query->select('usuario', null) ?: [];
    }

    
    public function findByEmail(string $email): ?array
    {
        $result = $this->query->select('usuario', "email = '{$email}'");

        if ($result && count($result) > 0) {
            return $result[0];
        }
        
        return null;
    }    
}