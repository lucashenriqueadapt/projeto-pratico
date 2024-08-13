<?

namespace Controller;

use Services\UserServices;

class UserController
{
    private UserServices $userService;
    public function __construct(UserServices $userService)
    {

        $this->userService = $userService;
    }


    public function login(): array
    {
        $dados = json_decode($_POST['dados']);
        $email = $dados->email;
        $password = $dados->password;


        return $this->userService->login($email, $password);
    }

    public function cadastro(): array
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        return $this->userService->cadastro($nome, $email, $password);
    }
}
