<?

namespace Repositories;

use PDO;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Interfaces\Repository\UserInterface;

class UserRepository implements UserInterface
{
    private PDO $conexao;
    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function login(string $email, string $password): array
    {
        $stmt = $this->conexao->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!password_verify($password, $user['senha'])) {
            return [
                'status' => 404,
                'message' => 'Email ou senha inválidos.',
            ];
        }
        $secretKey = 'loja';
        $host = $_SERVER['HTTP_HOST'];

        $payload = [
            'iss' => $host, 
            'aud' => $host, 
            'iat' => time(),                   
            'nbf' => time(),                   
            'exp' => time() + 3600,            
            'data' => [                        
                'userId' => $user['iduser'],
                'username' => $user['nome'],
                'email' => $user['email'],
            ]
        ];

        $jwt = JWT::encode($payload, $secretKey, 'HS256');


        return [
            'status' => 200,
            'message' => 'Login bem-sucedido.',
            'jwt' => $jwt
        ];
    }

    public function cadastro(string $nome, string $email, string $password): array
    {
        $stmt = $this->conexao->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return [
                'status' => 404,
                'message' => 'Email ja existe.',
            ];
        }   

        $stmt = $this->conexao->prepare("INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, password_hash($password, PASSWORD_DEFAULT)]);

        return [
            'status' => 200,
            'message' => 'Usário criado com sucesso.',
        ];
    }
}
