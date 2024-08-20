<?

namespace Controller;

use Mappers\UserMapper;
use Interfaces\Services\UserInterface;

class UserController
{
    private UserInterface $userService;
    public function __construct(UserInterface $userService)
    {
        $this->userService = $userService;
    }


    public function login(): array
    {
        $user = UserMapper::assocObjDadosToUser(json_decode($_POST['dados']));

        return $this->userService->login($user);
    }

    public function cadastro(): array
    {
        $user = UserMapper::assocObjDadosToUser(json_decode($_POST['dados']));
        return $this->userService->cadastro($user);
    }
}
