<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\ExpiredException;

class JWTAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        helper('jwt');

        $authHeader = $request->getHeaderLine('Authorization');

        if (!$authHeader || !preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            return response()->setStatusCode(401)->setJSON(['message' => 'Token não fornecido']);
        }

        $token = $matches[1];

        try {
            $decoded = validateJWT($token);
        } catch (ExpiredException $e) {
            return response()->setStatusCode(401)->setJSON(['message' => 'Token expirado']);
        } catch (\Exception $e) {
            return response()->setStatusCode(401)->setJSON(['message' => 'Token inválido']);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
