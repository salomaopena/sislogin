<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function verify_login($username, $password)
    {
        //busca utilizador na base de dados
        $user = $this->where('username', $username)->first();
        /**
         * - procurar na base de dados se existe um utilizador com as credenciais fornecidas.
         * - verificar se a senha é equivalente a senha fornecida
         * 
         */
        if ($user) {
            if (password_verify($password, $user->password)) {
                //senha correcta
                return $user;
            }
        } else {
            //login incorrecto
            return false;
        }


        //$user = $this->db->table('users');
        //$user->where('username', $username);
        //$user->where('password', $password);
        //$query = $user->get();
        //return $query->getRow();


    }
}
