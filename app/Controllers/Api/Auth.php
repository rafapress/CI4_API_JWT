<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class Auth extends ResourceController
{
    public function login()
    {
        $model = new UserModel();
        $json = $this->request->getJSON(true);

        $user = $model->where('email', $json['email'])->first();

        if (!$user || !password_verify($json['password'], $user['password'])) {
            return $this->failUnauthorized('Usuário ou senha inválidos');
        }

        helper('jwt');
        $token = createJWT(['id' => $user['id'], 'email' => $user['email']]);

        return $this->respond(['token' => $token]);
    }
}
