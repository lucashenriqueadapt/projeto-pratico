<?
namespace Services;

use Dtos\UserDto;
use Interfaces\Repository\UserInterface as RepositoryUserInterface;
use Interfaces\Services\UserInterface;

class UserServices implements UserInterface
{
    private RepositoryUserInterface $usersRepository;

    public function  __construct(RepositoryUserInterface $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }

    public function login(UserDto $user): array{

        return $this->usersRepository->login($user->email, $user->password);
    }

    public function cadastro(UserDto $user) : array {
        return $this->usersRepository->cadastro($user->nome, $user->email, $user->password);
    }

}
