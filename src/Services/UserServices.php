<?
namespace Services;

use Repositories\UserRepository;

class UserServices
{
    private UserRepository $usersRepository;

    public function  __construct(UserRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function login(string $email, string $password): array{

        return $this->usersRepository->login($email, $password);
    }

    public function cadastro(string $nome, string $email, string $password) : array {
        return $this->usersRepository->cadastro($nome, $email, $password);
    }

}
