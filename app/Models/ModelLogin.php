<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLogin extends Model
{
    public function Alldata()
    {
        return $this->db->table('t_user')
            ->get()
            ->getResultArray();
    }

    public function LoginUser($username, $password)
    {
        return $this->db->table('t_user')
            ->where([
                'user_name' => $username,
                'password' => $password,
            ])->get()->getRowArray();
    }
}
