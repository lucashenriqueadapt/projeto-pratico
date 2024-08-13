<?php

namespace Security;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;
use Exception;

class JWTAuthenticator
{
    private static $secretKey = "loja";
    private static $host;

    /**
     * Inicializa o host para comparação.
     */
    public static function init()
    {
        self::$host = $_SERVER['HTTP_HOST'];
    }

    /**
     * Verifica a validade do token JWT.
     *
     * @param string $jwt
     * @return array
     */
    public static function verifyToken(string $jwt): array
    {
        self::init();

        try {
            $decoded = JWT::decode($jwt, new Key(self::$secretKey, 'HS256'));

            if ($decoded->iss !== self::$host || $decoded->aud !== self::$host) {
                return [
                    'status' => 401,
                    'message' => 'Token inválido.',
                ];
            }

            return [
                'status' => 200,
                'message' => 'Token válido.',
                'data' => (array) $decoded->data
            ];
        } catch (ExpiredException $e) {
            return [
                'status' => 401,
                'message' => 'Token expirado.',
            ];
        } catch (Exception $e) {
            return [
                'status' => 401,
                'message' => 'Token inválido: ' . $e->getMessage(),
            ];
        }
    }

    /**
     * Extrai o token JWT do cabeçalho Authorization.
     *
     * @param string $authorizationHeader
     * @return string|null
     */
    public static function extractToken(string $authorizationHeader): ?string
    {
        if (strpos($authorizationHeader, 'Bearer ') !== false) {
            return str_replace('Bearer ', '', $authorizationHeader);
        }

        return null;
    }
}
